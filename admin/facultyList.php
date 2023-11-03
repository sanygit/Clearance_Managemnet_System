<?php
			include_once('classes/store.php');

	 $result = array();
//loadTable
      $get = Store::loadTable('system_facultydata');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):

      $row = array(
      'id'=>$list->id,
      'name'=>$list->faculty_name,
      'created'=>$list->created_on
      //'stdId'=>Store::getColById('students','id',$list->stdId,1),
			//'action'=> "<button id='".$list->id."' etype='finished'
			//class='btn btn-success activate'>Finished </button></div>"

	  );

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);



?>
