<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = Kategori::where('id', auth()->user()->id)->get();

        $kategori = Kategori::all();

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        $request['id'] = auth()->user()->id;

        $input = Kategori::create($request->all());

        return redirect(request()->segment(1).'/')->with('succes', 'Input data berhasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $validated=$request->validated();
        $kategori->update($validated);

        return redirect() -> route('kategori.index') -> with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect('kategori') -> with('success', 'Delete data berhasil!');
    }

    public function exportData(){
        $filename = date('Y-m-d').'_kategori.xlsx';
        return Excel::download(new KategoriExport, $filename);
    }

    public function upload(Request $request)
    {
        Excel::import(new KategoriImport, $request->data_kategori);

        return redirect('kategori') -> with('success', 'Delete data berhasil!');
    }
}
