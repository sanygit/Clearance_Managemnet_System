<?php
			include_once('classes/store.php');

	 $result = array();
//loadTable
      $get = Store::loadTable('users');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):

      $row = array(
      'id'=>$list->id,
      'username'=>$list->username,
      'date'=>$list->created_on,
			'fullname'=>$list->fullname
			//'action'=> "<button id='".$list->id."' etype='finished'
			//class='btn btn-success activate'>Finished </button></div>"

	  );

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);



?>
