<div class="row">
    <div class="col-4">
        <div class="card card-info">
            <div class="card-header border-transparent">
                <h3 class="card-title"><b>Active Equipment by Project</b></h3>
            </div>
            <div class="card-body p-0">
                <table class="table m-0 table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th class="text-right">Count</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($projects as $project)
                           <tr>
                                <td>{{ $project }}</td>
                                <td class="text-right">{{ $count_active_by_project->where('project_code', $project)->first()['count'] }}
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4"></div>
    <div class="col-4"></div>
</div>