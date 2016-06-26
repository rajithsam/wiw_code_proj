{{ csrf_field() }}
<div class="form-group">
  <label>Manager ID</label>
  <input disabled value="{{ $user->id }}" class="form-control">
  <input type="hidden" name="manager_id" value="{{ $user->id }}">
  <input type="hidden" name="user_id" value="{{ $user->id }}">
</div>

<div class="form-group">
  <label>Employee</label>
  <select name="employee_id" required class="form-control" value="{{ $shift->employee_id or '' }}">
    <option></option>
    @foreach($employees as $e)
      <option value="{{ $e->id }}" {{ ($e->id==$shift->employee_id) ? 'SELECTED' : ''}}>{{ $e->name }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Break</label>
  <input type="text" name="break" required class="form-control" value="{{ $shift->break or '' }}">
</div>

<div class="form-group">
  <label>Start time</label>
  <input type="date" name="start_time" required class="form-control" value="{{ $shift->start_time or '' }}">
</div>
<div class="form-group">
  <label>End Time</label>
  <input type="date" name="end_time" required class="form-control" value="{{ $shift->end_time or '' }}">
</div>

<input type="submit" value="Submit" class="btn btn-primary">
