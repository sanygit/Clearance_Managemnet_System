
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
        <center>Faculty Data Management</center>
       </div>
      </div>
	<div class="col-md-4">

<div class="panel panel-secondary">
	 			<div class="panel-heading text-primary">Add New Faculty</div>
	 			<div class="panel-body">


            <form method="post"  class="addFaculty" role="form">
<input type="hidden" name="action" value="addFaculty">

            <div class="form-group">
            <label>Faculty Name</label>
            <input type="text" name="faculty_name" id="faculty_name" class="form-control">
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
 <table class="table table-striped table-bordered table-hover facultyList" border="0">
			<thead class="thead">
				<tr>
					<th>Faculty name</th>
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