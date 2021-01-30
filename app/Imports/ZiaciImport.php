<?php

namespace App\Imports;

use App\Models\Ziak;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class ZiaciImport implements WithHeadingRow, ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ziak([
            'meno'     => $row['meno'],
            'priezvisko'    => $row['priezvisko'],
            'stipendium' => $row['stipendium'] == 'ano' ? true : false,
            'isic' => $row['isic']
        ]);
    }

    public function rules(): array
    {
        return [
            'isic' => Rule::unique('ziaci', 'isic'),
        ];
    }

    public function customValidationMessages()
    {
        return [
            'isic.unique' => 'Duplikatny ziak',
        ];
    }
}
