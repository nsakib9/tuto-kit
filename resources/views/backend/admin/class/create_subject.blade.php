<div class="card card-default">
    <div class="card-body">
    @if(isset($subject))
        <input type="hidden" name="id" value="<?php if(isset($subject)) echo $subject->id ; ?>">
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Class</label>
        <select name="course_id" class="form-control">
            <option value=""></option>
            @foreach ($class as $row)
            <option value="{{ $row->id }}" <?php if(isset($subject) && $subject->course->id == $row->id) echo 'selected'; ?>>{{ $row->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Subject Name</label>
        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Subject Name" value="<?php if(isset($subject)) echo $subject->title ; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Subject Description</label>
        <input type="text" class="form-control" name="description" id="exampleInputEmail1" placeholder="Enter Subject Description" value="<?php if(isset($subject)) echo $subject->description ; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Subject Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputFile">
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
         <input type="checkbox" class="custom-control-input"  name="status" id="customSwitch3" <?php echo isset($subject) && $subject->status ? 'checked' : '' ?>>
         <label class="custom-control-label" for="customSwitch3">Status</label>
         </div>
    </div>
</div>
@if(isset($subject))
<button type="submit" style="margin:auto;" class="btn btn-primary w-50">Update</button>
@else
<button type="submit" style="margin:auto;" class="btn btn-primary w-50">Create</button>
@endif
</div>
