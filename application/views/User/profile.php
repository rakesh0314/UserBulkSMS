<style type="text/css">
  body{
    background-image: url("<?= base_url().'assets/user/' ?>images/bulk.jpg");
     background-repeat: no-repeat;
     background-size: cover;
  }
</style>
      <body>
        <div class="my-3 my-md-5">
         <div class="container">
            <div class="row">
                <div class="col-8">
                  <div class="card">
                    <div class="row">
                   <div class="col-lg-6 col-md-10">
                    <div style="text-align: center;">
                          <small class="text-muted">Full name:</small>
                          <p><?php echo "<td>".$data->name."</td>";?></p>
                          <hr> 
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-10">
                    <div style="text-align: center;">
                          <small class="text-muted">LoginId:</small>
                           <p><?php echo "<td>".$data->loginid."</td>";?></p>
                           <hr>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                   <div class="col-lg-6 col-md-10">
                    <div style="text-align: center;">
                          <small class="text-muted">Email address:</small>
                          <p><?php echo "<td>".$data->email."</td>";?></p>
                          <hr> 
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-10">
                    <div style="text-align: center;">
                          <small class="text-muted">Password:</small>
                           <p><?php echo "<td>".$data->password."</td>";?></p>
                           <hr>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                   <div class="col-lg-6 col-md-10">
                    <div style="text-align: center;">
                          <small class="text-muted">Mobile No:</small>
                          <p><?php echo "<td>".$data->mobile."</td>";?></p> 
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-10">
                    <div style="text-align: center;">
                          <small class="text-muted">Adderss:</small>
                           <p><?php echo "<td>".$data->address."</td>";?></p>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
                </div>
                </div>
              </div>
          </div>
        </div>
   </body>