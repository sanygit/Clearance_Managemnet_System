<?php

require_once "db.php";


class Store extends Database{
public function __construct(){
parent::__construct();
if(!isset($_SESSION)){
	session_start();
}
}


public static function existOne($tbl, $col, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? Limit 1");
$select->execute(array($value));
return $select->rowCount();
}
public static function existTwo($tbl, $col, $col2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? Limit 1");
$select->execute(array($value, $value2));
return $select->rowCount();
}


public static function loadDistincts($col, $tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl ");
$select->execute();
return $select;
}


public static function loadDistinctWhere($col, $tbl, $where, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl WHERE $where like ? ");
$select->execute(array($value));
return $select;
}


public static function loadDistinct($col, $tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl ");
$select->execute();
return $select->fetchAll();
}
public static function loadDistinctCond1($col, $tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl WHERE $cond = ? ");
$select->execute(array($value));
return $select->fetchAll();
}

public static function getColById($tbl, $col, $id, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col = ? Limit 1");
$select->execute(array($id));
return $select->fetchColumn($return);
}
public static function getColById2($tbl, $col, $col2, $id,  $id2, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col = ?  AND $col2 = ? Limit 1");
$select->execute(array($id,$id2));
return $select->fetchColumn($return);
}
public static function getName($tbl, $col, $id, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? ");
$select->execute(array($id));
return $select->fetchColumn($return);
}

public static function loadTable($tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute();
return $select;
}
public static function loadTbl($tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute();
return $select->fetchAll();
}
public static function loadTblCond($tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ?  ");
$select->execute(array($value));
return $select;
}


public static function loadTblCond2($tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ?  ");
$select->execute(array($value));
return $select->fetchAll();
}


public static function getDeptList($faculty){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM system_departmentdata WHERE fid_id = ? ");
$select->execute(array($faculty));
return $select;
}

public static function CreatedOn(){
return   date('Y-m-d H:i:sa');
}

#############################insert functions###########################################



public static function saveFaculty(){
$conn = Database::getInstance();
$faculty_name = $_POST['faculty_name'];

if($existCheck = self::existOne('system_facultydata', 'faculty_name', $faculty_name)==0)
{
	$now = self::CreatedOn();

$stmt = $conn->db->prepare("INSERT INTO system_facultydata (faculty_name, created_on)
																											VALUES (:faculty_name, :created_on )");
$stmt->bindParam(':faculty_name', $faculty_name, PDO::PARAM_STR);
$stmt->bindParam(':created_on', $now, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {
	return 2;
	}


}

public static function saveDepartment(){
$conn = Database::getInstance();
$dept_name = $_POST['dept_name'];
$faculty = $_POST['faculty'];

if($existCheck = self::existTwo('system_departmentdata', 'dept_name', 'fid_id', $dept_name, $faculty)==0)
{
	$now = self::CreatedOn();

$stmt = $conn->db->prepare("INSERT INTO system_departmentdata (dept_name, fid_id, created_on)
																											VALUES (:dept_name, :fid_id, :created_on )");
$stmt->bindParam(':dept_name', $dept_name, PDO::PARAM_STR);
$stmt->bindParam(':fid_id', $faculty, PDO::PARAM_STR);
$stmt->bindParam(':created_on', $now, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {
	return 2;
	}


}






public static function saveSession(){
$conn = Database::getInstance();
$session = $_POST['session_name'];

if($existCheck = self::existOne('system_sessiondata', 'session_name', $session)==0)
{
	$now = self::CreatedOn();

$stmt = $conn->db->prepare("INSERT INTO system_sessiondata (session_name, created_on)
																											VALUES (:session_name, :created_on )");
$stmt->bindParam(':session_name', $session, PDO::PARAM_STR);
$stmt->bindParam(':created_on', $now, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {
	return 2;
	}


}


public static function saveFee(){
$conn = Database::getInstance();
$session = $_POST['session'];
$department = $_POST['department'];
$amount = $_POST['amount'];

if($existCheck = self::existTwo('bursary_schoolfees', 'did_id', 'sid_id', $department, $session)==0)
{
	$now = self::CreatedOn();

$stmt = $conn->db->prepare("INSERT INTO bursary_schoolfees (did_id, sid_id, amount)
																											VALUES (:dept, :session, :amount )");
$stmt->bindParam(':dept', $department, PDO::PARAM_STR);
$stmt->bindParam(':session', $session, PDO::PARAM_STR);
$stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {
	return 2;
	}


}

public static function saveStudent(){
$conn = Database::getInstance();
$fullname = $_POST['fullname'];
$department = $_POST['department'];
$session = $_POST['session'];
$matric = $_POST['matric'];
$password = md5($_POST['password']);

if($existCheck = self::existOne('account_studentprofile', 'matric', $matric)==0)
{
	$now = self::CreatedOn();

$stmt = $conn->db->prepare("INSERT INTO account_studentprofile (fullname, matric, password, dept_name_id, session_id)
																											VALUES (:fullname, :matric, :password, :dept, :session )");
$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
$stmt->bindParam(':matric', $matric, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':dept', $department, PDO::PARAM_STR);
$stmt->bindParam(':session', $session, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {
	return 2;
	}


}



public static function saveUser(){
$conn = Database::getInstance();
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = md5($_POST['password']);

if($existCheck = self::existOne('users', 'username', $username)==0)
{
	$now = self::CreatedOn();

$stmt = $conn->db->prepare("INSERT INTO users (fullname, username, password, created_on)
																											VALUES (:fullname, :username, :password, :created_on )");
$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':created_on', $now, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {
	return 2;
	}


}





public static function saveCandidate($POST,$FILES){
$conn = Database::getInstance();
	session_start();
$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$image = '';

 $File_Name  = strtolower($FILES['photo']['name']);

if($File_Name!="")
{
 $image = self::uploadImage($FILES,$barcode);
}
else{
	$image = $File_Name;
}

$stmt = $conn->db->prepare("INSERT INTO candidates ( stdId, position,session,level, image)
 	VALUES (:stdId,:position,:session,:level,:img)");

$stmt->bindParam(':stdId', $_POST['student'], PDO::PARAM_INT);
$stmt->bindParam(':position', $_POST['position'], PDO::PARAM_STR);
$stmt->bindParam(':session', $_POST['session'], PDO::PARAM_STR);
$stmt->bindParam(':level', $_POST['level'], PDO::PARAM_STR);
$stmt->bindParam(':img', $image, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;

}






#############################insert functions###########################################

#############################update functions###########################################


	public static function activations($GET){
$conn = Database::getInstance();

	$status = "Pending";
	if($_GET['etype'] == "activate"):
			$status = "Active";
		elseif($_GET['etype'] == "finished"):
			$status = "Finished";
	endif;
	$session = $_GET['session'];

	$position = $_GET['position'];


$stmt = $conn->db->prepare("UPDATE candidates SET status=:status WHERE  session=:session AND  position=:position ");

$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->bindParam(':session', $session, PDO::PARAM_STR);
$stmt->bindParam(':position', $position, PDO::PARAM_STR);
if ($stmt->execute()): return 1; else: return 0;	endif;

}

public static function updateAnimal($POST){
$conn = Database::getInstance();
	session_start();
	$userId = $_SESSION['id'];


$stmt = $conn->db->prepare("UPDATE animals SET animalno=:animalno, weight=:weight,
																											arrived=:arrived,breed_id=:breed_id,remark=:remark,
																											health_status=:health_status,  updatedby=:by WHERE id=:id ");

$stmt->bindParam(':animalno', $_POST['animalno'], PDO::PARAM_STR);
$stmt->bindParam(':weight', $_POST['weight'], PDO::PARAM_STR);
$stmt->bindParam(':arrived', $_POST['arrived'], PDO::PARAM_STR);
$stmt->bindParam(':breed_id', $_POST['breed'], PDO::PARAM_INT);
$stmt->bindParam(':remark', $_POST['remark'], PDO::PARAM_STR);
$stmt->bindParam(':health_status', $_POST['status'], PDO::PARAM_STR);
//$stmt->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR);
$stmt->bindParam(':by', $userId, PDO::PARAM_INT);
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
if ($stmt->execute()): return 1; else: return 0;	endif;

}


#############################update functions###########################################

#############################delete functions###########################################
public static function delAnimal($id){

$conn = Database::getInstance();
$result =$conn->db->prepare("DELETE FROM animals WHERE id= :memid");
	$result->bindParam(':memid', $id);
	if($result->execute()): return 1; else: return 0; endif;
}
#############################delete functions###########################################

public static function uploadImage($FILES,$imagename){
$UploadDirectory	= 'img/'; //specify upload directory ends with / (slash)
//Is file size is less than allowed size.
if ($FILES["photo"]["size"] > 5242880) {
die("File size is too big!");
}
//allowed file type Server side check
switch(strtolower($FILES['photo']['type']))
{
//allowed file types
case 'image/png':
case 'image/gif':
case 'image/jpeg':
case 'image/pjpeg':
case 'image/jpg':
break;
default:
	var_dump(strtolower($FILES['photo']['type']));
die('Unsupported File!'); //output error
}
$File_Name          = strtolower($FILES['photo']['name']);
$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
$NewFileName 		= $imagename.$File_Ext; //new file name
$location='';
if($File_Name!="")
{$location			= $UploadDirectory.$NewFileName;
if(move_uploaded_file($FILES['photo']['tmp_name'], $UploadDirectory.$NewFileName )):
 return $location;
else: return $location; endif;
}
else{ return $location;}
}




}
