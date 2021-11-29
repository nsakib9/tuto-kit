<div class="modal fade" id="modal_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> @if(isset($group)) Update @else Create  @endif</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <div id="form_body">
                <div class="form-group">
                    <label for="studentformfield">Name</label>
                    <input type="text" class="form-control" name="name" id="studentformfield" placeholder="Enter Full Name" value="<?php echo isset($group) ? $group->name :'' ; ?>">
                </div>

              @if(is_super())
                <div class="form-group">
                    <label for="studentformfield">Set Admin</label>
                    <select name="admin" class="selectpicker" data-live-search="true" title="Choose Admin" data-width="100%">
                        @foreach($user as $user)
                          <option value="{{ $user->id }}" <?php echo isset($group) && $group->admin == $user->id ? 'selected' : '' ; ?>>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
              @endif
              @if(isset($group))
                  <input type="hidden" name="id" value="{{ $group->id }}">
              @endif
                <div class="form-group">
                   <button type="submit" class="btn btn-primary">@if(!isset($group))Create Group @else Update Group @endif</button>
                </div>
            </div>
        </div>


          </div>
         </div>
       </div>
 </div>
