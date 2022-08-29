<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penilaians = Penilaian::with(['user'])->orderBy('created_at', 'desc')->get();

        return view('pages.admin.penilaian.index', [
            'penilaians' => $penilaians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pengaduan = Pengaduan::with(['details', 'user'])->findOrFail($id);

        return view('pages.masyarakat.penilaian', [
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id = Auth::user()->id;
        $data = $request->all();
        $data['users_id']=$id;

        Alert::success('Berhasil', 'Penilaian terkirim');

        Penilaian::create($data);

        return redirect()->route('pengaduan.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }


    public function grafik()
    {
        $sangatBaik = Penilaian::where('rating', 'Sangat Baik')->count();
        $baik = Penilaian::where('rating', 'Baik')->count();
        $cukup = Penilaian::where('rating', 'Cukup')->count();
        $kurang = Penilaian::where('rating', 'Kurang')->count();

        return view('pages.admin.penilaian.grafik', [
            'sangatBaik' => $sangatBaik,
            'baik' => $baik,
            'cukup' => $cukup,
            'kurang' => $kurang
        ]);
    }
}
