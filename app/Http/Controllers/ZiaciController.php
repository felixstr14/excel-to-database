<?php

namespace App\Http\Controllers;

use App\Imports\ZiaciImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\throwException;

class ZiaciController extends Controller
{
    /**
     * @param Request $request
     * @throws \Exception
     */
    public function import(Request $request)
    {
        $ss = $request->file('image')->getClientOriginalExtension();

        $request->validate([
            'image' => 'required'
        ]);
        if ($ss == 'xls' || $ss == 'xlsx') {
            Excel::import(new ZiaciImport(), $request->file('image')->path(), null, \Maatwebsite\Excel\Excel::XLSX);
            return response()->json([
                'message' => 'Vaše údaje boli nahraté do databázy'
            ]);
        } else {
            throw new \Exception('Súbor nie je .xls alebo xlsx');
        }
    }
}
