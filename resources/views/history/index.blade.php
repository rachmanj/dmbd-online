@extends('templates.main')

@section('title_page')
    Breakdown Histories
@endsection

@section('breadcrumb_title')
    breakdown
@endsection

@section('content')
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        {{--  --}}
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="breakdowns-history" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>BD No</th>
            <th>Unit No</th>
            <th>Start D</th>
            <th>RFU D</th>
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
      $("#breakdowns-history").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('history.data') }}',
        columns: [
          {data: 'DT_RowIndex', orderable: false, searchable: false},
          {data: 'bd_no'},
          {data: 'unit_code'},
          {data: 'start_date'},
          {data: 'end_date'},
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
  

@endsection