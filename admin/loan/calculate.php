<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT * from `accounts` where id = '{$_GET['id']}' ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
}
?>
<?php if ($_settings->chk_flashdata('success')) : ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Calculate Loan</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="account-form">
                
                <div class="alert alert-info">
                    
                    <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="control-label">initial loan</label>
                        <input type="number" class="form-control text-right" name="initloan"   autocomplete="off">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="control-label">interest rate</label>
                        <input type="number" class="form-control text-right" name="rate" value="12"  autocomplete="off">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="control-label">month</label>
                        <input type="number" class="form-control text-right" name="monthloan" value="48"  autocomplete="off">
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-6">
                    <label class="control-label">monthly (loan + rate)</label>
                    <input type="text" class="form-control" name="mlrate" value="0" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                    <label class="control-label">monthly payloan</label>
                    <input type="text" class="form-control" name="mpay" value="0" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                    <label class="control-label">monthly rate</label>
                    <input type="text" class="form-control" name="mrate" value="0" readonly>
                    </div>
                   
                </div>
                </div>
              
            </form>
        </div>
    </div>

</div>
<script>
    $(function() {

                    $('[name = "initloan"]').on('input',function(){
                        var y = $('[name = "initloan"]').val()
                    var r = $('[name = "rate"]').val()/100/12
                    var pr = (y * r)
                    var r1 = (1 + r)
                    var ms = $('[name = "monthloan"]').val()
                    var power = Math.pow(r1,ms);
                    var M = (pr*power)/(power-1)
                    var simp = y/ms
                    $('[name="mrate"]').val(M - simp)
                    $('[name="mpay"]').val(simp)
                    $('[name="mlrate"]').val(M)
                    })

                    $('[name = "rate"]').on('input',function(){
                    var y = $('[name = "initloan"]').val()
                    var r = $('[name = "rate"]').val()/100/12
                    var pr = (y * r)
                    var r1 = (1 + r)
                    var ms = $('[name = "monthloan"]').val()
                    var power = Math.pow(r1,ms);
                    var M = (pr*power)/(power-1)
                    var simp = y/ms
                    $('[name="mrate"]').val(M - simp)
                    $('[name="mpay"]').val(simp)
                    $('[name="mlrate"]').val(M)
                    })

                    $('[name = "monthloan"]').on('input',function(){
                     var y = $('[name = "initloan"]').val()
                    var r = $('[name = "rate"]').val()/100/12
                    var pr = (y * r)
                    var r1 = (1 + r)
                    var ms = $('[name = "monthloan"]').val()
                    var power = Math.pow(r1,ms);
                    var M = (pr*power)/(power-1)
                    var simp = y/ms
                    $('[name="mrate"]').val(M - simp)
                    $('[name="mpay"]').val(simp)
                    $('[name="mlrate"]').val(M)
                    
                    })

           
     
       
    })
</script>