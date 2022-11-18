
@foreach ($breakdowns as $breakdown)
    
    <!-- timeline time label -->
    <div class="time-label">
        <span class="{{ now()->diffInDays($breakdown->start_date) > 30 ? "bg-red" : 'bg-green' }}">{{ $breakdown->unit_code }}</span>
    </div>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <div>
        {{-- <i class="fas fa-envelope bg-blue"></i> --}}
        <div class="timeline-item">
            <span class="time"></span>
            <div class="timeline-header">
                <h5><a href="#">{{ $units->where('unit_code', $breakdown->unit_code)->first()['plant_group'] }} - {{ $units->where('unit_code', $breakdown->unit_code)->first()['model'] }} | {{ $breakdown->project }} </a> | <i class="fas fa-clock"></i> {{ date('d-m-Y H:i:s', strtotime($breakdown->start_date)) }}</h5>
            </div>

            <div class="timeline-body">
                {{ $breakdown->description }}
                <br>
                <div class="col-4">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>WO Open:</b> <a class="float-right">{{ $wos->where('unit_code', $breakdown->unit_code)->count() }} WOs</a>
                        </li>
                        <li class="list-group-item">
                          <b>Actions/Job Remaining</b> <a class="float-right">{{ $breakdown->breakdownActions->whereNull('end_date')->count() . ' of ' . $breakdown->breakdownActions->count() }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Days Passed</b> <a class="float-right">{{ $diff = now()->diffInDays($breakdown->start_date) }} days</a>
                        </li>
                    </ul>
                </div>

            </div>
    
            {{-- <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Read more</a>
                <a class="btn btn-success btn-xs">Update to RFU</a>
                <a class="btn btn-info btn-xs">Add Action/Job</a>
                <a class="btn btn-warning btn-xs">Edit</a>
                <a class="btn btn-danger btn-xs">Delete</a>
            </div> --}}
        </div>
    </div>
    <!-- END timeline item -->

@endforeach