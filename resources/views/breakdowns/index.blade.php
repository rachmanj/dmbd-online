@extends('templates.main')

@section('title_page')
    Breakdown Units
@endsection

@section('breadcrumb_title')
    breakdown
@endsection

@section('content')
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        <b>Table Look</b> | <a href="{{ route('breakdowns.timeline') }}">Timeline Look</a>
        <a href="{{ route('breakdowns.create') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Breakdown Data</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="breakdowns" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>BD No</th>
            <th>Unit No</th>
            {{-- <th>Info</th> --}}
            <th>Project</th>
            <th>Start Date</th>
            <th>Days</th>
            <th>Description</th>
            <th>action</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

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
      $("#breakdowns").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('breakdowns.data') }}',
        columns: [
          {data: 'DT_RowIndex', orderable: false, searchable: false},
          {data: 'bd_no'},
          {data: 'unit_code'},
          // {data: 'info'},
          {data: 'project'},
          {data: 'start_date'},
          {data: 'days'},
          {data: 'description'},
          {data: 'action'},
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

  <script>
    // tooltip
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  

@endsection