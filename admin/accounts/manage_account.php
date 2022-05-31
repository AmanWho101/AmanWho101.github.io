<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `accounts` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
}
}
?>
<div class="card card-outline card-primary">
    <div class="card-header">
    <h3 class="card-title"><?php echo isset($_GET['id']) ? 'Update Account' : "Create New Account"; ?></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="account-form">
                <input type="hidden" name="id" value='<?php echo isset($id)? $id : '' ?>'>
                <div class="form-group">
                    <label class="control-label">Account Number</label>
                    <input type="text" class="form-control col-sm-6" name="account_number" value="<?php echo isset($account_number)? $account_number : '' ?>" required>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo isset($firstname)? $firstname : '' ?>" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo isset($lastname)? $lastname : '' ?>" placeholder="(optional)" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">kebele</label>
                        <input type="text" class="form-control" name="kebele" value="<?php echo isset($kebele)? $kebele : '' ?>" required>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">Position</label>
                    <input type="text" class="form-control col-sm-6" name="position" value="<?php echo isset($position)? $position : '' ?>" required>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Registaration Payment</label>
                    <div class="input-group m-0 p-0  col-sm-6">
                        <input type="number" step='any' min = "0" class="form-control col-sm-6 text-right" name="initpayment" value="<?php echo isset($initpayment)? $initpayment : '' ?>" <?php echo (!isset($id)) ? "required" : '' ?>>
                        
                    </div>
                </div>
                 <?php if(!isset($id)): ?> 
                    <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Number of Lotterys</label>
                        <input type="number" step='any' min = "0" class="form-control col-sm-6 text-right" name="lottery" value="<?php echo isset($lottery)? $lottery : '' ?>" required>
                    </div>
                    <div class="form-group col-sm-4">
                    <label class="control-label">Number of Lotterys to $ Money</label>
                    <input type="number" step='any' min = "0" class="form-control col-sm-6 text-right" name="lottery2m" value="0" required>
                </div>
                
                <div class="form-group col-sm-4">
                <label>10% of monthly salary</label>
                <input type="number" step='any' min = "0" class="form-control col-sm-6 text-right" name="salary" value="0" required>
                </div>
                </div>
                 <?php endif; ?> 
                 <div class="row">
                 <div class="form-group col-sm-4">
                <label>COOP Account</label>
                <input type="text" class="form-control col-sm-6 text-right" name="coop"  required>
                </div> 
                <div class="form-group col-sm-4">
                <label>Phone No</label>
                <input type="text" class="form-control col-sm-6 text-right" name="phone"  required>
                </div>
                 </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex w-100">
            <button form="account-form" class="btn btn-primary mr-2">Save</button>
            <a href="./?page=accounts" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#generate_pass').click(function(){
            var randomstring = Math.random().toString(36).slice(-8);
            $('[name="generated_password"]').val(randomstring)
        })
        $('[name="account_number"]').on('input',function(){
            if($('._checks').length > 0)
                $('._checks').remove()
            $('button[form="account-form"]').attr('disabled',true)
            $(this).removeClass('border-danger')
            $(this).removeClass('border-success')
            var checks = $('<small class="_checks">')
            checks.text("Checking availablity") 
            $('[name="account_number"]').after(checks)
            $.ajax({
                url:_base_url_+'classes/Master.php?f=check_account',
                method:'POST',
                data:{id:$('[name="id"]').val(),account_number: $(this).val()},
                dataType:'json',
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured","error")
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'available'){
                        checks.addClass('text-success')
                        checks.text('Available')
                        $('[name="account_number"]').addClass('border-success')
                        $('button[form="account-form"]').attr('disabled',false)
                    }else if(resp.status == 'taken'){
                        checks.addClass('text-danger')
                        checks.text('Account already exist')
                        $('[name="account_number"]').addClass('border-danger')
                        $('button[form="account-form"]').attr('disabled',true)
                    }else{
                        alert_toast('An error occured',"error")
                        $('[name="account_number"]').addClass('border-danger')
                        console.log(resp)
                    }
                    end_loader()
                }
            })
        })
        $('#account-form').submit(function(e){
            e.preventDefault()
            start_loader()
            if($('.err_msg').length > 0)
                $('.err_msg').remove()
            $.ajax({
                url:_base_url_+'classes/Master.php?f=save_account',
                method:'POST',
                data:$(this).serialize(),
                dataType:'json',
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured","error")
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href="./?page=accounts"
                    }else if(!!resp.msg){
                         var msg = $('<div class="err_msg"><div class="alert alert-danger">'+resp.msg+'</div></div>')
                         $('#account-form').prepend(msg) 
                         msg.show('slow')
                    }else{
                        alert_toast('An error occured',"error")
                        console.log(resp.status)
                    }
                    end_loader()
                }
            })
        })
    })
</script>