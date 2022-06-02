<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
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
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">View <label>saving Info</label></h3>
		<div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped" id="indi-list">
                <colgroup>

                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Deposit</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qryt = $conn->query("select * from `transactions` where account_id = $id  order by unix_timestamp(date_created) desc ");
                    while ($row = $qryt->fetch_assoc()) :

                        echo ' <tr> ';
                        if ($row['type'] == 1) {
                            echo '<td>' . $row['amount'] . '</td><td>'.$row['date_created'].'</td>';
                        }
                        echo '</tr>';
                    endwhile; ?>
                    
                      <tr>
                       <td>ToTal = <?php echo $salary; ?></td>   
                      <tr>
                </tbody>
            </table>
        </div>
    </div>
	</div>
</div>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($_GET['id']) ? 'view' : ""; ?> <label>Interest of saving Info</label></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped" id="indi-list">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Interest of saving</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qryt = $conn->query("select * from `transactions` where account_id = $id  order by unix_timestamp(date_created) desc ");
                    while ($row = $qryt->fetch_assoc()) :
                        echo ' <tr> ';
                        if ($row['type'] == 9) {
                            echo '<td>' . $row['amount'] . '</td><td>'.$row['date_created'].'</td>';
                        }
                        echo '</tr>';
                    endwhile; ?>
                      <tr>
                       <td>saving interest paid to customer = <?php echo $saving_int; ?></td>   
                      <tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
    </div>
</div>


<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($_GET['id']) ? 'view' : ""; ?> <label>Loan Taken Info</label></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped" id="indi-list">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Loan taken</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qryt = $conn->query("select * from `transactions` where account_id = $id  order by unix_timestamp(date_created) desc ");
                    while ($row = $qryt->fetch_assoc()) :
                        echo ' <tr> ';
                        if ($row['type'] == 7) {
                            echo '<td>' . $row['amount'] . '</td><td>'.$row['date_created'].'</td>';
                        }
                        echo '</tr>';
                    endwhile; ?>
                      <tr>
                       <td>Loan to be paid = <?php echo $loan; ?></td>   
                      <tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
    </div>
</div>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($_GET['id']) ? 'view' : ""; ?> <label>Loan paid Info</label></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped" id="indi-list">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Loan paid</th>
                        <th>Date Added</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qryt = $conn->query("select * from `transactions` where account_id = $id  order by unix_timestamp(date_created) desc ");
                    while ($row = $qryt->fetch_assoc()) :
                        echo ' <tr> ';
                        if ($row['type'] == 6) {
                            echo '<td>' . $row['amount'] . '</td><td>'.$row['date_created'].'</td>';
                        }
                        echo '</tr>';
                    endwhile; ?>
                      <tr>
                       <td>Loan to be paid = <?php echo $loan; ?></td>   
                      <tr>
                </tbody>
            </table>
         </div>
    </div>
    <div class="card-footer">
    </div>
</div>


<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($_GET['id']) ? 'view' : ""; ?> <label>Loan interest Info</label></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped" id="indi-list">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Loan intesert paid</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qryt = $conn->query("select * from `transactions` where account_id = $id  order by unix_timestamp(date_created) desc ");
                    while ($row = $qryt->fetch_assoc()) :
                        echo ' <tr> ';
                        if ($row['type'] == 8) {
                            echo '<td>' . $row['amount'] . '</td><td>'.$row['date_created'].'</td>';
                        }
                        echo '</tr>';
                    endwhile; ?>
                      <tr>
                       <td>Loan interest paid = <?php echo $loan_inter; ?></td>   
                      <tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
    </div>
</div>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($_GET['id']) ? 'view' : ""; ?> <label>Axion/share Info</label></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped" id="indi-list">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Axion/share</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qryt = $conn->query("select * from `transactions` where account_id = $id  order by unix_timestamp(date_created) desc ");
                    while ($row = $qryt->fetch_assoc()) :
                        echo ' <tr> ';
                        if ($row['type'] == 4) {
                            echo '<td>' . $row['amount'] . '</td><td>'.$row['date_created'].'</td>';
                        }
                        echo '</tr>';
                    endwhile; ?>
                      <tr>
                       <td>Tottal share = <?php echo $lottery2m; ?></td>   
                      <tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
    </div>
</div>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($_GET['id']) ? 'view' : ""; ?> <label>Axion/share interest Info</label></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped" id="indi-list">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Interest</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qryt = $conn->query("select * from `transactions` where account_id = $id  order by unix_timestamp(date_created) desc ");
                    while ($row = $qryt->fetch_assoc()) :
                        echo ' <tr> ';
                        if ($row['type'] == 10) {
                            echo '<td>' . $row['amount'] . '</td><td>'.$row['date_created'].'</td>';
                        }
                        echo '</tr>';
                    endwhile; ?>
                      <tr>
                       <td>interest paid to customer = <?php echo $axion_int; ?></td>   
                      <tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
    </div>
</div>
<script>
    var indiList;
    $(function() {
        indiList = $('#indi-list').dataTable({
            columnDefs: [{
                targets: [6],
                orderable: false
            }],
        });
    })
</script>