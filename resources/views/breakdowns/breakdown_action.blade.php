<button data-toggle="modal" data-target="#update-action-{{ $model->id }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="edit / update action"><i class="fas fa-edit"></i></button>

<button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-action-{{ $model->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>

<div class="modal fade" id="delete-action-{{ $model->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Action</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('breakdowns.delete_action', $model->id) }}" method="POST">
          @csrf @method('DELETE')
          <p>Are you sure you want to delete this action?</p>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update-action-{{ $model->id }}">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Update Action</h3>
        </div>
        <form action="{{ route('breakdowns.update_action', $model->id) }}" method="POST">
          @csrf @method('PUT')
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="action">Action</label>
                  <input type="text" name="action" class="form-control" value="{{ $model->action }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <label for="start_date">Start Date</label>
                  <input type="date" name="start_date" class="form-control" value="{{ $start_date = $model->start_date ? date('Y-m-d', strtotime($model->start_date)) : null }}">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="start_time">Time </label>
                  <input type="time" name="start_time" class="form-control" value="{{ $start_date = $model->start_date ? date('H:i:s', strtotime($model->start_date)) : null }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <label for="end_date">Finish Date</label>
                  <input type="date" name="end_date" class="form-control" value="{{ $end_date = $model->end_date ? date('Y-m-d', strtotime($model->end_date)) : null }}">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="end_time">Time </label>
                  <input type="time" name="end_time" class="form-control" value="{{ $end_date = $model->end_date ? date('H:i:s', strtotime($model->end_date)) : null }}">
                </div>
              </div>
            </div>


          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
          </div>
        </form>
      </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
  </div> <!-- /.modal -->