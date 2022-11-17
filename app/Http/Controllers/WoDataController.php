<?php

namespace App\Http\Controllers;

use App\Imports\WoDataImport;
use App\Models\WoData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WoDataController extends Controller
{
    public function index()
    {
        return view('wo-data.index');
    }

    public function upload(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file_upload' => 'required|mimes:xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file_upload');

        // membuat nama file unik
        $nama_file = rand() . '_' . $file->getClientOriginalName();

        // upload ke folder file_upload
        $file->move('file_upload', $nama_file);

        // import data
        Excel::import(new WoDataImport, public_path('/file_upload/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->route('wo-data.index')->with('success', 'Table successfully uploaded!');
    }

    public function show($id)
    {
        $wo_detail = WoData::findOrFail($id);
        return view('wo-data.show', compact('wo_detail'));
    }

    public function truncate()
    {
        WoData::truncate();

        return redirect()->route('wo-data.index')->with('success', 'Table has been truncated.');
    }

    public function data()
    {
        $wo_opens = WoData::orderBy('wo_date', 'desc')->get();

        return datatables()->of($wo_opens)
            ->editColumn('wo_date', function ($wo_opens) {
                if ($wo_opens->wo_date) {
                    return date('d-m-Y', strtotime($wo_opens->wo_date));
                } else {
                    return '-';
                }
            })
            ->addColumn('days', function ($wo_opens) {
                if ($wo_opens->wo_date) {
                    $date = Carbon::parse($wo_opens->wo_date);
                    return $date->diffInDays(Carbon::now());
                } else {
                    return '-';
                }
            })
            ->addIndexColumn()
            ->addColumn('action', 'wo-data.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
