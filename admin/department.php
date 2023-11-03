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
        <center>Department Data Management</center>
       </div>
      </div>
	<div class="col-md-3">

<div class="panel panel-secondary">
	 			<div class="panel-heading text-primary">Add New Department</div>
	 			<div class="panel-body">

            <form method="post"  class="addDept" role="form">
<input type="hidden" name="action" value="addDept">
	<div class="form-group">
	 			<label class="control-label">Faculty</label>
	 			<select name="faculty" class="form-control" required>
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
            <label>Department Name</label>
            <input type="text" name="dept_name" id="dept_name" class="form-control">
             </div>

            <div class="form-group">

             <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Save</button>
             </div>


            </form>

        <div class="alert_message_mod">

	 </div>
     </div></div>

 </div>

    <div class="col-md-9">
 <table class="table table-striped table-bordered table-hover deptList" border="0">
			<thead class="thead">
				<tr>
					<th>Faculty</th>
					<th>Department </th>
					<th>Date Created</th>
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