<?php include 'classes/store.php'; ?>
<?php include './includes/header.php'; ?>



<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
             <?php include './includes/topheader.php'; ?>
             <?php include './includes/sidebar.php'; ?>
        <div class="content-wrapper">

            <!-- Code box -->
            <section class="content">

<div class="row">
      <div class="col-md-12">
        <div class="well panel-primary text-success">
        <center>Payment</center>
       </div>
      </div>
	<div class="col-md-6">
<?php
  $session = Store::getColById('system_sessiondata','id',$_SESSION['session'],1);
   $faculty = Store::getColById('system_facultydata','id',Store::getColById('system_departmentdata','id',$_SESSION['department'],3),1);
  $dept = Store::getColById('system_departmentdata','id',$_SESSION['department'],1);
//
			$matric =  $_SESSION['matric'];
			$amount =  Store::getColById2('bursary_schoolfees','sid_id','did_id',$_SESSION['session'],$_SESSION['department'],1);

				$tot=0;
			if($amount){
				echo "School fees: <div class='badge'>".Store::formatMoney($amount, true)."</div>";
					$feeId =  Store::getColById2('bursary_schoolfees','sid_id','did_id',$_SESSION['session'],$_SESSION['department'],0);
//select if i have paid
				echo "<br/>";
	$TOTAL = Store::amountSumPaymentHistory($_SESSION['uid'], $feeId);
				for($i=0; $rowas = $TOTAL->fetch(); $i++){
				 $tot=$rowas['sum(amount)'];
				echo "Total Paid: ".Store::formatMoney($tot, true);
				}


?>
<hr />
<br />

 <table class="table table-striped table-bordered table-hover" id="dataTables-example" border="0">
			<thead class="thead">
				<tr>
					<th>S/N</th>
					<th>Amount </th>
					<th>Date Paid</th>
				</tr>
			</thead>
			<tbody>
				<?php
	$PAYEMENT = Store::getPaymentHistory($_SESSION['uid'], $feeId);
				$query = $PAYEMENT->fetchAll(PDO::FETCH_OBJ);

				$i = 1;
				foreach($query as $list):
								echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$list->amount."</td>";
				echo "<td>".$list->datePaid."</td>";

echo "</tr>";
$i++;
				endforeach;


				?>

			</tbody>
		</table>

<?php			}
			else {
				echo "No fees set yet. See the bursary department please";
			}
?>
     </div>

	<?php
				if($amount > $tot){
	?>

	<div class="col-md-4">

	<div class="col-md-12">
        <div class="well panel-primary text-success">
        <center>Make Payment</center>
       </div>
      </div>
<div class="panel panel-secondary">
	 			<div class="panel-heading text-primary">Add New Payment</div>
	 			<div class="panel-body">


            <form method="post"  class="addPayment" role="form">
<input type="hidden" name="action" value="addPayment">
<input type="hidden" name="feesId" value="<?php echo $feeId; ?>">
<input type="hidden" name="studentId" value="<?php echo $_SESSION['uid']; ?>">

            <div class="form-group">
            <label>Amount</label>
            <input type="text" name="amount" id="amount" class="form-control">
             </div>

            <div class="form-group">

             <button type="submit" name="submit" class="btn btn-primary"><span class="fas fa-save"></span> Pay</button>
             </div>


            </form>
            <div class="alert_message_mod">

	 </div>
												<?php
												//if(isset($_POST['submit'])){
												//	//echo $_SESSION['uid'];
												//	 $amountp = $_POST['amount'];
												//	$send = Store::makePayment($feeId,$_SESSION['uid'],$amountp);
												//	if($send == 1):
												//			echo '<div class="alert alert-success">
												//			Payment successful
												//					</div>';
												//
												//	endif;
												//}


												?>

     </div>
</div>
 </div>
	<?php }
	else	if($amount === $tot){
		//echo "<button id='generate'>Generate</button>";
  $text_domains = $_SESSION['fullname']." has been cleared for ".$session;


	?>
<img src="qr.php?text=<?=$text_domains;?>&size=200&padding=20" alt="QR Code">
<?php
	}  ?>
</div>


            </section>
        </div>
    </div>

             <?php include './includes/footer.php'; ?>
</body>
</html>