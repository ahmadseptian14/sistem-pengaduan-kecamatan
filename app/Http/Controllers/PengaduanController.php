<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();

        // $pengaduans = Pengaduan::orderBy('id', 'desc')->latest('id')->get();


        return view('pages.admin.pengaduan.index', [
            'pengaduans' => $pengaduans
        ]);
    }

    public function pengaduan()
    {
        $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();

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
        $request->validate([
            'description' => 'required',
        ]);

        $nik = Auth::user()->nik;
        $id = Auth::user()->id;
        $name = Auth::user()->name;

        $data = $request->all();
        $data['user_nik']=$nik;
        $data['user_id']=$id;
        $data['name']=$name;

        Alert::success('Berhasil', 'Pengaduan terkirim');

        Pengaduan::create($data);

        return redirect()->route('pengaduan.create');
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

        $tanggapan = Tanggapan::where('pengaduan_id',$id)->first();

        return view('pages.admin.pengaduan.detail',[
        'pengaduans' => $pengaduans,
        'tanggapan' => $tanggapan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        Alert::success('Berhasil', 'Pengaduan Telah Dihapus');
        return redirect()->route('pengaduan.index');
    }


    public function cetak()
    {
        $pengaduans = Pengaduan::all();

        $pdf = PDF::loadview('pages.admin.pengaduan.exportAll',compact('pengaduans'));
        return $pdf->download('laporan-semua-pengaduan.pdf');
    }
}
