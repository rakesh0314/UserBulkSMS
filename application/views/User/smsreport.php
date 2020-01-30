
 <script type="text/javascript">
        $(document).ready(function () {
      
      //DatePicker Example
      $('#datetimepicker').datetimepicker();
      
      //TimePicke Example
      $('#datetimepicke').datetimepicker();
      
      
    });
    </script>




<div class="my-3 my-md-5">
        <div class="container">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2 class="card-title">Sent Messages Report</h2>
                    </div>            
                     <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                           <a href="<?= base_url()?>Home"><span class="glyphicon glyphicon-home"></span></a>
                     </div>
                </div>
            </div>
          </div>
        </div>
      </div>
          <form id="report" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-group">
                             <div class="col-md-4">
                                <label >Sender ID</label>
                                <select name="SenderID" id="SenderID" class="form-control">
                                    <option value="0">Select Sender ID</option>
                                    <option value=""></option>
                                </select>
                             </div>
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="container">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                             <div class="row clearfix">
                                     <div class="col-md-4">
                                         <label>From Date</label>
                                  <input type="text" name="fdate" id="datetimepicker" class="form-control"  autocomplete="off">
                              </div>
                                     <div class="col-md-4">
                                         <label>To Date</label>
                    <input type="text" name="tdate" id="datetimepicke" class="form-control"  autocomplete="off">
                                    </div>
                     <div class="col-md-12">
                                        <label></label>
                                        <input type="submit" value="Send" id="broupNumAdd"  name="submit" class="btn btn-success btn-block">
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


              <div class="container">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="table-responsive">
              <table class="table table-striped" id="grouplisting">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Numbers</th>
                    <th>Date & Time</th>
                    <th>Sender ID</th>
                    <th>Messages</th>
                  </tr>
                </thead>
                <tbody id="#">                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
                      </div>
                    </div>
                  </div>
                   </form>
              </div>
          
