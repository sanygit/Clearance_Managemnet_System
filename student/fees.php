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
        <center>School Fees Management</center>
       </div>
      </div>
	<div class="col-md-4">

<div class="panel panel-secondary">
	 			<div class="panel-heading text-primary">Add New Fees</div>
	 			<div class="panel-body">

            <form method="post"  class="addFee" role="form">
<input type="hidden" name="action" value="addFee">

	<div class="form-group">
	 			<label class="control-label">Session</label>
	 			<select name="session" class="form-control" required>
	 				<option value=""></option>
	 				<?php
                  $getBreed = Store::loadTable('system_sessiondata');
	                   $res = $getBreed->fetchAll(PDO::FETCH_OBJ);
	                   foreach($res as $r){ ?>
	                     <option value="<?php echo $r->id; ?>"><?php echo $r->session_name; ?></option>
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>

	<div class="form-group">
	 			<label class="control-label">Faculty</label>
	 			<select name="faculty" id="getDept" class="form-control" required>
	 				<option value=""></option>
	 				<?php
                  $getBreed = Store::loadTable('system_facultydata');
	                   $res = $getBreed->fetchAll(PDO::FETCH_OBJ);
	                   foreach($res as $r){ ?>
	                     <option value="<?php echo $r->id; ?>"><?php echo $r->faculty_name; ?></option>
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>

	<div class="form-group">
	 			<label class="control-label">Department</label>
					<div id="getDeptList">
	 			<select name="department" class="form-control" required>
	 				<option value=""></option>

	 			</select>

					</div>
	 		</div>
            <div class="form-group">
            <label>Amount</label>
            <input type="text" name="amount" id="amount" class="form-control">
             </div>

            <div class="form-group">

             <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Save</button>
             </div>


            </form>

        <div class="alert_message_mod">

	 </div>
     </div>
</div>
 </div>

    <div class="col-md-8">
 <table class="table table-striped table-bordered table-hover feeList" border="0">
			<thead class="thead">
				<tr>
					<th>Faculty</th>
					<th>Department </th>
					<th>Session</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
    </div>
</div>

            </section>
        </div>
    </div>

             <?php include './includes/footer.php'; ?>
</body>
</html>