<?php
			include_once('classes/store.php');

	 $result = array();
//loadTable
      $get = Store::loadTable('account_studentprofile');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):

      $row = array(
      'id'=>$list->id,
      'session'=>Store::getColById('system_sessiondata','id',$list->session_id,1),
      'faculty'=>Store::getColById('system_facultydata','id',Store::getColById('system_departmentdata','id',$list->dept_name_id,3),1),
      'dept'=>Store::getColById('system_departmentdata','id',$list->dept_name_id,1),
      'matric'=>$list->matric,
			'fullname'=>$list->fullname
			//'action'=> "<button id='".$list->id."' etype='finished'
			//class='btn btn-success activate'>Finished </button></div>"

	  );

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);



?>
