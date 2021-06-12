<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Tugas';
        $data=antrian::all();
        return view('admin.antrian.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_kategori=kategori::all();
        $pagename = 'Form Input Antrian';
        return view('admin.antrian.create', compact('pagename', 'data_kategori'));
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
        //berfungsi agar data kosong harus diisi alias tidak boleh kosong
        $request->validate([
            'txtno_antrian' => 'required',
            'txtnama_antrian' => 'required',
            'txtalamat_pengantri' => 'required',
        ]);
        

        $data_tugas=new antrian([
            'no_antrian' => $request->get('txtno_antrian'),
            'nama_antrian' => $request->get('txtnama_antrian'),
            'alamat_pengantri' => $request->get('txtalamat_pengantri'),
        ]);

        $data_tugas->save();
        return redirect('admin/antrian')->with('sukses', 'antrian berhasil disimpan');
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
        $data_kategori=kategori::all();
        $pagename='Update Antrian';
        $data=antrian::find($id);
        return view('admin.antrian.edit', compact('data', 'pagename', 'data_kategori'));
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
         $request->validate([
            'txtno_antrian' => 'required',
            'txtnama_antrian' => 'required',
            'txtalamat_pengantri' => 'required',
        ]);
        
        $antrian=antrian::find($id);
        
        $antrian->no_antrian = $request->get('txtno_antrian');
        $antrian->nama_antrian = $request->get('txtnama_antrian');
        $antrian->alamat_pengantri = $request->get('txtalamat_pengantri');
    

        $antrian->save();
        return redirect('admin/antrian')->with('sukses', 'antrian berhasil diupdate');
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

        $antrian =antrian::find($id);

        $antrian->delete();
        return redirect('admin/antrian')->with('sukses', 'antrian berhasil dihapus');
    }
}
