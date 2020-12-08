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
    public function import(Request $request)
    {

        $request->validate([
            'file_input' => 'required'
        ]);

        Excel::import(new ZiaciImport(), $request->file('file_input')->path(), null, \Maatwebsite\Excel\Excel::XLSX);

    }
}
