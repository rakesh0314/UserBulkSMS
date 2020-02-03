<div class="my-3 my-md-5">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Group Create</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <a href="<?= base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
            </div>
        <form id="groupNumAdd" method="post">
            <div class="row">
             <div class="col-12">
                    <div class="card">
                         <div class="col-sm-6 col-md-4">
                            <div class="card-body"> 
                               <lable for="groupnumber">Group Name :&nbsp;&nbsp;<?php echo $groupdata->groupname?></lable>                        
                            </div>
                        </div>
                           
                            <div class="col-sm-12">
                                <div class="card-body">
                                <label>Group Numbers</label>
                                <textarea class="form-control" rows="10" name="mobilenum" id="mobilenum" onKeyUp="this.value=commafyPhone(this.value);"></textarea>
                                 <input type="hidden" value="" name="groupid" id="groupid">
                            </div>
                                </div>
                            
                            <div class="col-12">
                            <div class="body">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                                    </div>
                            </div>
                                
                        </div>
                        
                    </div>
                    
                </div>
                          
            </div>
        </form>
       </div>
</div>

<script>
        $("#groupNumAdd").on('submit',function()
        {
            var mobilenum = $("#mobilenum").val();
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>Enduser/add_group_number",
                    data: {mobilenum:mobilenum},
                    cache: false,
                    success: function(result){
                        alert(result);
                    }
                });
            return false;
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
