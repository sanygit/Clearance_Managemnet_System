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
        <center>User Data Management</center>
       </div>
      </div>
	<div class="col-md-4">

<div class="panel panel-secondary">
	 			<div class="panel-heading text-primary">Add New User</div>
	 			<div class="panel-body">
        <div class="alert_message_mod">

	 </div>

            <form method="post"  class="addUser" role="form">
<input type="hidden" name="action" value="addUser">

 <div class="form-group">
				<label>Fullname</label>
				<input type="text" name="fullname" id="fullname" class="form-control">
   </div>

 <div class="form-group">
				<label>Username</label>
				<input type="text" name="username" id="username" class="form-control">
   </div>

 <div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control">
   </div>



            <div class="form-group">

             <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Save</button>
             </div>


            </form>
 <div class="alert_message_mod">

	 </div>   </div>
</div>
 </div>
    <div class="col-md-8">
 <table class="table table-striped table-bordered table-hover userList" border="0">
			<thead class="thead">
				<tr>
					<th>Fullname</th>
					<th>username</th>
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