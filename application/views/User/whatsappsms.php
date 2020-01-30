<style type="text/css">
  body{
    background-image: url("<?= base_url().'assets/user/' ?>images/sms.jpg");
     background-repeat: no-repeat;
     background-size: cover;
  }
</style>
<body>
<div id="my-3 my-md-5">
    <div class="container-fluid">
         <div class="card-header">
            <div class="col-lg-5 col-md-8 col-sm-12">
                <h2 class="card-title" style="color: #FFFFFF">Message Form</h2>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
              <a href="<?= base_url()?>Home"><span class="glyphicon glyphicon-home"></span></a>
             </div>
         </div>

<div class="card-body">
   <form id="wForm" method="post">
       <div class="body">
   <div class="row clearfix">
          <div class="col-md-6 offset-md-1 ">
             <div class="card shadow-lg">
                  <div class="body">
                      <div class="col-md-12 ">
                <div class="form-group">
                   <label class="form-label">Sender Option</label>
                       <select class="form-control custom-select" id="senderOP" name="senderOP">
                         <option value="0">Select sender option</option>
                        <option value="1">Mobile No Wise</option>
                        <option value="2">Group Wise</option>
                  </select>
               <input type="hidden" id="sesUser" name="sesUser" value="">
          </div>
       </div>
     <div class="col-md-12" id="mobileNums" style="display:none;">
       <div class="form-group">
       <label class="form-label">Mobile Numbers</label>
          <textarea class="form-control mobN" rows="3" name="gNumber" id="gNumber"></textarea>
          <input type="hidden" class="form-control" id="finalmobilenum" name="finalmobilenum">
       </div>
      </div>
        <div class="col-md-12" id="group" style="display:none;">
          <div class="form-group">
           <label class="form-label">Group </label>
           <select name="groupName[]" id="groupName" class="form-control" multiple>
            <option value="0" selected>Select Group Name...</option>
                 <?php 
                  while($rowgroup = mysqli_fetch_array($resultgroup)){
                ?>
            <option value="<?php echo $rowgroup['id'];?>"><?php echo $rowgroup['GroupName'];?></option>
               <?php } ?>
         </select>
       </div>
     </div>
     <div class="col-md-12" id="totalnumcount">
      <div class="form-group">
       <label class="form-label">Total Numbers</label>
            <input type="text" class="form-control" id="numoflines" name="numoflines" readonly>
      </div>
    </div>
    <div class="col-md-12" id="showgnmdiv" style="display:none">
      <div class="form-group">
      <label class="form-label">Total Numbers in Group</label>
        <input type="text" class="form-control" id="totalnumgroup" name="totalnumgroup" readonly>
          </div>
        </div>
        <div class="row">
         <div class="col-md-12 text-center" id="msgtypediv">
            <label class="md-check">
             <input type="radio" value="text" name="msgtype" formControlName="msgtype">
                Text Msg
              </label>
            <label class="md-check">
              <input type="radio" value="image" name="msgtype" formControlName="msgtype">
                   Image
              </label>
          </div>
        <div class="col-md-12" id="imageuploaddiv" style="display:none">
            <div class="col-md-12">
        <label>Image</label>
          <input name="userImage" type="file" id="imgInp" class="inputFile form-control" />
           </div><br>
           <label>Massage</label>
             <div class="col-md-12">
           <textarea id="filemsg" name="filemsg" class="form-control mesEng" rows="10" maxlength="604"></textarea>
           <br></div>
         </div>
      </div>
  <div class="col-md-12 padding-25" id="msglangdiv" style="display:none">
     <lable>Language</lable>
       <select class="form-control" name="txtLanguage" id="txtLanguage">
               <option value="0">Select Language...</option>
            <option value="1">English</option>
        <option value="2">Hindi</option>
              </select>
      </div>

     <div class="col-md-12" id="mesHinDiv" style="display: none;">
       <label class="form-label">Message (Hindi)</label>
        <textarea id="mesHin" name="mesHin" class="form-control mesHin" rows="10" maxlength="604"></textarea><br>
    </div>
      <div class="col-md-12" id="mesEngDiv" style="display: none;">
       <label>Message (English)</label>
        <textarea id="mesEng" name="mesEng" class="form-control mesEng" rows="10" maxlength="604"></textarea><br>
            </div>
       <input type="hidden" id="sesUserid" name="sesUserid" value="">
        <div class="col-md-12 padding-25">
       <input type="hidden" name="smslim" id="smslim" value="0">
         <button class="btn btn-success btn-block">Submit</button>
       </div>
     </div>
   </div>
 </div>
      <div class="col-md-4">
        <div class="card shadow-lg">
          <div class="body">
           <div class="wBackground" style="background-image: url(<?= base_url().'assets/user/' ?>images/1288117.png); height:553px;width:410px;">
            <h1>&nbsp;</h1>
            <p id="whatsapptext" class="mesHin" style="display:none;color:#000;margin-top:40px;padding-left: 10px;font-size: 15px;"></p>

           <img id="blah" src="#" style="width: 80%;padding: 10px;height: auto; margin-top: 40px;margin-left: 5px; background: #fff;border-radius: 10px;display:none;" />
          <p id="blahtext" class="filemsg" style="display:none;color:#000;margin-top:40px;padding-left: 10px;font-size: 12px;"></p>
            </div>
        </div>
    </div>
    </div>
</div>                            
</div>
 </form>
</div>
 </div>
 </div>
</body>

<script type="text/javascript">
    $("#gNumber").keyup(function() {
        var text = $("#gNumber").val();
         str = text.replace(/(?:\r\n|\r|\n)/g, ',');
        var partsOfStr = str.split(',');
         $("#finalmobilenum").val(partsOfStr);
        // will remove the blank lines from the text-area
        text = text.replace(/^\s*[\r\n]/gm, ""); 
        //It will split when new lines enter
        var lines = text.split(/\r|\r\n|\n/);
        var count = lines.length; //now you can count thses lines.
        $('#numoflines').val(count);

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
    $(document).ready(function() {
        $("#groupName").on('change', function() {
            var groupid = $(this).val();
            var realvalues = new Array(); //storing the selected values inside an array
            $('#groupName :selected').each(function(i, selected) {
                realvalues[i] = $(selected).val();
            });
            $.ajax({
                type: 'POST',
                url: '../php/selectgroupnum.php',
                data: {
                    Privilege: realvalues
                },
                success: function(html) {
                    $('#numoflines').val(html);
                }
            });
        });

        $('#senderOP').on('change', function() {
            var senderOP = $(this).val();
            if (senderOP == '1') {
                $("#mobileNums").css("display", "block");
                $("#group").css("display", "none");
                $("#showgnumdiv").css("display", "none");
                $("#gNumber").val('');
                $("#numoflines").val('');
            } else {
                $("#mobileNums").css("display", "none");
                $("#group").css("display", "block");
                $("#showgnumdiv").css("display", "block");
                $("#gNumber").val('');
                $("#numoflines").val('');
            }
        });

        $('#txtLanguage').on('change', function() {
            var langtxt = $(this).val();
            if (langtxt == '1') {
                $("#mesEngDiv").css("display", "block");
                $("#mesHinDiv").css("display", "none");
               $('#mesHin').val('');
            } else {
                $("#mesEngDiv").css("display", "none");
                $("#mesHinDiv").css("display", "block");
                $('#mesEng').val('');
            }
        });

        $('input[type=radio][name=msgtype]').change(function() {
            if (this.value == 'text') {
                $("#imageuploaddiv").css("display", "none");
                $("#msglangdiv").css("display", "block");
                $("#whatsapptext").css("display", "block");
                $("#blah").css("display", "none");
                $("#blahtext").css("display", "none");
                $("#whatsapptext").html('');
            } else {
                var numsmscount = $("#numoflines").val();
                $("#finalnumsmscount").val(numsmscount);
                $("#imageuploaddiv").css("display", "block");
                $("#msglangdiv").css("display", "none");
                $("#mesEngDiv").css("display", "none");
                $("#mesHinDiv").css("display", "none");
                $('#mesHin').val('');
                $('#mesEng').val('');
                $("#whatsapptext").css("display", "none");
                $("#blah").css("display", "block");
                $("#blahtext").css("display", "block");
                $("#blahtext").html('');
            }
        });


        $('input[type=radio][name=msglang]').change(function() {
            if (this.value == '1') {
                $("#mesEngDiv").css("display", "block");
                $("#mesHinDiv").css("display", "none");
            } else {
                $("#mesEngDiv").css("display", "none");
                $("#mesHinDiv").css("display", "block");
            }

        });


        $('.datepicker').datepicker();
        $("#wForm").on('submit', (function(e) {
            //  var data = $("#campainForm").serialize();
            e.preventDefault();
            var mesLang = $("#mesLang").val();
            var mesEng = $("#mesEng").val();
            var mesHin = $("#mesHin").val();
            var schedDate = $("#schedDate").val();
            var schedTime = $("#schedTime").val();
            var sesUser = $("#sesUser").val();
            var whatsImg = $("#userImage").val();
            $(".page-loader-wrapper").show();
            $.ajax({
                type: 'POST',
                url: '../php/whatsppsms.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                },
                success: function(data) {
                    $(".page-loader-wrapper").hide();
                    // alert(data);
                    if (data == 1) {
                        swal({
                                title: 'Wow!',
                                text: 'Data Inserted Successfully',
                                type: 'success'
                            },
                            function() {

                                window.location.reload();

                            });
                    } else if (data == 2) {
                        swal(
                            swal("Oops", "Something went wrong!", "error")
                        )
                    } else if (data == 3) {
                        swal(
                            swal("Oops", "Image Not Upload!", "error")
                        )
                    } else {

                        swal("Oops", "Please Check Mobile Number!", "error")

                    }
                }
            });
            return false;
        }));

        //language option change 

        $('#mesLang').on('change', function() {
            var mesLang = $(this).val();

            if (mesLang == '1') {
                $("#mesEngDiv").css("display", "block");
                $("#mesHinDiv").css("display", "none");
            } else if (mesLang == '2') {
                $("#mesHinDiv").css("display", "block");
                $("#mesEngDiv").css("display", "none");
            } else {
                $("#mesEngDiv").css("display", "none");
                $("#mesHinDiv").css("display", "none");
            }
        });


        // function count() {
        //     var txtVal = $('#mesEng').val();
        //     var totalnumm = $("#numoflines").val();


        //     var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
        //     var chars = txtVal.length;
        //     if (chars === 0) {
        //         words = 0;
        //     }
        //     if (chars < 919) {
        //         var totalC1 = "161";
        //         var totalC2 = "307";
        //         var totalC3 = "460";
        //         var totalC4 = "613";
        //         var totalC5 = "766";
        //         var totalC6 = "919";

        //         if (chars < totalC1) {
        //             var finalsmscount = totalnumm * 1;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterWord').html(words);
        //             $('#counterChar').html(chars);
        //             $('#counterMes').html(1);
        //             document.getElementById("smslim").value = 1;



        //         } else if (chars < totalC2) {
        //             var finalsmscount = totalnumm * 2;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterWord').html(words);
        //             $('#counterChar').html(chars);
        //             $('#counterMes').html(2);
        //             document.getElementById("smslim").value = 2;
        //         } else if (chars < totalC3) {
        //             var finalsmscount = totalnumm * 3;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterWord').html(words);
        //             $('#counterChar').html(chars);
        //             $('#counterMes').html(3);
        //             document.getElementById("smslim").value = 3;
        //         } else if (chars < totalC4) {
        //             var finalsmscount = totalnumm * 4;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterWord').html(words);
        //             $('#counterChar').html(chars);
        //             $('#counterMes').html(4);
        //             document.getElementById("smslim").value = 4;
        //         } else if (chars < totalC5) {
        //             var finalsmscount = totalnumm * 5;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterWord').html(words);
        //             $('#counterChar').html(chars);
        //             $('#counterMes').html(5);
        //             document.getElementById("smslim").value = 5;
        //         } else if (chars < totalC6) {
        //             var finalsmscount = totalnumm * 6;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterWord').html(words);
        //             $('#counterChar').html(chars);
        //             $('#counterMes').html(6);
        //             document.getElementById("smslim").value = 6;
        //         }
        //     } else {
        //         $('#counterMes').html('Limit Exceeded');
        //     }

        // }
        //count();

        // $('#mesEng').on('keyup propertychange paste', function() {
        //     count();
        // });



        // hindi textarea

        // function count1() {
        //     var txtVal = $('#mesHin').val();
        //     var totalnumm = $("#numoflines").val();
        //     var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
        //     var chars = txtVal.length;
        //     if (chars === 0) {
        //         words = 0;
        //     }
        //     if (chars < 919) {
        //         var totalC1 = "71";
        //         var totalC2 = "135";
        //         var totalC3 = "202";
        //         var totalC4 = "269";
        //         var totalC5 = "336";
        //         var totalC6 = "604";
        //         if (chars < totalC1) {

        //             var finalsmscount = totalnumm * 1;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterChar1').html(chars);
        //             $('#counterMes1').html(1);
        //         } else if (chars < totalC2) {
        //             var finalsmscount = totalnumm * 2;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterChar1').html(chars);
        //             $('#counterMes1').html(2);
        //         } else if (chars < totalC3) {
        //             var finalsmscount = totalnumm * 3;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterChar1').html(chars);
        //             $('#counterMes1').html(3);
        //         } else if (chars < totalC4) {
        //             var finalsmscount = totalnumm * 4;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterChar1').html(chars);
        //             $('#counterMes1').html(4);
        //         } else if (chars < totalC5) {
        //             var finalsmscount = totalnumm * 5;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterChar1').html(chars);
        //             $('#counterMes1').html(5);
        //         } else if (chars < totalC6) {
        //             var finalsmscount = totalnumm * 6;
        //             $("#finalnumsmscount").val(finalsmscount);
        //             $('#counterChar1').html(chars);
        //             $('#counterMes1').html(6);
        //         }
        //     } else {
        //         $('#counterMes1').html('Limit Exceeded');
        //     }

        // }
        //count();

        // $('#mesHin').on('keyup propertychange paste', function() {
        //     count1();
        // });



// function count2() {
//             var txtVal = $('#filemsg').val();
//             var totalnumm = $("#numoflines").val();


//             var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
//             var chars = txtVal.length;
//             if (chars === 0) {
//                 words = 0;
//             }
//             if (chars < 919) {
//                 var totalC1 = "161";
//                 var totalC2 = "307";
//                 var totalC3 = "460";
//                 var totalC4 = "613";
//                 var totalC5 = "766";
//                 var totalC6 = "919";

//                 if (chars < totalC1) {
//                     var finalsmscount = totalnumm * 1;
//                     $("#finalnumsmscount").val(finalsmscount);
//                     $('#counterWord').html(words);
//                     $('#counterChar2').html(chars);
//                     $('#counterMes2').html(1);
//                     document.getElementById("smslim").value = 1;



//                 } else if (chars < totalC2) {
//                     var finalsmscount = totalnumm * 2;
//                     $("#finalnumsmscount").val(finalsmscount);
//                     $('#counterWord').html(words);
//                     $('#counterChar2').html(chars);
//                     $('#counterMes2').html(2);
//                     document.getElementById("smslim").value = 2;
//                 } else if (chars < totalC3) {
//                     var finalsmscount = totalnumm * 3;
//                     $("#finalnumsmscount").val(finalsmscount);
//                     $('#counterWord').html(words);
//                     $('#counterChar2').html(chars);
//                     $('#counterMes2').html(3);
//                     document.getElementById("smslim").value = 3;
//                 } else if (chars < totalC4) {
//                     var finalsmscount = totalnumm * 4;
//                     $("#finalnumsmscount").val(finalsmscount);
//                     $('#counterWord').html(words);
//                     $('#counterChar2').html(chars);
//                     $('#counterMes2').html(4);
//                     document.getElementById("smslim").value = 4;
//                 } else if (chars < totalC5) {
//                     var finalsmscount = totalnumm * 5;
//                     $("#finalnumsmscount").val(finalsmscount);
//                     $('#counterWord').html(words);
//                     $('#counterChar2').html(chars);
//                     $('#counterMes2').html(5);
//                     document.getElementById("smslim").value = 5;
//                 } else if (chars < totalC6) {
//                     var finalsmscount = totalnumm * 6;
//                     $("#finalnumsmscount").val(finalsmscount);
//                     $('#counterWord').html(words);
//                     $('#counterChar2').html(chars);
//                     $('#counterMes2').html(6);
//                     document.getElementById("smslim").value = 6;
//                 }
//             } else {
//                 $('#counterMes').html('Limit Exceeded');
//             }

//         }
        //count();

        // $('#filemsg').on('keyup propertychange paste', function() {
        //     count2();
        // });

    });

</script>


<script type="text/javascript">
    function commafyPhone(str) {
        var newStr = '';
        if (str.length > 10) {
            var str_array = str.split(",");
            for (var i = 0; i < str_array.length; i++) {
                newStr += str_array[i].replace(/(\d{10})/g, '$1,');
            }
            return newStr;
        }
        return str;
    }

    $(function() {
        $('#schedDate').datetimepicker({
            minDate: new Date()
        });
    });

</script>

<script type="text/javascript">
    // var display = $('#whatsapptext');
    // $('#mesHin').keyup( function() {
    //   display.html( $(this).val() );
    // }).change( function() {
    //   display.html( $(this).val() );
    // });

    $('#mesHin:not(.focus)').keyup(function() {
        var value = $(this).val();
        var contentAttr = $(this).attr('name');
        $('.' + contentAttr + '').html(value.replace(/\r?\n/g, '<br/>'));
    });

    $('#mesEng:not(.focus)').keyup(function() {
        var value = $(this).val();
        $('.mesHin').html(value.replace(/\r?\n/g, '<br/>'));
    });

    $('#filemsg').keyup(function() {
       var value = $(this).val();
     $('.filemsg').html(value.replace(/\r?\n/g, '<br/>'));

    });
</script>