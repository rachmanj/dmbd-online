<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\Priority;
use App\Models\WoData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BreakdownController extends Controller
{
    public function index()
    {
        return view('breakdowns.index');
    }

    public function create()
    {
        // send request to API
        $response = Http::get('http://192.168.33.18:8080/ark-fleet/api/equipments');
        $units = $response['data'];

        // $units = ['E 021', 'E 022', 'DZ 103', 'RD 054'];
        // select unit_code from WoData and distinct
        // $units = WoData::select('unit_code', 'unit_model')->distinct()->orderBy('unit_code', 'asc')->get();

        return view('breakdowns.create', compact('units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_code' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'hm' => 'required',
            'description' => 'required',
        ]);

        // send request to API
        $response = Http::get('http://192.168.33.18:8080/ark-fleet/api/equipments');
        $units = collect($response->json()['data']);
        $breakdown_unit = $units->where('unit_code', $request->unit_code)->first();
        $project = $breakdown_unit['project'];

        $breakdown = new Breakdown();
        $breakdown->unit_code = $request->unit_code;
        $breakdown->priority = $request->priority;
        $breakdown->start_date = $request->start_date . ' ' . $request->start_time . ':00';
        $breakdown->hm = $request->hm;
        $breakdown->project = $project;
        $breakdown->description = $request->description;
        $breakdown->status = 'BD';
        $breakdown->created_by = auth()->user()->username;
        $breakdown->save();

        $breakdown->bd_no = 'BD/' . $breakdown->id;
        $breakdown->save();

        return redirect()->route('breakdowns.index')
            ->with('success', 'Breakdown data created successfully.');
    }

    public function edit($id)
    {
        // send request to API
        $response = Http::get('http://192.168.33.18:8080/ark-fleet/api/equipments');
        $units = $response['data'];

        $breakdown = Breakdown::findOrFail($id);
        // $units = WoData::select('unit_code', 'unit_model')->distinct()->orderBy('unit_code', 'asc')->get();

        $priorities = Priority::orderBy('priority_code', 'asc')->get();
        $st_date = date('Y-m-d', strtotime($breakdown->start_date));
        $st_time = date('H:i:s', strtotime($breakdown->start_date));

        return view('breakdowns.edit', compact('units', 'breakdown', 'priorities', 'st_date', 'st_time'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'unit_code' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'hm' => 'required',
            'description' => 'required',
        ]);

        $breakdown = Breakdown::findOrFail($id);

        // send request to API
        $response = Http::get('http://192.168.33.18:8080/ark-fleet/api/equipments');
        $units = collect($response->json()['data']);
        $breakdown_unit = $units->where('unit_code', $request->unit_code)->first();
        $project = $breakdown_unit['project'];

        $breakdown->unit_code = $request->unit_code;
        $breakdown->priority = $request->priority;
        $breakdown->start_date = $request->start_date . ' ' . $request->start_time;
        $breakdown->hm = $request->hm;
        $breakdown->project = $project;
        $breakdown->description = $request->description;
        $breakdown->created_by = auth()->user()->username;
        $breakdown->save();

        return redirect()->route('breakdowns.index')
            ->with('success', 'Breakdown data updated successfully.');
    }

    public function show($id)
    {
        $breakdown = Breakdown::findOrFail($id);
        $unit_model = WoData::where('unit_code', $breakdown->unit_code)->first()->unit_model;
        $wos = WoData::where('unit_code', $breakdown->unit_code)->orderBy('wo_date', 'asc')->get();
        $st_date = date('Y-m-d', strtotime($breakdown->start_date));
        $st_time = date('H:i:s', strtotime($breakdown->start_date));
        return view('breakdowns.show', compact('breakdown', 'wos', 'unit_model', 'st_date', 'st_time'));
    }

    public function update_status(Request $request, $id)
    {
        if ($request->rfu_date) {
            $request->validate([
                'rfu_time' => 'required',
            ]);
            $rfu_date = $request->start_date . ' ' . $request->start_time . ':00';
        } else {
            $time = date('H:i:s', time() + 28800);
            $rfu_date = date('Y-m-d') . ' ' . $time;
        }

        $breakdown = Breakdown::findOrFail($id);
        $breakdown->status = 'RFU';
        $breakdown->end_date = $rfu_date;
        $breakdown->save();

        return redirect()->route('breakdowns.index')
            ->with('success', $breakdown->unit_no . ' status now RFU.');
    }

    public function destroy($id)
    {
        $breakdown = Breakdown::findOrFail($id);
        $breakdown->delete();

        return redirect()->route('breakdowns.index')
            ->with('success', 'Breakdown data deleted successfully.');
    }

    public function data()
    {
        $list = Breakdown::where('status', 'bd')->orderBy('start_date', 'asc')->get();

        return datatables()->of($list)
            ->editColumn('start_date', function ($list) {
                if ($list->start_date) {
                    return date('d-m-Y H:i:s', strtotime($list->start_date));
                } else {
                    return '-';
                }
            })
            ->addIndexColumn()
            ->addColumn('action', 'breakdowns.action')
            ->addColumn('days', 'breakdowns.days')
            ->rawColumns(['action', 'days'])
            ->toJson();
    }

    public function wo_data($id)
    {
        $breakdown = Breakdown::findOrFail($id);
        $unit_wos = WoData::where('unit_code', $breakdown->unit_code)->orderBy('wo_date', 'asc')->distinct()->get(['wo_no', 'project', 'wo_date', 'wo_status', 'unit_code', 'status_position']);

        return datatables()->of($unit_wos)
            ->editColumn('wo_date', function ($unit_wos) {
                if ($unit_wos->wo_date) {
                    return date('d-m-Y', strtotime($unit_wos->wo_date));
                } else {
                    return '-';
                }
            })
            ->addColumn('days', function ($unit_wos) {
                if ($unit_wos->wo_date) {
                    $start_date = new \DateTime($unit_wos->wo_date);
                    $now = new \DateTime();
                    $diff = $start_date->diff($now);
                    return $diff->days;
                } else {
                    return '-';
                }
            })
            ->addIndexColumn()
            ->toJson();
    }
}
