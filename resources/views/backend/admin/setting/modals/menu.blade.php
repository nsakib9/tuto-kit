<div class="modal fade" id="MenuBar">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
              <?php $menu_id = App\Models\Menu::where('dropdown',1)->get(); ?>
              @if(request()->input('sub'))
                    <div class="form-group">
                        <label for="">Menu</label>
                        <select class="form-control" name="main_id">
                          <option value="">Not Select</option>
                          @foreach ($menu_id as $row)
                          <option value="{{ $row->id }}" <?php echo isset($menu) && $menu->id == $row->id ? 'selected' :'' ; ?>>{{ $row->title }}</option>
                          @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="sub" value="true">
              @endif
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="<?php echo isset($menu) ? $menu->title : "" ; ?>" class="form-control" id="">
                    </div>
                    <div class="form-group" >
                        <label for="">URL</label>
                        <input type="text" name="url" id="url" value="<?php echo isset($menu) ? $menu->url : "" ; ?>" class="form-control" id="">
                    </div>
            @if(!request()->input('sub'))
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="dropdown"  class="custom-control-input" id="customSwitch2" <?php echo isset($menu) && $menu->dropdown == 1 ? "checked" : ""; ?>>
                        <label class="custom-control-label" for="customSwitch2">Dropdown</label>
                        </div>
                    </div>
            @endif
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3" <?php echo isset($menu) && $menu->status == 1 ? "checked" : ""; ?>>
                        <label class="custom-control-label" for="customSwitch3">Status</label>
                        </div>
                    </div>
                    @if(isset($menu))
                    <input type="hidden" name="id" value="{{ $menu->id }}">
                    <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Create</button>
                    @endif
         </div>
       </div>
 </div>
 </div>
 <script>
   document.querySelector('#customSwitch2').addEventListener('change',function(){
     if(this.checked){
      document.querySelector('#url').value="#";
      document.querySelector('#url').setAttribute("readonly", "true");
     }else{
      document.querySelector('#url').removeAttribute("readonly");
     }
   });
 </script>