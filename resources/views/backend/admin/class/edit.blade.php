<div class="card card-default ">
    <div class="card-body">
        <input type="hidden" name="id" value="{{ $class->id}}">
    <div class="form-group">
        <label for="exampleInputEmail1">Class Name</label>
        <input type="text" class="form-control" value="{{ $class->title }}" name="title" id="exampleInputEmail1" placeholder="Enter Class Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Class Name</label>
        <input type="text" class="form-control" value="{{ $class->description }}" name="description" id="exampleInputEmail1" placeholder="Enter Class Description">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Category Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputFile">
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
         <input type="checkbox"  name="status" class="custom-control-input" id="customSwitch3" <?php echo $class->status ? 'checked' : '' ?>>
         <label class="custom-control-label"  for="customSwitch3">Status</label>
         </div>
    </div>
</div>
    <button type="submit" style="margin:auto;" class="btn btn-primary w-50">Update</button>
</div>
