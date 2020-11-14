<?php

namespace App\Exports;
use App\Models\Products;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('excel.excel', [
            'Products' => Products::all()
        ]);

    }
}
