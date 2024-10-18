<!--Modal Log-out --> 

  <div class="modal fade" id="logout" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body">
		  <div class="alert alert-info">Est ce que vous etes sur de vous <strong>Deconnecter</strong>?</div>
		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
		      <a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
		  </div>
		</div> 
    </div>
</div>      
                            
<!--Logout end -->       

<!--Modal Reservation --> 

  <div class="modal fade"  id="reservation" tabindex="-1">

	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
		  </div>
		  <div class="modal-body">
		  <div class="alert alert-info">Détails de resérvations</div>
		  <form  method="post" action="processreservation.php?action=delete">

<?php
//$mydb->setQuery("SELECT *,roomName,firstname, lastname FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomNo AND re.guest_id=gu.guest_id");
/*$mydb->setQuery("SELECT * , roomName, firstname, lastname
FROM reservation re, room ro, guest gu, roomtype rt
WHERE re.roomNo = ro.roomNo
AND ro.`typeID` = rt.`typeID` 
AND re.guest_id = gu.guest_id AND reservation_id=".$_GET['res_id']);
$cur = $mydb->loadSingleResult();
*/				  			
echo $resid;
 //echo $_GET['res_id'];


?>
<p>	
<strong>Confirmation</strong>:<br/>
<strong>Nom</strong><br/>
<strong>Date d'arrivée</strong><br/>
<strong>Date de depart</strong><br/>
<strong>Chambre</strong><br/>
<strong>Type de chambre</strong><br/>
<strong>Nombre de nuits</strong><br/>
<strong>Status</strong><br/>
<strong>Option</strong><br/>
</p>



</form>


		  </div>
		  <div class="modal-footer">
		      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> fermer</button>
		      <a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Deconnecter</a>
		  </div>
		</div> 
    </div>
</div>      
                            
<!--reseionrvat end -->   

</tbody>
</table>

</form>
