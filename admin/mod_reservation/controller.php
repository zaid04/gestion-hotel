<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'modify' :
	/* doMODIFY();
	break; */
	
	case 'delete' :
	doDelete();
	break;
	
	case 'deleteOne' :
	doDELETE();
	break;
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'checkin' :
	doCheckin();
	break;
	case 'checkout' :
	doCheckout();
	break;
	case 'cancelroom' :
	doCancelRoom();
	break;
	}
function doCheckout(){

		global $mydb;

		$sql = "UPDATE `tblreservation` SET `STATUS`='Checkedout' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'"; 
		$mydb->setQuery($sql);
		$mydb->executeQuery(); 

		$sql = "UPDATE `tblpayment` SET `STATUS`='Checkedout' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'"; 
		$mydb->setQuery($sql);
		$mydb->executeQuery(); 
					
		message("Reservation modifié!", "success");
		redirect('index.php');

}
function doCheckin(){
 
 global $mydb;

$sql = "UPDATE `tblreservation` SET `STATUS`='Checkedin' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'"; 
$mydb->setQuery($sql);
$mydb->executeQuery(); 
 

$sql = "UPDATE `tblpayment` SET `STATUS`='Checkedin' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'"; 
$mydb->setQuery($sql);
$mydb->executeQuery(); 

 
message("Reservation modifie", "success");
redirect('index.php');



}


function doCancel(){
global $mydb;

$sql = "UPDATE `tblreservation` r,tblroom rm SET ROOMNUM=ROOMNUM + 1 WHERE r.`ROOMID`=rm.`ROOMID` AND `CONFIRMATIONCODE` ='" . $_GET['code'] ."'";
$mydb->setQuery($sql);
$mydb->executeQuery(); 


$sql = "UPDATE `tblreservation` SET `STATUS`='Annulé' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'"; 
$mydb->setQuery($sql);
$mydb->executeQuery(); 


$sql = "UPDATE `tblpayment` SET `STATUS`='Annulé' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'"; 
$mydb->setQuery($sql);
$mydb->executeQuery(); 

				
message("Reservation modifié!", "success");
redirect('index.php');

}
function doCancelRoom(){ 
	global $mydb;

	$mydb->setQuery("SELECT * FROM `tblreservation` WHERE  `RESERVEID` ='" . $_GET['id'] ."'");
	$cur = $mydb->loadResultList(); 
	foreach ($cur as $result) {  

	$room = new Room(); 
	$room->ROOMNUM    = $room->ROOMNUM + 1; 
	$room->update($result->ROOMID); 

	}


$sql = "UPDATE `tblreservation` SET `STATUS`='annulé' WHERE `RESERVEID` ='" . $_GET['id'] ."'";
mysql_query($sql) or die(mysql_error());

				
message("Reservation modifié!", "success");
redirect('index.php');

}

function doConfirm(){
global $mydb; 

$sql = "UPDATE `tblreservation` r,tblroom rm SET ROOMNUM=ROOMNUM - 1 WHERE r.`ROOMID`=rm.`ROOMID` AND  `CONFIRMATIONCODE` ='" . $_GET['code'] ."'";

$mydb->setQuery($sql);
$mydb->executeQuery();


$sql = "UPDATE `tblreservation` SET `STATUS`='Confirmé' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'";

$mydb->setQuery($sql);
$mydb->executeQuery(); 

$sql = "UPDATE `tblpayment` SET `STATUS`='Confirmé' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'";

$mydb->setQuery($sql);
$mydb->executeQuery();








message("Reservation modifié!", "success");
redirect('index.php');

}	
 
function doDelete(){

	global $mydb;

	$sql = "DELETE FROM tblpayment WHERE CONFIRMATIONCODE='" . $_GET['code'] ."'"; 
	$mydb->setQuery($sql);
	$mydb->executeQuery();
	
	$sql = "DELETE FROM tblreservation WHERE CONFIRMATIONCODE='" . $_GET['code'] ."'"; 
	$mydb->setQuery($sql);
	$res = $mydb->executeQuery();
	if ($res) {
		# code...
	message("Reservation supprimé", "success");
 	redirect('index.php');
	}else{
	message("Reservation ne peut pas etre supprimé!", "error");
 	redirect('index.php');
	}
  }
?>