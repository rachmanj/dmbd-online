@extends('templates.main')

@section('title_page')
    Breakdown History Data
@endsection

@section('breadcrumb_title')
    bd
@endsection

@section('content')
    <div class="row">
      <div class="col-10">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Breakdown History Data</h3>
            <a href="{{ route('history.index') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-undo"></i> Back</a>
          </div>
          <div class="card-body">
            <form>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_id">Unit No</label>
                            <input type="text" name="unit_no" value="{{ $breakdown->unit_no }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="text" name="priority" value="{{ $breakdown->priority }}" class="form-control" readonly>
                        </div>
                    </div>
                </div>
  
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="text" name="start_date" value="{{ date('d-m-Y', strtotime($breakdown->start_date)) }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="hm">HM</label>
                            <input type="text" name="hm" value="{{ $breakdown->hm }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="end_date">RFU Date</label>
                            <input type="text" name="end_date" value="{{ date('d-m-Y', strtotime($breakdown->end_date)) }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="days">Days</label>
                            <input type="text" name="days" value="{{ $diff = Carbon\Carbon::parse($breakdown->start_date)->diffInDays(Carbon\Carbon::parse($breakdown->end_date)) }}" class="form-control" readonly>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4" class="form-control" readonly>{{ $breakdown->description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>WO Reference</label>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Unit Status</th>
                                        <th class="text-right">Days</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wos as $wo)
                                    <tr>
                                        <td>{{ $wo->wo_no }}</td>
                                        <td>{{ date('d-m-Y', strtotime($wo->wo_date)) }}</td>
                                        <td>{{ $wo->wo_status }}</td>
                                        <td>{{ $wo->status_position }}</td>
                                        <td class="text-right">{{ $diff = Carbon\Carbon::parse($wo->wo_date)->diffInDays() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </form>

          </div>
        </div>
      </div>
    </div>
@endsection



