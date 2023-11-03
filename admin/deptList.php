<?php
			include_once('classes/store.php');

	 $result = array();
//loadTable
      $get = Store::loadTable('system_departmentdata');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):

      $row = array(
      'id'=>$list->id,
      'name'=>$list->dept_name,
      'faculty'=>Store::getColById('system_facultydata','id',$list->fid_id,1),
      'created'=>$list->created_on
			//'action'=> "<button id='".$list->id."' etype='finished'
			//class='btn btn-success activate'>Finished </button></div>"

	  );

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);



?>
