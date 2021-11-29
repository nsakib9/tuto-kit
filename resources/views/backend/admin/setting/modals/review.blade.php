<div class="modal fade" id="CSS">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="<?php echo isset($review) ? $review->title : '' ; ?>" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Title</label>
                        <input type="text" name="subtitle" value="<?php echo isset($review) ? $review->subtitle : '' ; ?>" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea type="text" name="body" value="" class="form-control" id="codeMirrorDemo"><?php echo isset($review) ? $review->body : '' ; ?></textarea>
                    </div>
                        
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox"  onchange="this.value=(this.value=='on')?1:0" name="status" class="custom-control-input" @if(isset($review)) value="<?php echo isset($review) && $review->status == '1' ? 1 : 0 ; ?>" @endif id="customSwitch3" <?php echo isset($review) && $review->status == '1' ? 'checked' : '' ; ?>>
                        <label class="custom-control-label" for="customSwitch3">Status</label>
                        </div>
                    </div>
                    @if(isset($review))
                        <input type="hidden" name="id" value="{{ $review->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Create</button>
                    @endif
         </div>
       </div>
 </div>
 </div>
 <script>

 </script>