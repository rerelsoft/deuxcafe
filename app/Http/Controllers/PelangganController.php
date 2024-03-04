<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::where('id', auth()->user()->id)->get();
      
        $pelanggan = Pelanggan::all();
        // $kategori = Kategori::all();


        return view('pelanggan.index', compact('pelanggan'));
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
    public function store(StorePelangganRequest $request)
    {
        $request['id'] = auth()->user()->id;

        $input = Pelanggan::create($request->all());

        return redirect(request()->segment(1).'/')->with('succes', 'Input data berhasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $validated=$request->validated();
        $pelanggan->update($validated);

        return redirect() -> route('pelanggan.index') -> with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect('pelanggan') -> with('success', 'Delete data berhasil!');
    }

    public function exportData(){
        $filename = date('Y-m-d').'_pelanggan.xlsx';
        return Excel::download(new PelangganExport, $filename);
    }

    public function upload(Request $request)
    {
        Excel::import(new PelangganImport, $request->data_pelanggan);

        return redirect('pelanggan') -> with('success', 'Delete data berhasil!');
    }
}
