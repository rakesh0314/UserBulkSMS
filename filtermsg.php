<style type="text/css">
  body{
    background-image: url("<?= base_url().'assets/user/' ?>images/sms.jpg");
     background-repeat: no-repeat;
     background-size: cover;
  }
</style>
<body>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="card" method="post" action="">
                    <div class="card-header">
                        <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2 class="card-title">Whatsapp Number Filter</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                       <a href="<?= base_url()?>Home"><span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    </div>
                    <div class="card-body">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Add Numbers</button>
              
                          <div class="table-responsive">
                           <table class="table table-striped" id="employeeListing">
                             <thead>
                               <tr>
                                  <th>Sr.No</th>
                                  <th>Title</th>
                                  <th>Total No.</th>
                                  <th>Whatsaap No.</th>
                                  <th>Date &nbsp; Time</th>
                                  <th>Download</th>
                              </tr>
                            </thead>
                           <tbody id="Records">                    
                           </tbody>
                          </table>
                         <ul id="pagination" class="pagination-sm"></ul>
                        </div>
                     </div>
                    </form>
                 </div>
             </div>
         </div>
    </div>
</body>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Add Numbers</h4>
              <button type="button" class="close" data-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="body">
              <label for="text">File Title</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
             <br>
             <label for="text">Upload File</label>
             <input type="file" class="form-control" id="title" name="title">
             <br>
             <span>
               Download sample file..
               <a href="data:text/plain;charset=UTF-8,Hello%20World!" download="hello.txt">Click hear..!</a>
             </span>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success" id="group">Create</button>
          </div>
       </div>
   </div>
</div>

<script>
 $("#NumFilterAdd").on('submit', (function(e) {
 // numfltrop.php
 $.ajax({
     type: 'POST',
     url: '',
     data: new FormData(this),
     contentType: false,
     cache: false,
     processData: false,
     beforeSend: function() {
     $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
    },
    success: function(data) {
    // alert(data);
    swal({
        title: 'Wow!',
        text: 'Data Inserted Successfully',
        type: 'success'
        },
        function() {
            window.location.reload();
        });
     }
  });
}));

$('#pagination').twbsPagination({
      totalPages: total_page,
      visiblePages: current_page,
      onPageClick: function (event, pageL) {
          page = pageL;
          if(is_ajax_fire != 0){
             getPageData();
          }
      }
  });

</script>

