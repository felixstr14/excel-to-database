<?php

namespace App\Http\Controllers;

use App\Imports\ZiaciImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use function PHPUnit\Framework\throwException;

class ZiaciController extends Controller
{
    /**
     * @param Request $request
     * @throws \Exception
     */
    public function import(Request $request)
    {
        if ($request->hasFile('excel')) {
            $ss = $request->file('excel')->getClientOriginalExtension();
            if ($ss == 'xls' || $ss == 'xlsx') {
                try {
                    Excel::import(new ZiaciImport(), $request->file('excel')->path(), null, \Maatwebsite\Excel\Excel::XLSX);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    foreach ($failures as $failure) {
                        $failure->row(); // row that went wrong
                        $failure->attribute(); // either heading key (if using heading row concern) or column index
                        $failure->errors(); // Actual error messages from Laravel validator
                        $failure->values(); // The values of the row that has failed.
                    }
                    throw new \Exception('Žiak s číslom isicu ' . $failure->values()['isic'] . ' uz je v databaze. Program sa zastavil.');
                }

                return response()->json([
                    'message' => 'Vaše údaje boli nahraté do databázy'
                ]);
            } else {
                throw new \Exception('Súbor nie je .xls alebo xlsx');
            }
        } else {
            throw new \Exception('Vložte súbor');
        }
    }
}
