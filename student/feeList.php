<?php
			include_once('classes/store.php');

	 $result = array();
//loadTable
      $get = Store::loadTable('bursary_schoolfees');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):

      $row = array(
      'id'=>$list->id,
      'session'=>Store::getColById('system_sessiondata','id',$list->sid_id,1),
      'faculty'=>Store::getColById('system_facultydata','id',Store::getColById('system_departmentdata','id',$list->did_id,3),1),
      'dept'=>Store::getColById('system_departmentdata','id',$list->did_id,1),
      'amount'=>$list->amount
			//'action'=> "<button id='".$list->id."' etype='finished'
			//class='btn btn-success activate'>Finished </button></div>"

	  );

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);



?>
