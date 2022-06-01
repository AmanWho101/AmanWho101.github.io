<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `accounts` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
       #using id list all info about the person
}
}
?>
<div class="card card-outline card-primary">
    <div class="card-header">
    <h3 class="card-title"><?php echo isset($_GET['id']) ? 'view' : ""; ?></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <h5>Hellow world</h5>
        </div>
    </div>
    <div class="card-footer">
        
    </div>
</div>
