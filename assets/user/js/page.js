<script type="text/javascript">
function isDoubleByte(str) 
{
    for (var i = 0, n = str.length; i < n; i++) {
    if (str.charCodeAt(i) > 255) { return true; }
    }
    return false;
}
  //Schdule date time
    $('#schdule').click('checked',function(){
           var schdateti = $(this).val();
            //alert(schdateti);
        if(schdateti == '1')
            {
            $(".schdateClass").css("display", "none");
                 $("#schtime").css("display", "none");
            }
        else if(schdateti == '2')
            {
             $(".schdateClass").css("display", "block");
                 $("#schtime").css("display", "block");
            }
        else{
            $(".schdateClass").css("display", "none");
              $("#schtime").css("display", "none");
        }
    });

 $('#schdule1').click('checked',function(){
           var schdateti = $(this).val();
            
        if(schdateti == '1')
            {
            $(".schdateClass").css("display", "none");
                 $("#schtime").css("display", "none");
            }
        else if(schdateti == '2')
            {
             $(".schdateClass").css("display", "block");
                 $("#schtime").css("display", "block");
            }
        else{
            $(".schdateClass").css("display", "none");
              $("#schtime").css("display", "none");
        }
    });

$(document).ready(function(){
     $.valHooks.textarea = {
    get: function(e) {
      return e.value.replace(/\r?\n/g, "\r\n");
    }
  };
  
  //DatePicker Example
      $('#timeformatExample1').timepicker({ 'timeFormat': 'H:i' });
 //TimePicke Example
      $('#datetimepicke').datepicker();
    //mobile segment true false condition
    $('#senderOp').on('change',function(){
           var senderSel = $(this).val();
            
        if(senderSel == '1')
            {
                 $("#mobileNums").css("display", "block");
                 $("#groupName").css("display", "none");
                 $("#numoflines").val("");
                
            }
        else if(senderSel == '2')
            {
                $("#groupName").css("display", "block");
                $("#mobileNums").css("display", "none");
                 $("#numoflines").val("");
            }
        else{
            $("#mobileNums").css("display", "none");
              $("#groupName").css("display", "none");
             $("#numoflines").val("");
        }
    });

    $('#SenderID').on('change',function(){
           var senderSel = $(this).val();    
        if(senderSel != '0')
            {
                 $("#broupNumAdd").css("display", "block");
            }
        else
        {
            $("#broupNumAdd").css("display", "none");   
        }
    });
    
          $("#gnum").on('change', function() {
            var groupid = $(this).val();

            var realvalues = new Array(); //storing the selected values inside an array
            $('#gnum :selected').each(function(i, selected) {
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
});
    
    function commafy( arg ) {
   arg += '';                                         // stringify
   var num = arg.split('.');                          // incase decimals
   if (typeof num[0] !== 'undefined'){
      var int = num[0];                               // integer part
      if (int.length > 4){
         int     = int.split('').reverse().join('');  // reverse
         int     = int.replace(/(\d{3})/g, "$1,");    // add commas
         int     = int.split('').reverse().join('');  // unreverse
      }
   }
   if (typeof num[1] !== 'undefined'){
      var dec = num[1];                               // float part
      if (dec.length > 4){
         dec     = dec.replace(/(\d{3})/g, "$1 ");    // add spaces
      }
   }

   return (typeof num[0] !== 'undefined'?int:'') 
        + (typeof num[1] !== 'undefined'?'.'+dec:'');
}
            
</script>
 

<script type="text/javascript">
$(document).ready(function(){
 
     $.valHooks.textarea = {
    get: function(e) {
      return e.value.replace(/\r?\n/g, "\r\n");
    }
  };
    
    //mobile segment true false condition
    
    $('#senderOp').on('change',function(){
           var senderSel = $(this).val();
            
        if(senderSel == '1')
            {
            $("#mobileNums").css("display", "block");
                 $("#groupName").css("display", "none");
            }
        else if(senderSel == '2')
            {
            $("#groupName").css("display", "block");
                $("#mobileNums").css("display", "none");
            }
        else{
            $("#mobileNums").css("display", "none");
              $("#groupName").css("display", "none");
        }
    });

    $('#SenderID').on('change',function(){
           var senderSel = $(this).val();  
        if(senderSel != '0')
            {
                 $("#broupNumAdd").css("display", "block");
            }
        else
        {
            $("#broupNumAdd").css("display", "none");
             
        }
    });    
});
    
  function commafy( arg ) {
   arg += '';                                         // stringify
   var num = arg.split('.');                          // incase decimals
   if (typeof num[0] !== 'undefined'){
      var int = num[0];                               // integer part
      if (int.length > 4){
         int     = int.split('').reverse().join('');  // reverse
         int     = int.replace(/(\d{3})/g, "$1,");    // add commas
         int     = int.split('').reverse().join('');  // unreverse
      }
   }
   if (typeof num[1] !== 'undefined'){
      var dec = num[1];                               // float part
      if (dec.length > 4){
         dec     = dec.replace(/(\d{3})/g, "$1 ");    // add spaces
      }
   }

   return (typeof num[0] !== 'undefined'?int:'') 
        + (typeof num[1] !== 'undefined'?'.'+dec:'');
 }   
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

<script>
     $(document).ready(function(){
    /* form submit */
      $("#broupNumAdd").click(function(){ 
        var data = $("#gForm").serialize();
        $.ajax({
            type : 'POST',
            url  : '',
            data : data,
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
            text: 'Message Send Successfully',
            type: 'success'
        },
        function() {
                window.location = 'form.php';    
        });
      }
                 else if(data==2){
                    swal(
                            swal ( "Oops" ,  "Something went wrong!" ,  "error" )
                        )
                 }
                else if(data==3){
                    swal(
                            swal ( "Oops" ,  "Number not 10 digits!" ,  "error" )
                        )
                }
                else if(data==4){
                    swal(
                            swal ( "Oops" ,  "Limit Exceeded" ,  "error" )
                        )
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

  <!--  <script type="text/javascript">
    function commafy( arg ) {
   arg += '';                                         // stringify
   var num = arg.split('.');                          // incase decimals
   if (typeof num[0] !== 'undefined'){
      var int = num[0];                               // integer part
      if (int.length > 4){
         int     = int.split('').reverse().join('');  // reverse
         int     = int.replace(/(\d{3})/g, "$1,");    // add commas
         int     = int.split('').reverse().join('');  // unreverse
      }
   }
   if (typeof num[1] !== 'undefined'){
      var dec = num[1];                               // float part
      if (dec.length > 4){
         dec     = dec.replace(/(\d{3})/g, "$1 ");    // add spaces
      }
   }

   return (typeof num[0] !== 'undefined'?int:'') 
        + (typeof num[1] !== 'undefined'?'.'+dec:'');
}    
</script> -->

<script type="text/javascript">
$(document).ready(function(){
      function count() {
            var txtVal = $('#mesEng').val();
            var totalnumm = $("#numoflines").val();
            if(isDoubleByte($('#mesEng').val())){
                alert("Unicode or unsupported character detected, Please select unicode to send unicode messages.");
                $("#broupNumAdd").css("display", "none");
            }else{
              $("#broupNumAdd").css("display", "block");
            }
            var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
            var chars = txtVal.length;
            if (chars === 0) {
                words = 0;
            }
            if (chars < 919) {
                var totalC1 = "161";
                var totalC2 = "307";
                var totalC3 = "460";
                var totalC4 = "613";
                var totalC5 = "766";
                var totalC6 = "919";

                if (chars < totalC1) {
                    var finalsmscount = totalnumm * 1;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterWord').html(words);
                    $('#counterChar').html(chars);
                    $('#counterMes').html(1);
                    document.getElementById("smslim").value = 1;

                } else if (chars < totalC2) {
                    var finalsmscount = totalnumm * 2;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterWord').html(words);
                    $('#counterChar').html(chars);
                    $('#counterMes').html(2);
                    document.getElementById("smslim").value = 2;
                } else if (chars < totalC3) {
                    var finalsmscount = totalnumm * 3;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterWord').html(words);
                    $('#counterChar').html(chars);
                    $('#counterMes').html(3);
                    document.getElementById("smslim").value = 3;
                } else if (chars < totalC4) {
                    var finalsmscount = totalnumm * 4;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterWord').html(words);
                    $('#counterChar').html(chars);
                    $('#counterMes').html(4);
                    document.getElementById("smslim").value = 4;
                } else if (chars < totalC5) {
                    var finalsmscount = totalnumm * 5;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterWord').html(words);
                    $('#counterChar').html(chars);
                    $('#counterMes').html(5);
                    document.getElementById("smslim").value = 5;
                } else if (chars < totalC6) {
                    var finalsmscount = totalnumm * 6;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterWord').html(words);
                    $('#counterChar').html(chars);
                    $('#counterMes').html(6);
                    document.getElementById("smslim").value = 6;
                }
            } else {
                $('#counterMes').html('Limit Exceeded');
            }

        }
        //count();

        $('#mesEng').on('keyup propertychange paste', function() {
            count();
        });

        // hindi textarea

        function count1() {
            var txtVal = $('#mesHin').val();
            var totalnumm = $("#numoflines").val();
            var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
            var chars = txtVal.length;
            if (chars === 0) {
                words = 0;
            }
            if (chars < 1140) {
                var totalC1 = "71";
                var totalC2 = "135";
                var totalC3 = "202";
                var totalC4 = "269";
                var totalC5 = "336";
                var totalC6 = "403";
                var totalC7 = "470";
                var totalC8 = "537";
                var totalC9 = "604";
                var totalC10= "671";
                var totalC11= "738";
                var totalC12= "805";
                var totalC13= "872";
                var totalC14= "939";
                var totalC15= "1006";
                var totalC16= "1073";
                var totalC17= "1140";
                if (chars < totalC1) {

                    var finalsmscount = totalnumm * 1;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(1);
                    document.getElementById("smslim").value = 1;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC2) {
                    var finalsmscount = totalnumm * 2;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(2);
                    document.getElementById("smslim").value = 2;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC3) {
                    var finalsmscount = totalnumm * 3;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(3);
                    document.getElementById("smslim").value = 3;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC4) {
                    var finalsmscount = totalnumm * 4;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(4);
                    document.getElementById("smslim").value = 4;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC5) {
                    var finalsmscount = totalnumm * 5;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(5);
                    document.getElementById("smslim").value = 5;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC6) {
                    var finalsmscount = totalnumm * 6;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(6);
                    document.getElementById("smslim").value = 6;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC7) {
                    var finalsmscount = totalnumm * 7;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(7);
                    document.getElementById("smslim").value = 7;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC8) {
                    var finalsmscount = totalnumm * 8;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(8);
                    document.getElementById("smslim").value = 8;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC9) {
                    var finalsmscount = totalnumm * 9;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(9);
                    document.getElementById("smslim").value = 9;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC10) {
                    var finalsmscount = totalnumm * 10;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(10);
                    document.getElementById("smslim").value = 10;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC11) {
                    var finalsmscount = totalnumm * 11;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(11);
                    document.getElementById("smslim").value = 11;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC12) {
                    var finalsmscount = totalnumm * 12;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(12);
                    document.getElementById("smslim").value = 12;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC13) {
                    var finalsmscount = totalnumm * 13;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(13);
                    document.getElementById("smslim").value = 13;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC14) {
                    var finalsmscount = totalnumm * 14;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(14);
                    document.getElementById("smslim").value = 14;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC15) {
                    var finalsmscount = totalnumm * 15;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(15);
                    document.getElementById("smslim").value = 15;
                    $('#broupNumAdd').prop("disabled",false);
                } else if (chars < totalC16) {
                    var finalsmscount = totalnumm * 16;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(16);
                    document.getElementById("smslim").value = 16;
                    $('#broupNumAdd').prop("disabled",false);

                } else if (chars < totalC17) {
                    var finalsmscount = totalnumm * 17;
                    $("#finalnumsmscount").val(finalsmscount);
                    $('#counterChar1').html(chars);
                    $('#counterMes1').html(17);
                    document.getElementById("smslim").value = 17;
                    $('#broupNumAdd').prop("disabled",false);
                }
            } else {
                $('#counterMes1').html('Limit Exceeded');
                $('#broupNumAdd').prop("disabled",true);
            }
        }
        //count();
        $('#mesHin').on('keyup propertychange paste', function() {
            count1();
        });
    
    //language option change 
    
    $('#mesLang1').on('change',function(){
           var mesLang = $(this).val();
            
        if(mesLang == '1')
            {
                 $("#mesEngDiv").css("display", "block");
                 $("#mesHinDiv").css("display", "none");
                 $('#mesEng').val('')
                 $('#counterChar').html('');
                 $('#counterMes').html('');
                 $('#broupNumAdd').prop("disabled",false);
                 $("#finalnumsmscount").val(0);
            }
    });
     $('#mesLang2').on('change',function(){
           var mesLang2 = $(this).val();
        if(mesLang2 == '2')
            {
                 $("#mesHinDiv").css("display", "block");
                 $("#mesEngDiv").css("display", "none");
                 $('#mesHin').val('');
                 $('#counterChar1').html('');
                 $('#counterMes1').html('');
                 $('#broupNumAdd').prop("disabled",false);
                 $("#finalnumsmscount").val(0);
            } 
    });    
});
</script>
