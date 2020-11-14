<?php

namespace App\Imports;
use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            'name'     => $row[0],
            'email'    => $row[1],
        ]);
    }
}
