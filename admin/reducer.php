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
	$username = $_POST['username']; $password = md5($_POST['password']);
$stmt = $conn->db->prepare("SELECT * FROM users WHERE username = ? AND password = ? ");
$stmt->execute( array($username,$password) );
$member = $stmt->fetch();
	if(!empty($member)){
			$_SESSION['page'] = "logged";
			$_SESSION['uid'] = $member['id'];
			$_SESSION['fullname'] = $member['fullname'];
			$_SESSION['username'] = $member['username']; 
	echo 1;
	}
	else {
			echo $feedbck;
	}
}


if($_POST['action'] == "addFaculty"){  echo Store::saveFaculty($_POST); }
	if($_POST['action'] == "addDept"){  echo Store::saveDepartment($_POST); }
if($_POST['action'] == "addSession"){  echo Store::saveSession($_POST); }
if($_POST['action'] == "addFee"){ echo Store::saveFee($_POST); }

if($_POST['action'] == "addStudent"){ echo Store::saveStudent();}

if($_POST['action'] == "addUser"){ echo Store::saveUser();}


}



if(isset($_GET['action'])){

						if($_GET['action'] == "vote"){ echo Store::saveVote(); }
							if($_GET['action'] == "activations"){ echo Store::activations($_GET);
								}
}

?>