<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\json;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::orderBy('kategori', 'ASC')
                    ->get();
        return view('halaman.kategori.kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman.kategori.kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required', 'unique'
        ]);
        try {
            Kategori::create([
                'kategori' => $request->kategori,
            ]);
            return redirect()->back()->with('toast_success', 'Data Disimpan');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori, $id)
    {
        $kategori = Kategori::find($id);
        return response()->json([
            'status'=>200,
            'kategori'=>$kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
            'kategori' => 'required', 'unique'
        ]);
        try {
            $kategori_id = $request->input('kategori_id');
            $kategori = Kategori::find($kategori_id);
            $kategori->kategori = $request->input('kategori');
            $kategori->update();

            return redirect()->back()->with('toast_success', 'Data Diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', 'Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori, $id)
    {
        Kategori::where('id', $id)->delete();
        return back()->with('toast_success', 'Data Dihapus');
    }
}
