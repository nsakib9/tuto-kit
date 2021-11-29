<div class="modal fade" id="modal_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> @if(isset($user)) Update User @else Create  @endif</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <div id="form_body">
                @if(isset($user))
                <div class="text-center">
                    <img class="rounded-circle" src="{{ asset('images/profile/'.$user->img) }}" width="350" height="280" alt="Profile.jpg">
                </div>
                <br>
                @endif
                <div class="form-group">
                    <label for="studentformfield">Name</label>
                    <input type="text" class="form-control" name="name" id="studentformfield" placeholder="Enter Full Name" value="<?php echo isset($user) ? $user->name :'' ; ?>">
                </div>
                <div class="form-group">
                    <label for="studentformfieldemail">Email</label>
                    <input type="email" class="form-control" name="email" id="studentformfieldemail" placeholder="Enter Email" value="<?php echo isset($user) ? $user->email :'' ; ?>">
                </div>
                <div class="form-group">
                    <label for="studentformfieldphone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="studentformfieldphone" placeholder="Enter Phone Number" value="<?php echo isset($user) ? $user->phone :'' ; ?>">
                </div>
                <div class="form-group">
                    <label for="studentformfieldcourse">Expert In</label>
                    <select class="form-control" name="expertIn[]" id="studentformfieldcourse" multiple>
                        <option value=""></option>
                        @if(isset($user))
                        <?php $arr = json_decode($user->expertIn??[000,000],true); ?>
                        @endif
                        @foreach ($class as $row)
                            <option value="{{ $row->id }}"  <?php echo in_array($row->id,(Array)$arr) ? 'selected' : '' ; ?>>{{ $row->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="studentformfieldcourse">Educational Qualification</label>
                    <select class="form-control" name="eq" id="studentformfieldcourse" >
                        <option value=""></option>
                        <?php echo !isset($user) ? getOption('eq') :  getOption('eq',$user->eq) ; ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="studentformfieldcourse">Address</label>
                    <input type="text" class="form-control" name="Address" placeholder="Enter Address" value="<?php echo isset($user) ? $user->Address :'' ; ?>">
                </div>
                @if(!isset($user))
                <div class="form-group">
                    <label for="studentformfieldcourse">Curriculum Vitae (CV)</label>
                    <input type="file" class="form-control" name="cv" >
                </div>
                @endif
                <div class="form-group">
                    <label for="studentformfieldcourse">Note</label>
                    <textarea type="text" class="form-control" name="note" placeholder="Your Note"><?php echo isset($user) ? $user->note :'' ; ?></textarea>
                </div>
                @if(!isset($user))
                <div class="form-group">
                    <label for="studentformfieldpassword">Password</label>
                    <input type="password" class="form-control" name="password" id="studentformfieldpassword" placeholder="Enter Password" value="">
                </div>
                @endif
                </div>
                <input type="hidden" name="role_name" value="Teacher">
                @if(isset($user))
                <input type="hidden" name="id" value="<?php echo isset($user) ? $user->id : '';?>">
                @endif
                <div class="form-group">
                   <button type="submit" class="btn btn-primary">@if(!isset($user))Create User @else Update User @endif</button>
                </div>
            </div>
        </div>


          </div>
         </div>
       </div>
 </div>