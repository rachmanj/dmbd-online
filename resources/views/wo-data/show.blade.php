@extends('templates.main')

@section('title_page')
    Work Order Detail
@endsection

@section('breadcrumb_title')
    wo
@endsection

@section('content')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">WO Detail</div>
            <a href="{{ route('wo-data.index') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-undo"></i> Back</a>
          </div>
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4 text-right">project</dt>
              <dd class="col-sm-8">{{ $wo_detail->project }}</dd>
              <dt class="col-sm-4 text-right">plant_group</dt>
              <dd class="col-sm-8">{{ $wo_detail->plant_group }}</dd>
              <dt class="col-sm-4 text-right">unit_type</dt>
              <dd class="col-sm-8">{{ $wo_detail->unit_type }}</dd>
              <dt class="col-sm-4 text-right">unit_code</dt>
              <dd class="col-sm-8">{{ $wo_detail->unit_code }}</dd>
              <dt class="col-sm-4 text-right">unit_model</dt>
              <dd class="col-sm-8">{{ $wo_detail->unit_model }}</dd>
              <dt class="col-sm-4 text-right">wo_status</dt>
              <dd class="col-sm-8">{{ $wo_detail->wo_status }}</dd>
              <dt class="col-sm-4 text-right">status_position</dt>
              <dd class="col-sm-8">{{ $wo_detail->status_position }}</dd>
              <dt class="col-sm-4 text-right">hour_meter</dt>
              <dd class="col-sm-8">{{ $wo_detail->hour_meter }}</dd>
              <dt class="col-sm-4 text-right">activity_code</dt>
              <dd class="col-sm-8">{{ $wo_detail->activity_code }}</dd>
              <dt class="col-sm-4 text-right">malfunction_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->malfunction_date }}</dd>
              <dt class="col-sm-4 text-right">malfunction_time</dt>
              <dd class="col-sm-8">{{ $wo_detail->malfunction_time }}</dd>
              <dt class="col-sm-4 text-right">days_of_breakdown</dt>
              <dd class="col-sm-8">{{ $wo_detail->days_of_breakdown }}</dd>
              <dt class="col-sm-4 text-right">notification_description</dt>
              <dd class="col-sm-8">{{ $wo_detail->notification_description }}</dd>
              <dt class="col-sm-4 text-right">job_category</dt>
              <dd class="col-sm-8">{{ $wo_detail->job_category }}</dd>
              <dt class="col-sm-4 text-right">wo_no</dt>
              <dd class="col-sm-8">{{ $wo_detail->wo_no }}</dd>
              <dt class="col-sm-4 text-right">call_id</dt>
              <dd class="col-sm-8">{{ $wo_detail->call_id }}</dd>
              <dt class="col-sm-4 text-right">last_operator_id</dt>
              <dd class="col-sm-8">{{ $wo_detail->last_operator_id }}</dd>
              <dt class="col-sm-4 text-right">wo_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->wo_date }}</dd>
              <dt class="col-sm-4 text-right">mr_no</dt>
              <dd class="col-sm-8">{{ $wo_detail->mr_no }}</dd>
              <dt class="col-sm-4 text-right">mr_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->mr_date }}</dd>
              <dt class="col-sm-4 text-right">mr_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->mr_date }}</dd>
              <dt class="col-sm-4 text-right">mr_status</dt>
              <dd class="col-sm-8">{{ $wo_detail->mr_status }}</dd>
              <dt class="col-sm-4 text-right">first_mi_no</dt>
              <dd class="col-sm-8">{{ $wo_detail->first_mi_no }}</dd>
              <dt class="col-sm-4 text-right">first_mi_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->first_mi_date }}</dd>
              <dt class="col-sm-4 text-right">last_mi_no</dt>
              <dd class="col-sm-8">{{ $wo_detail->last_mi_no }}</dd>
              <dt class="col-sm-4 text-right">last_mi_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->last_mi_date }}</dd>
              <dt class="col-sm-4 text-right">pr_no</dt>
              <dd class="col-sm-8">{{ $wo_detail->pr_no }}</dd>
              <dt class="col-sm-4 text-right">po_no</dt>
              <dd class="col-sm-8">{{ $wo_detail->po_no }}</dd>
              <dt class="col-sm-4 text-right">po_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->po_date }}</dd>
              <dt class="col-sm-4 text-right">mr_date</dt>
              <dd class="col-sm-8">{{ $wo_detail->mr_date }}</dd>
              <dt class="col-sm-4 text-right">Remarks</dt>
              <dd class="col-sm-8">{{ $wo_detail->remarks }}</dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
@endsection