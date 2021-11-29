<div class="modal fade" id="role_modal_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> @if(isset($role)) Update Role @else Create Role @endif</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="card card-default">
                @if(isset($role))
                    <input type="hidden" name="id" value="<?php echo $role->id ; ?>">
                @endif
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Role Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Role Name" value="<?php if(isset($role->name)) echo $role->name ; ?>">
                </div>
                </div>
                <hr>
                <h4>Permission</h4>
                <?php $count = 0; ?>
                @foreach (permission() as $row)
                  @if(isset($role))
                  <h3 class="p-2 bg-dark">{{$row['title']}}</h3>
                  
                    @foreach($row['permission'] as $per)
                    <?php  $checked = in_array($per['id'],json_decode($role->permission)) ; ?>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="permission[]" value="{{$per['id']}}" class="custom-control-input" id="customSwitch{{ $count }}"   <?php echo $checked ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="customSwitch{{ $count }}">{{$per['title']}}</label>
                        </div>
                    </div>
                    <?php $count++; ?>
                    @endforeach

                  @else
                    <h3 class="p-2 bg-dark">{{$row['title']}}</h3>
                    
                    @foreach($row['permission'] as $per)
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="permission[]" value="{{$per['id']}}" class="custom-control-input" id="customSwitch{{ $count }}" >
                        <label class="custom-control-label" for="customSwitch{{ $count }}">{{$per['title']}}</label>
                        </div>
                    </div>
                    <?php $count++; ?>
                    @endforeach
                  @endif
                  <?php $count += 100; ?>
                @endforeach

                @if(isset($role))
                <button type="submit" style="margin:auto;" class="btn btn-primary w-50">Update</button>
                @else
                <button type="submit" style="margin:auto;" class="btn btn-primary w-50">Create</button>
                @endif
               
            </div>
          </div>
         
        </div>
      </div>
</div>