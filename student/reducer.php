<?php
	session_start();
require_once "classes/db.php";
require_once "classes/store.php";
$conn = Database::getInstance();
date_default_timezone_set("Etc/GMT-8");
if(isset($_POST['action'])){
//started here

if($_POST['action'] == "login"){
	$feedbck = 0;

	$username = $_POST['matric']; $password = md5($_POST['password']);
$stmt = $conn->db->prepare("SELECT * FROM account_studentprofile WHERE matric = ? AND password = ? ");
$stmt->execute( array($username,$password) );
$member = $stmt->fetch();
	if(!empty($member)){
			$_SESSION['page'] = "logged";
			$_SESSION['uid'] = $member['id'];
			$_SESSION['fullname'] = $member['fullname'];
			$_SESSION['department'] = $member['dept_name_id'];
			$_SESSION['session'] = $member['session_id'];
			$_SESSION['matric'] = $member['matric'];
	echo 1;
	}
	else {
			echo $feedbck;
	}
}




if($_POST['action'] == "addPayment"){	echo $send = Store::makePayment($_POST['feesId'],$_SESSION['uid'],$_POST['amount']);}
}


?>