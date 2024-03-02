<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StokExport;

use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['stok'] = Stok::where('id', auth()->user()->id)->get();
      
        $stok = Stok::all();
        $menu = Menu::all();


        return view('stok.index', compact('stok'), compact('menu'));
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
    public function store(StoreStokRequest $request)
    {
        $request['id'] = auth()->user()->id;

        $input = Stok::create($request->all());

        return redirect(request()->segment(1).'/')->with('succes', 'Input data berhasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        $validated=$request->validated();
        $stok->update($validated);

        return redirect() -> route('stok.index') -> with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        $stok->delete();

        return redirect('stok') -> with('success', 'Delete data berhasil!');
    }

    public function exportData(){
        $filename = date('Y-m-d').'_stok.xlsx';
        return Excel::download(new StokExport, $filename);
    }
}
