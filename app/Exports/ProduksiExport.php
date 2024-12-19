<?php

namespace App\Exports;

use App\Models\Produksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produksi::all();
    }
}
