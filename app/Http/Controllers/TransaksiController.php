<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
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
            // Memulai transaksi database. Ini memastikan bahwa semua operasi database yang berikutnya dijalankan sebagai satu unit kerja.
            DB::beginTransaction();
        
            // Membuat prefix tanggal untuk ID transaksi, yang diharapkan berupa format 'Ymd', misalnya '20240306'.
            $datePrefix = date('Ymd');
        
            // Mencari transaksi terakhir yang ID-nya dimulai dengan prefix tanggal saat ini. Ini digunakan untuk menghasilkan ID transaksi baru.
            $lastTransaction = Transaksi::where('id', 'like', $datePrefix.'%')->orderBy('id', 'desc')->first();
        
            // Jika ada transaksi terakhir, mengambil angka terakhir dari ID transaksi tersebut dan menambahkannya dengan 1 untuk menghasilkan ID baru.
            // Jika tidak ada transaksi terakhir, menggunakan angka 0 sebagai awal.
            $lastIdNumber = $lastTransaction ? intval(substr($lastTransaction->id, 8)) : 0;
            $newIdNumber = $lastIdNumber + 1;
        
            // Menggabungkan prefix tanggal dengan angka ID baru yang telah dihasilkan, untuk membentuk ID transaksi baru.
            $notrans = $datePrefix . sprintf('%04d', $newIdNumber);
        
            // Membuat entri baru di tabel `Transaksi` dengan data yang diberikan.
            $insertTransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => 'success',
            ]);
        
            // Memeriksa apakah entri baru berhasil dibuat. Jika tidak, mengembalikan string 'error'.
            if (!$insertTransaksi->exists) return 'error';
        
            // Proses input detail transaksi. Iterasi melalui setiap item dalam `orderedList` dari request,
            // dan membuat entri baru di tabel `DetailTransaksi` untuk setiap item.
            foreach ($request->orderedList as $detail) {
                $insertDetailTransaksi = DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    // Ada kesalahan dalam kode ini, dimana `$detail['harga']` harus dikalikan dengan `$detail['qty']` untuk menghitung subtotal,
                    // bukan menggantikan nilai `$detail['harga']` dengan `$detail['qty']`.
                    'subtotal' => $detail['harga'] * $detail['qty'],
                ]);
            }
        
            // Jika semua operasi berhasil, mengakhiri transaksi database dengan commit.
            DB::commit();
        
            // Mengembalikan respons JSON dengan status sukses, pesan, dan ID transaksi baru.
            return response()->json(['status' => true, 'message' => 'pemesanan berhasil','notrans'=>$notrans]);
        } catch (Exception | QueryException | PDOException $e) {
            // Jika terjadi kesalahan, menampilkan detail kesalahan (tidak disarankan untuk produksi karena alasan keamanan).
            dd($e);
        
            // Mengembalikan respons JSON dengan status gagal dan pesan.
            return response()->json(['status' => false, 'message' => 'pemesanan gagal']);
        
            // Mengembalikan objek kesalahan sebagai respons, yang juga tidak disarankan untuk produksi.
            return $e;
        
            // Mengakhiri transaksi database dengan rollback, memastikan bahwa perubahan yang dilakukan sebelumnya tidak disimpan.
            DB::rollback();
        }
        
        // Mengembalikan objek transaksi yang baru saja dibuat. Ini baris kode tidak akan pernah dieksekusi karena adanya `return` sebelumnya.
        return $insertTransaksi;
        
        

    }

    public function faktur($nofaktur) {
        try {
        $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function
         ($query){
            $query->with('menu');
         }])->first();
             return view('cetak.faktur')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'pemesanan gagal']);

        }

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
