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
            <h3 class="card-title">New Breakdown Data</h3>
            <a href="{{ route('breakdowns.index') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-undo"></i> Back</a>
          </div>
          <div class="card-body">
            <form action="{{ route('breakdowns.store') }}" method="POST">
              @csrf

              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="unit_code">Unit No | Group | Model | Project</label>
                    <select name="unit_code" id="unit_code" class="form-control select2bs4 @error('unit_code') is-invalid @enderror">
                      <option value="">-- select Unit No --</option>
                      @foreach ($units as $unit)
                          <option value="{{ $unit['unit_code'] }}">{{ $unit['unit_code'] . ' | ' . $unit['plant_group'] . ' | ' . $unit['model'] . ' | ' . $unit['project'] }}</option>
                      @endforeach
                    </select>
                    @error('unit_code')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="plant_group">Plant Group</label>
                    <input type="text" name="plant_group" id="plant_group" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="unit_model">Model</label>
                    <input type="text" name="unit_model" id="unit_model" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="project">Project</label>
                    <input type="text" name="project" id="project" class="form-control" readonly>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="priority">Priority</label>
                    <select name="priority" id="priority" class="form-control">
                      <option value="tba">tba</option>
                      <option value="P1">P1</option>
                      <option value="P2">P2</option>
                      <option value="P3">P3</option>
                    </select>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="bd_code">Breakdown Code</label>
                    <select name="bd_code" id="bd_code" class="form-control">
                      <option value="">-- select BD Code --</option>
                      @foreach ($bd_codes as $bd_code)
                          <option value="{{ $bd_code->code }}">{{ $bd_code->code }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-4">
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
                <div class="col-6">
                    <div class="form-group">
                      <label for="hm">HM</label>
                      <input type="text" name="hm" value="{{ old('hm') }}" class="form-control @error('hm') is-invalid @enderror">
                      @error('hm')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                
              </div>

              <div class="row">
                
                <div class="col-12">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ old('description') }}</textarea>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
@endsection

@section('styles')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  //set input textbox value when select option
  $(document).ready(function() {
    $('#unit_code').on('change', function() {
      if (unit_code) {
        let plant_group = $('#unit_code option:selected').text().split('|')[1];
        let model = $('#unit_code option:selected').text().split('|')[2];
        let project = $('#unit_code option:selected').text().split('|')[3];
        $('#plant_group').val(plant_group);
        $('#unit_model').val(model);
        $('#project').val(project);
      
      } else {
        $('#project').empty();
      }
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }) 
</script>

@endsection