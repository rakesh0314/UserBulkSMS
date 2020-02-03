
   <div class="my-3 my-md-5">
        <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-lg-5 col-md-8 col-sm-12">
                                  <h4 class="card-title">Group Name:</h4>
                                </div>
                                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                                   <a href="<?= base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
                                </div>
                           </div>
                           <div class="card-body">
                               <a href="#addMoreNumber" data-toggle="modal" data-target="#addMoreNumber" class="btn btn-success">Add More Number</a>
                               <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr. NO</th>
                                                <th>Group ID</th>
                                                <th>Number</th>
                                                <th>Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                </div>
                           </div>
                        </div>
                    </div>           
                </div>
            </div>
    </div>
</div>


<!-- Large Size -->
  <form id="gForm" method="post">
    <div class="modal fade" id="addMoreNumber" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Add More Numbers in Group</h4>
                </div>

                <div class="modal-body"> 
                    <label>Numbers</label>
                <textarea class="form-control" rows="10" name="mobilenum" id="mobilenum" onKeyUp="this.value=commafyPhone(this.value);"></textarea>
                <!-- <input type="hidden" value="<?php echo $row['Groupid'];?>" id="groupid" name="groupID"> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="broupNumAdd">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    
     $(document).ready(function(){
    /* form submit */
      $("#broupNumAdd").click(function(){
        var data = $("#gForm").serialize();
          var mobilenum = $('textarea#mobilenum').val();
           var groupid = $('#groupid').val();
         
        $.ajax({

            type : 'POST',
            url  : '',
            data : {mobilenum:mobilenum,groupid:groupid},
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
            success :  function(data)
            {
                if(data==1)
                    {
                      swal({
                        title: 'Wow!',
                        text: 'Data Successfully Inserted',
                        type: 'success'
                    },
                    function() {
                            window.location.reload();
                    });
               }
                 else if(data==2){
                             swal ( "Oops" ,  "Something went wrong!" ,  "error" )
                         }
                else if(data==3){
                           swal ( "Oops" ,  "Number not 10 digits!" ,  "error" )
                            }
             else{
                    swal ( "Oops" ,  "Please Check Mobile Number!" ,  "error" )
                }
            }
        });
        return false;
    });
    /* form submit */
     });
</script>

<script type="text/javascript">
function commafyPhone(str){
    var newStr='';
    if(str.length>10){
        var str_array=str.split(",");
        for(var i = 0; i < str_array.length; i++) {
            newStr+=str_array[i].replace(/(\d{10})/g,'$1,');
        }
        return newStr;
    }
    return str;
}
</script>
