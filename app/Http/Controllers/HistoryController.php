<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\WoData;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history.index');
    }

    public function show($id)
    {
        $breakdown = Breakdown::findOrFail($id);
        $wos = WoData::where('unit_code', $breakdown->unit_no)->orderBy('wo_date', 'asc')->get();
        return view('history.show', compact('breakdown', 'wos'));
    }

    public function data()
    {
        $list = Breakdown::where('status', 'RFU')->orderBy('end_date', 'desc')->get();

        return datatables()->of($list)
            ->editColumn('start_date', function ($list) {
                if ($list->start_date) {
                    return date('d-m-Y', strtotime($list->start_date));
                } else {
                    return '-';
                }
            })
            ->editColumn('end_date', function ($list) {
                if ($list->end_date) {
                    return date('d-m-Y', strtotime($list->end_date));
                } else {
                    return '-';
                }
            })
            ->addColumn('days', function ($list) {
                $start_date = new \DateTime($list->start_date);
                $end_date = new \DateTime($list->end_date);
                $diff = $start_date->diff($end_date);
                return $diff->days;
            })
            ->addIndexColumn()
            ->addColumn('action', 'history.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
