<div class="modal fade" id="logoSet">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">fevicon</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Height</label>
                        <input type="text" name="height" value="<?php echo isset($logo) ? $logo->height : '' ; ?>" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Width</label>
                        <input type="text" name="width" value="<?php echo isset($logo) ? $logo->width : '' ; ?>" class="form-control" id="">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
         </div>
       </div>
 </div>
 </div>
