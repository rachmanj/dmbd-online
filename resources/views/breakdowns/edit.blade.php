@extends('templates.main')

@section('title_page')
    Breakdown Data
@endsection

@section('breadcrumb_title')
    bd
@endsection

@section('content')
    <div class="row">
      <div class="col-10">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">New Breakdown Data</h3>
            <a href="{{ route('breakdowns.index') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-undo"></i> Back</a>
          </div>
          <div class="card-body">
            <form action="{{ route('breakdowns.update', $breakdown->id) }}" method="POST">
              @csrf @method('PUT')

              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="employee_id">Unit No</label>
                    <select name="unit_no" id="unit_no" class="form-control select2bs4 @error('unit_no') is-invalid @enderror">
                      <option value="">-- select Unit No --</option>
                      @foreach ($units as $unit)
                          <option value="{{ $unit }}" {{ $unit === $breakdown->unit_no ? 'selected' : '' }}>{{ $unit }}</option>
                      @endforeach
                    </select>
                    @error('unit_no')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="priority">Priority</label>
                    <select name="priority" id="priority" class="form-control">
                      @foreach ($priorities as $priority)
                          <option value="{{ $priority->priority_code }}" {{ $priority->priority_code === $breakdown->priority ? 'selected' : '' }}>{{ $priority->priority_code }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" value="{{ $breakdown->start_date }}" class="form-control @error('start_date') is-invalid @enderror">
                    @error('start_date')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                      <label for="hm">HM</label>
                      <input type="text" name="hm" value="{{ $breakdown->hm }}" class="form-control @error('hm') is-invalid @enderror">
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
                    <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ $breakdown->description }}</textarea>
                    @error('description')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
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
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  }) 
</script>
@endsection