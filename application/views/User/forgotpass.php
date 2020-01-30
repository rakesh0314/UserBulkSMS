<input type="email" name="forget_email" id="forget_email" class="form-control m-signin" placeholder="Your Email..">

<div class="m-signin">
<button class="btn btn-success btn-block" id="action_forget_password"><strong>Forget Password</strong></button>
</div>
<script type="text/javascript">
$('#action_forget_password').click(function(){
    var forget_email = $('#forget_email').val();
    if(ValidateEmail(forget_email)){
    $.post("<?php echo base_url('Login/forget_password'); ?>",
    {
    forget_email: forget_email
    },
    function(data){
    $('#msg').html(data);
    });
    }else{
    $('#msg').html('<strong style="color: red;">Invalid Email Format.</strong>');
    $("#forget_email").focus();
    }
    });
</script>