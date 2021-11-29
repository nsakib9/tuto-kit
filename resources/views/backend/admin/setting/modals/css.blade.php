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
                        <input type="text" name="title" value="<?php echo isset($css) ? $css->title : '' ; ?>" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea type="text" name="content" value="" class="form-control" id="codeMirrorDemo"><?php echo isset($css) ? $css->content : '' ; ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3" <?php echo isset($css) && $css->status == '1' ? 'checked' : '' ; ?>>
                        <label class="custom-control-label" for="customSwitch3">Status</label>
                        </div>
                    </div>
                    @if(isset($css))
                        <input type="hidden" name="id" value="{{ $css->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Create</button>
                    @endif
         </div>
       </div>
 </div>
 </div>
 <script>
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
    highlightNonStandardPropertyKeywords: boolean ,
      theme: "monokai"
    });
 </script>