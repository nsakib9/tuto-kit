<div class="modal fade" id="modal_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Manege Member</h5>
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
                    <label for="studentformfield">Members</label>
                    <select name="admin" onchange="getUser(this)" class="selectpicker" data-live-search="true" data-width="100%" data-group="{{ $id }}">
                        <option>Select User</option>
                        <option value="teacher">All Teacher</option>
                        @foreach($class as $class)
                          <option value="{{ $class->id }}">{{ $class->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" height="150px">
                      <div class="form-group" id="bodyForMembers">
                         Select Your Members
                      </div>
                </div>
                
            </div>
        </div>
          </div>
         </div>
       </div>
 </div>
