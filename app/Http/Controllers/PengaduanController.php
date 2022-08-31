<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Penilaian;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreatedPengaduanNotification;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($_GET['cari'])) {
            $pengaduans = Pengaduan::whereBetween('created_at', [$request->start_date, $request->end_date])->get();
            return view('pages.admin.pengaduan.index', [
                'pengaduans' => $pengaduans
            ]);
        }

        $pengaduans = Pengaduan::with(['tanggapan'])->orderBy('created_at', 'desc')->get();

        return view('pages.admin.pengaduan.index', [
            'pengaduans' => $pengaduans
        ]);
    }

    public function pengaduan()
    {
        $pengaduans = Pengaduan::with(['tanggapan', 'user'])
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.masyarakat.pengaduan', [
            'pengaduans' => $pengaduans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->verifikasi == 'Belum di Verifikasi') {

            Alert::error('Mohon Maaf', 'Maaf akun anda belum di verifikasi oleh petugas');
        } else {

            $nik = Auth::user()->nik;
            $id = Auth::user()->id;
            $nama = Auth::user()->name;

            $data = $request->all();
            $data['user_nik'] = $nik;
            $data['user_id'] = $id;
            $data['nama'] = $nama;
            Pengaduan::create($data);
        }

        return redirect()->route('pengaduan.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduans = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        $tanggapans = Tanggapan::where('pengaduan_id', $id)->orderBy('created_at', 'DESC')->get();

        $penilaians = Penilaian::where('pengaduans_id', $id)->get();

        return view('pages.admin.pengaduan.detail', [
            'pengaduans' => $pengaduans,
            'tanggapans' => $tanggapans,
            'penilaians' => $penilaians

        ]);
    }

    public function detail_pengaduan($id)
    {
        $pengaduans = Pengaduan::with([
            'details', 'user',
        ])->findOrFail($id);

        $tanggapans = Tanggapan::where('pengaduan_id', $id)->orderBy('created_at', 'DESC')->get();

        $penilaians = Penilaian::where('pengaduans_id', $id)->get();

        return view('pages.masyarakat.detail', [
            'pengaduans' => $pengaduans,
            'tanggapans' => $tanggapans,
            'penilaians' => $penilaians
        ]);
    }


    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        Alert::success('Berhasil', 'Pengaduan Telah Dihapus');
        return redirect()->route('pengaduan.index');
    }


    public function cetakForm()
    {
        return view('pages.admin.pengaduan.export');
    }

    public function cetak(Request $request)
    {
        if (isset($_GET['cari'])) {
            $pengaduans = Pengaduan::whereBetween('created_at', [$request->start_date, $request->end_date])->get();

            $pdf = PDF::loadview('pages.admin.pengaduan.exportAll', compact('pengaduans'));
            return $pdf->download('laporan-semua-pengaduan.pdf');
        }
    }


    public function grafik_pengaduan()
    {

        $belumDiProses = Pengaduan::where('status', 'Belum di Proses')->count();
        $selesai = Tanggapan::where('status_pengaduan', 'Selesai')->count();
        $sedangDiProses = Tanggapan::where('status_pengaduan', 'Sedang di Proses')->count() - $selesai;


        return view('pages.admin.pengaduan.grafik', [
            'belumDiProses' => $belumDiProses,
            'sedangDiProses' => $sedangDiProses,
            'selesai' => $selesai
        ]);
    }

    public function grafik_pengaduan_camat()
    {

        $belumDiProses = Pengaduan::where('status', 'Belum di Proses')->count();
        $selesai = Tanggapan::where('status_pengaduan', 'Selesai')->count();
        $sedangDiProses = Tanggapan::where('status_pengaduan', 'Sedang di Proses')->count() - $selesai;


        return view('pages.admin.pengaduan.grafik', [
            'belumDiProses' => $belumDiProses,
            'sedangDiProses' => $sedangDiProses,
            'selesai' => $selesai
        ]);
    }

    public function pengaduan_success()
    {
        return view('pages.masyarakat.success');
    }
}
