<?php

namespace App\Imports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToModel;

class StokImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Stok([
            'menu_id' => $row[0],
            'jumlah' => $row[1],
        ]);
    }
}
