<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Spesifikasi;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk     = Produk::all();
        $kategori   = Kategori::orderBy('kategori', 'ASC')
                    ->get();
        $spesifikasi= Spesifikasi::all();
        return view('halaman.produk.produk', compact('produk', 'kategori', 'spesifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('halaman.produk.produk', compact('kategori'));
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
            'produk'          => 'required',
            'gambar'        => 'required|image',
            'keterangan'    => 'required',
            'attribute'     => 'required',
            'value'         => 'required'
        ]);

        try {
            $produk = new Produk;
            $produk->produk = $request->produk;
            $produk->kategori_id = $request->kategori_id;
            $produk->keterangan = $request->keterangan;
            $produk->gambar = $request->file('gambar')->store('gambar-produk');

            if ($produk->save()) {
                foreach ($request->attribute as $key => $value) {
                    Spesifikasi::create([
                        'attribute'     => $request->input("attribute")[$key],
                        'value'         => $request->input("value")[$key],
                        'produk_id'     => $produk->id,
                    ]);
                }
            }
            return redirect()->back()->with('toast_success', 'Data Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk, $id)
    {
        $detailProduk = Produk::with(['spesifikasi']);

        // $detailProduk = Produk::join('spesifikasi','produk_id', '=', 'id')
        // ->where('id', $id)
        // ->get();
        // return view('/halaman/produk', compact('detailProduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk, $id)
    {
        $produk = Produk::find($id)
        -> first();
        return view('halaman.produk.ubah', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk, $id)
    {
        Produk::where('id', $id)->delete();
        return back()->with('toast_success', 'Data Dihapus');
    }
}
