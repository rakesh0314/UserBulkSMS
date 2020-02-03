<script type="text/javascript">
        $(document).ready(function () {
            //DatePicker Example
      $('#datetimepicker').datetimepicker();
            //TimePicke Example
      $('#datetimepicke').datetimepicker(); 
      });
</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>Send message report</h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

 
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
             <form id="uploadForm" method="post"  >
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                           <div class="body">
                              <div class="col-md-4">
                                <label>From Date</label>
                                <input type="text" name="fdate" id="datetimepicker" class="form-control"  autocomplete="off">
                              </div>
                              <div class="col-md-4">
                                 <label>To Date</label>
                                 <input type="text" name="tdate" id="datetimepicke" class="form-control"  autocomplete="off">
                              </div>
                             <div class="col-md-12 border-bottom padding-25">
                                        <label></label>
                                        <input type="submit" value="Send" id="broupNumAdd"  name="submit" class="btn btn-success btn-block">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                  <div class="row clearfix">
                   <div class="col-md-12">
                     <div class="card shadow-lg">
                        <div class="body">
                            <div class="table-responsive">
                              <div id="targetLayer">
                              </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- <script type="text/javascript">
$(document).ready(function (e) {
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
            $("#targetLayer").html(data);
            },
            error: function() 
            {
            }           
       });
    }));
});
</script> -->