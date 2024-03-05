<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use App\Http\Requests\StoreTentangRequest;
use App\Http\Requests\UpdateTentangRequest;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tentang.index');
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
    public function store(StoreTentangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tentang $tentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tentang $tentang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTentangRequest $request, Tentang $tentang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tentang $tentang)
    {
        //
    }
}
