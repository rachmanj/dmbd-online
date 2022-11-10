<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\WoData;
use Carbon\Carbon;

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
                    return date('d-m-Y H:i:s', strtotime($list->start_date));
                } else {
                    return '-';
                }
            })
            ->editColumn('end_date', function ($list) {
                if ($list->end_date) {
                    return date('d-m-Y H:i:s', strtotime($list->end_date));
                } else {
                    return '-';
                }
            })
            ->addColumn('days', function ($list) {
                $end_date = Carbon::createFromFormat('Y-m-d H:s:i', $list->end_date);
                $start_date = Carbon::createFromFormat('Y-m-d H:s:i', $list->start_date);
                $days = $start_date->diffInDays($end_date);
                $hours = $start_date->copy()->addDays($days)->diffInHours($end_date);
                $minutes = $start_date->copy()->addDays($days)->addHours($hours)->diffInMinutes($end_date);
                return $days . 'd ' . $hours . 'h ' . $minutes . 'm';
            })
            ->addIndexColumn()
            ->addColumn('action', 'history.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
