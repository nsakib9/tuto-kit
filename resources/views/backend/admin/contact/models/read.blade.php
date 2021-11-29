<div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">{{ $mail->name }}</h3> <br>
              <h6>From: {{$mail->email}}
              <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span></h6>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <!-- <div class="mailbox-read-info"> -->
                <!-- <h5>Message Subject Is Placed Here</h5> -->
              <!-- </div> -->

              <div class="mailbox-read-message">
                {{ $mail->massage }}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
           
            <div class="card-footer">
              <button type="button" onclick="delete_id({{ $mail->id }})" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
              <!-- <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button> -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        


          </div>
         </div>
       </div>
 </div>