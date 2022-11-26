
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
            <span class="time">Created by : {{ $breakdown->created_by }} at {{ date('d-m-Y H:i:s', strtotime('+8 hours', strtotime($breakdown->created_at))) }}</span>
            <div class="timeline-header">
                <h5>{{ $breakdown->plant_group }} - {{ $breakdown->unit_model }} | {{ $breakdown->project }} | start date: {{ date('d-m-Y H:i:s', strtotime($breakdown->start_date)) }}</h5>
            </div>

            <div class="timeline-body">
                <div class="row">
                    <div class="col-12">
                        {{ $breakdown->description }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <ul class="list-group list-group-unbordered mb-3 ml-3">
                        <li class="list-group-item">
                          <b>Status:</b> <a class="float-right">{{ $breakdown->status }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Priority</b> <a class="float-right">{{ $breakdown->priority }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>BD Code</b> <a class="float-right">{{ $breakdown->bd_code }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-group list-group-unbordered mb-3 mr-3">
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
                <div class="col-4">
                    
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