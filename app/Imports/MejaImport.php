<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;

class MejaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Meja([
            'nomor_meja' => $row[0],
            'kapasitas' => $row[1],
            'status' => $row[2],
        ]);
    }
}
