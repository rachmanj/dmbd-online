<a href="{{ route('breakdowns.edit', $model->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
<a href="{{ route('breakdowns.show', $model->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-search"></i></a>
<button data-toggle="modal" data-target="#update-status-{{ $model->id }}" class="btn btn-xs btn-success"><i class="fas fa-thumbs-up"></i></button>
<form action="{{ route('breakdowns.destroy', $model->id) }}" method="POST">
  @csrf @method('DELETE')
  <button type="submit" class="btn btn-xs btn-danger" onclick="return alert('Are you sure?')"><i class="fas fa-trash"></i></button>
</form>

<div class="modal fade" id="update-status-{{ $model->id }}">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Change {{ $model->unit_code }} Status to RFU</h3>
        </div>
        <form action="{{ route('breakdowns.update_status', $model->id) }}" method="POST">
          @csrf @method('PUT')
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="rfu_date">RFU Date</label>
                  <input type="date" name="rfu_date" class="form-control">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="rfu_time">Time </label>
                  <input type="time" name="rfu_time" class="form-control @error('rfu_time') is-invalid @enderror">
                  @error('rfu_time')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
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