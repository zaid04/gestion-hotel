<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;

	case 'editimage' :
	editImg();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
	 
			
			if ($_POST['ROOM'] == "" OR $_POST['ROOMNUM'] == "" OR $_POST['PRICE'] == "") {
			 
					message("All fields required!", "error");
					redirect("index.php?view=add");
				
			}else{
				$room = new Room();

 

				$res = $room->find_all_room($_POST['ROOM']);
				
				
				if ($res >=1) {
					message("Ce nom existe deja!", "error");
					redirect("index.php?view=add");
				}else{
				
					 
				$room->ROOMNUM 		=	$_POST['ROOMNUM'];
				$room->ROOM 		=	$_POST['ROOM'];
				$room->ACCOMID 		=	$_POST['ACCOMID'];
				$room->ROOMDESC 	=	$_POST['ROOMDESC'];
				$room->NUMPERSON 	=	$_POST['NUMPERSON'];
				$room->PRICE 		=	$_POST['PRICE'];
 				$room->OROOMNUM 	=	$_POST['ROOMNUM'];
			
				 if (isset($_FILES['image'])){
				 $photo = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				 $photo_name = addslashes($_FILES['image']['name']);
				 $photo_size = getimagesize($_FILES['image']['tmp_name']);
				 move_uploaded_file($_FILES['image']['tmp_name'],"rooms/" . $_FILES['image']['name']);
				

	 			
				
			    	move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
					
					$room->ROOMIMAGE = $photo_name;
				 	unset($_SESSION['id']);
				 	 redirect("index.php");
					 $istrue = $room->create(); 
					 if ($istrue == 1){
					 	message("Chambre modifié correctement!", "success");
					 	redirect('index.php');
					 	
					 }
		   
		
				}	 }

		 die('hhh');
	}
  }
// }
//function to modify rooms

 function doEdit(){


           		$room = new Room();
          			 
				$room->ROOMNUM 		=	$_POST['ROOMNUM'];
				$room->ROOM 		=	$_POST['ROOM'];
				$room->ACCOMID 		=	$_POST['ACCOMID'];
				$room->ROOMDESC 	=	$_POST['ROOMDESC'];
				$room->NUMPERSON 	=	$_POST['NUMPERSON'];
				$room->PRICE 		=	$_POST['PRICE'];
				$room->OROOMNUM 	=	$_POST['ROOMNUM'];
				if (!isset($_FILES['image']['tmp_name'])) {
					message("choisir une image", "error");
					redirect("index.php?view=list");
				}else{
					$file=$_FILES['image']['tmp_name'];
					$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name= addslashes($_FILES['image']['name']);
					$image_size= getimagesize($_FILES['image']['tmp_name']);
					
					if ($image_size==FALSE) {
						message("ce n'est pas une image!");
						redirect("index.php?view=list");
				   }else{
					
				
						$location="rooms/".$_FILES["image"]["name"];
						
		
							
						
							move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
							
							$room->ROOMIMAGE = $location;
							
					 }
				 }
				
				$room->update($_POST['ROOMID']); 
				
			 	message($_POST['ROOM'] ." modifié correctement!", "success");
			 	unset($_SESSION['id']);
			 	redirect('index.php');
				 
}

function doDelete(){
@$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$rm = new Room();
		$rm->delete($id[$i]);
	}

		message("Chambre supprimé!","info");
		redirect('index.php');
 }
 
 //function to modify picture
 
function editImg (){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				message("ce n'est pas une!");
				redirect("index.php?view=list");
		   }else{
			
		
				$location="rooms/".$_FILES["image"]["name"];
				

	 				$rm = new Room();
	          		$rm_id		= $_POST['id'];
				
			    	move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
					
					$rm->ROOMIMAGE = $location;
					$rm->update($rm_id); 
					
				 	message("Image modifié correctement!", "success");
				 	unset($_SESSION['id']);
				 	 redirect("index.php");
 			}
 		}
 }			 

function _deleteImage($catId)
{
    // we will return the status
    // whether the image deleted successfully
    $deleted = false;

	// get the image(s)
    $sql = "SELECT * 
            FROM room
            WHERE roomNo ";
	
	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}	

    $result = dbQuery($sql);
    
    if (dbNumRows($result)) {
        while ($row = dbFetchAssoc($result)) {
		extract($row);
	        // delete the image file
    	    $deleted = @unlink($roomImage);
		}	
    }
    
return $deleted;
}



?>
