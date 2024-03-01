<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MejaExport;

use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['meja'] = Meja::where('id', auth()->user()->id)->get();

        $meja = Meja::all();

        return view('meja.index', compact('meja'));
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
    public function store(StoreMejaRequest $request)
    {
        $request['id'] = auth()->user()->id;

        $input = Meja::create($request->all());

        return redirect(request()->segment(1).'/')->with('succes', 'Input data berhasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        $validated=$request->validated();
        $meja->update($validated);

        return redirect() -> route('meja.index') -> with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();

        return redirect('meja') -> with('success', 'Delete data berhasil!');
    }

    public function exportData(){
        $filename = date('Y-m-d').'_meja.xlsx';
        return Excel::download(new MejaExport, $filename);
    }
}
