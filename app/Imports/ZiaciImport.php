<?php

namespace App\Imports;

use App\Models\Ziak;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZiaciImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key => $row) {
            Ziak::create([
                'meno'     => $row['meno'],
                'priezvisko'    => $row['priezvisko'],
                'stipendium' => $row['stipendium'] == 'ano' ? true : false
            ]);
        }
    }
}
