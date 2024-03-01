<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\TransaksiRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(TransaksiRequest $request)
    {
        try {
            $datePrefix = date('Ymd');
            $lastTransaction = Transaksi::where('id', 'like', $datePrefix.'%')->orderBy('id', 'desc')->first();
            $lastIdNumber = $lastTransaction ? intval(substr($lastTransaction->id, 8)) : 0;
            $newIdNumber = $lastIdNumber + 1;
            $notrans = $datePrefix . sprintf('%04d', $newIdNumber);
        
            $insertTransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => '',
            ]);
        } catch (Exception | QueryException | PDOException $e) {
            return $e; // Note: Returning $e directly might not be a good practice for production environments due to security concerns.
            // Db::rollback(); // This line will not execute due to the return statement above it.
        }
        return $insertTransaksi;
        

    }

    public function faktur($nofaktur) {
        $data = Transaksi::where('id', $nofaktur)->with(['detailTransaksi'])->first();

        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
