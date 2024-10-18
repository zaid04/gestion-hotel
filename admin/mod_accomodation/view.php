
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Accomodation();
$result = $rm->single_accomodation($_SESSION['id']);

?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover">
			<caption><h3 align="left">Details d'accomodations</h3></caption>

		<td width="30"><strong>Nom </strong></td>
		<td><?php echo ': '.$result->ACCOMODATION; ?></td>
		</tr>
		<tr>
		<td width="30"><strong>Description </strong></td>
		<td><?php echo ': '.$result->ACCOMDESC; ?></td>
		</tr>
		<tr>
		<td> <input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" ></td>
		</tr>
		</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
<?php unset($_SESSION['id']) ?>