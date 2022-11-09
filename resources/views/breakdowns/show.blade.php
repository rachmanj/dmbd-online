@extends('templates.main')

@section('title_page')
    Breakdown Data
@endsection

@section('breadcrumb_title')
    bd
@endsection

@section('content')
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h1 class="card-title"><b>Unit No: {{ $breakdown->unit_code }}</b></h1>
            <a href="{{ route('breakdowns.index') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-undo"></i> Back</a>
          </div>
          <div class="card-body">
            <form>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="unit_code">Unit No</label>
                            <input type="text" name="unit_code" value="{{ $breakdown->unit_code . ' - ' . $unit_model }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        
                    </div>
                </div>
  
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="text" name="priority" value="{{ $breakdown->priority }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" value="{{ $breakdown->start_date }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="hm">HM</label>
                            <input type="text" name="hm" value="{{ $breakdown->hm }}" class="form-control" readonly>
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
                            <table id="wo-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>WO No</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Unit Status</th>
                                        <th class="text-right">Days</th>
                                    </tr>
                                </thead>
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

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/plugins/datatables/css/datatables.min.css') }}"/>
@endsection

@section('scripts')
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables/datatables.min.js') }}"></script>

  
  <script>
    $(function () {
      $("#wo-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('breakdowns.wo_data', $breakdown->id) }}',
        columns: [
          {data: 'DT_RowIndex', orderable: false, searchable: false},
          {data: 'wo_no'},
          {data: 'wo_date'},
          {data: 'wo_status'},
          {data: 'status_position'},
          {data: 'days'},
        ],
        fixedHeader: true,
        columnDefs: [
              {
                "targets": [5],
                "className": "text-right"
              }
            ]
      })
    });
  </script>
@endsection



