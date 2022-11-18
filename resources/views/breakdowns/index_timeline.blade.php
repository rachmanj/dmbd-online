@extends('templates.main')

@section('title_page')
    Breakdown Units
@endsection

@section('breadcrumb_title')
    breakdown
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('breakdowns.index') }}">Table Look</a> | <b>Timeline Look</b>
      </div>
    </div>

    <div class="timeline">

      @include('breakdowns.timeline')
      
    </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@endsection
