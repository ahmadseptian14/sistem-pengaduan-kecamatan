<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakats = DB::table('users')->where('roles','=', 'USER')->get();

        return view('pages.admin.masyarakat.index', [
            'masyarakats' => $masyarakats
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $masyarakat = User::findOrFail($id);

        return view('pages.admin.masyarakat.edit' , [
            'masyarakat' => $masyarakat
        ]);
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
        $data = $request->all();

        $user = User::findOrFail($id);

        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }
        else
        {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('masyarakat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masyarakat = User::findOrFail($id);
        
        $masyarakat->delete();

        Alert::success('Berhasil', 'Masyarakat berhasil di hapus');

        return redirect()->route('masyarakat.index');
    }
}
