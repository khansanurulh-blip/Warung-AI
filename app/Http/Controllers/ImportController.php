<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TransaksiImport;

class ImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function upload(\Illuminate\Http\Request $request)
    {
        Excel::import(
            new TransaksiImport,
            $request->file('file')
        );

        return back()->with(
            'success',
            'Data berhasil diimport'
        );
    }
}