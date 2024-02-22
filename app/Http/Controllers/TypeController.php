<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Kategori;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['type'] = Type::where('id', auth()->user()->id)->get();
      
        $type = Type::all();
        $kategori = Kategori::all();


        return view('type.index', compact('type'), compact('kategori'));
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
    public function store(StoreTypeRequest $request)
    {
        $request['id'] = auth()->user()->id;

        $input = Type::create($request->all());

        return redirect(request()->segment(1).'/')->with('succes', 'Input data berhasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */



    // public function edit(Type $type)
    // {
        
    // }

    public function edit(Type $type)
    {
    
    }
    
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $validated=$request->validated();
        $type->update($validated);

        return redirect() -> route('type.index') -> with('success', 'Update data berhasil');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect('type') -> with('success', 'Delete data berhasil!');
    }
}
