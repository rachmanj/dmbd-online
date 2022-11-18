@extends('templates.main')

@section('title_page')
    Breakdown Data - Add Actions
@endsection

@section('breadcrumb_title')
    bd
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><h3> {{ $breakdown->unit_code }} | {{ $unit_breakdown->unit_type }} | {{ $unit_breakdown->unit_model }}</h3></div>
                <a href="{{ route('breakdowns.index') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-undo"></i> Back to List</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">

            <form action="{{ route('breakdowns.add_action', $breakdown->id) }}" method="POST">
                @csrf
            <div class="card-body">
                
                <div class="row">
                    <div class="col-7">
                        <div class="form-group">
                            <label for="action">New Action / Job</label>
                            <input type="text" name="action" value="{{ old('action') }}" class="form-control @error('action') is-invalid @enderror">
                            @error('action')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror">
                            @error('start_date')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="time" name="start_time" value="{{ old('start_time') }}" class="form-control @error('start_time') is-invalid @enderror">
                            @error('start_time')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Add</button>
            </div>
            </form>
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="action-data" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
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
  <script src="{{ asset('adminlte/swal2/sweetalert2.all.min.js') }}"></script>

  
  <script>
    $(function () {
      $("#action-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('breakdowns.action_data', $breakdown->id) }}',
        columns: [
          {data: 'DT_RowIndex', orderable: false, searchable: false},
          {data: 'action'},
          {data: 'start_date'},
          {data: 'end_date'},
          {data: 'duration'},
          {data: 'opsi'},
        ],
        fixedHeader: true,
      })
    });

   
  </script>
  
@endsection