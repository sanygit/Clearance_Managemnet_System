	<select name="department" class="form-control" required>
	<?php
			include_once('classes/store.php');

	 $result = array();
	 $faculty = $_REQUEST['faculty'];
      $get = Store::getDeptList($faculty);
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):

	 echo "<option value='".$list->id."'>".$list->dept_name."</option>";

	 endforeach;


?>
	</select>
