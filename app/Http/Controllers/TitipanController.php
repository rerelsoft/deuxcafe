<?php

namespace App\Http\Controllers;

use App\Models\Titipan;
use App\Http\Requests\StoreTitipanRequest;
use App\Http\Requests\UpdateTitipanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TitipanExport;
use App\Imports\TitipanImport;
use Illuminate\Http\Request;

class TitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['titipan'] = Titipan::where('id', auth()->user()->id)->get();
      
        $titipan = Titipan::all();
        // $kategori = Kategori::all();


        return view('titipan.index', compact('titipan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTitipanRequest $request)
    {
        $request['id'] = auth()->user()->id;

        $input = Titipan::create($request->all());

        return redirect(request()->segment(1).'/')->with('succes', 'Input data berhasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Titipan $titipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titipan $titipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitipanRequest $request, Titipan $titipan)
    {
        $validated=$request->validated();
        $titipan->update($validated);

        return redirect() -> route('titipan.index') -> with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Titipan $titipan)
    {
        $titipan->delete();

        return redirect('titipan') -> with('success', 'Delete data berhasil!');
    }
    public function exportData(){
        $filename = date('Y-m-d').'_titipan.xlsx';
        return Excel::download(new TitipanExport, $filename);
    }

    public function upload(Request $request)
    {
        Excel::import(new TitipanImport, $request->data_titipan);

        return redirect('titipan') -> with('success', 'Delete data berhasil!');
    }
}
