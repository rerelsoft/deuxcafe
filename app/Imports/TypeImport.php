<?php

namespace App\Imports;

use App\Models\Type;
use Maatwebsite\Excel\Concerns\ToModel;

class TypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Type([
            'nama_type' => $row[0],
            'kategori_id' => $row[1],
        ]);
    }
}
