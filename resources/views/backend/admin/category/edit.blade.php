<div class="card card-default color-palette-box">
    <div class="card-body">
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="form-group">
        <label for="exampleInputEmail1">Category Title</label>
        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{ $data->title }}" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Category Slug</label>
        <input type="text" class="form-control" name="slug" id="exampleInputEmail1" value="{{ $data->slug }}" placeholder="Enter Slug">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Category Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputFile">
        </div>
    </div>
    <button type="submit" style="margin:auto;" class="btn btn-primary w-50">Create</button>
</div>