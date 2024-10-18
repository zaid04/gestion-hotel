<!DOCTYPE html>
<?php require_once("../includes/initialize.php"); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>style.css">  
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/responsive.css">    

<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/bootstrap.css">  

<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/css/font-awesome.min.css"> 


<!-- DataTables CSS -->
<!-- <link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet"> -->
 
 <link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 <link href="<?php echo WEB_ROOT; ?>css/datepicker.css" rel="stylesheet" media="screen">

 <link href="<?php echo WEB_ROOT; ?>css/galery.css" rel="stylesheet" media="screen">
</head>
<body onload="window.print();">


<?php

if (!isset($_SESSION['dragonhouse_cart'])) {
  # code...
  redirect(WEB_ROOT.'index.php');
}


if (isset($_POST['profileCheck'])) {
  # code...
    unset($_SESSION['pay']);
   unset($_SESSION['dragonhouse_cart']);
}

/*$guestid =$_GET['guestid'];
$guest = new Guest();
$result=$guest->single_guest($guestid);*/

  $name = $_SESSION['name']; 
  $last = $_SESSION['last'];
  // $country =$_SESSION['country'];
  $city = $_SESSION['city'] ;
  $address = $_SESSION['address'];
  $zip =  $_SESSION['zip'] ;
  $phone = $_SESSION['phone'];
  // $email = $_SESSION['email'];
  // $password =$_SESSION['pass'];
  $stat = $_SESSION['pending'];

?>


<div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1  >Détails de réservations
                 
            </h1> 
       </div> 
  </div>

    <form action="index.php?view=payment" method="post"  name="" >
         
            
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Mr/Mme <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <!-- <?php echo $email;?><br/><br/> -->
           Cher MR/Mme. <?php echo $last;?>,<br/><br/>
           Chaleureux salutations de notre part!<br/><br/>
           S'il vous plait verifiers votre reservation:<br/><br/>
           <strong>Nom:</strong> <?php echo $name.' '.$last;?>


          </p>

        <table class="table table-hover" style="font-size:11px">
                  <thead>
              <tr  bgcolor="#999999">
              <!-- <th width="10">#</th> -->
              <th align="center" width="120">Type de chambre</th>
               <th align="center" width="120">Date d'entrée</th>
                <th align="center" width="120">Date de sortie</th>
                 <th align="center" width="120">Nuits</th>
              <th  width="120">Prix</th>
               <th align="center" width="120">Chambre</th>
              <th align="center" width="90">Montant</th>
           
              
         
            </tr> 
          </thead>
          <tbody>
          
            <?php




             $arival   = $_SESSION['from']; 
              $departure = $_SESSION['to']; 
              $days = dateDiff($arival,$departure);
              $count_cart = count($_SESSION['dragonhouse_cart']);

                for ($i=0; $i < $count_cart  ; $i++) {    
              $mydb->setQuery("SELECT * FROM `tblroom` r, `tblaccomodation` a WHERE  r.`ACCOMID`=a.`ACCOMID` AND `ROOMID` =". $_SESSION['dragonhouse_cart'][$i]['dragonhouseroomid']);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<tr>'; 
              // echo '<td></td>';
              echo '<td>'. $result->ROOM.' '. $result->ACCOMODATION.'</td>';
              echo '<td>'.$_SESSION['dragonhouse_cart'][$i]['dragonhousecheckin'].'</td>';
              echo '<td>'.$_SESSION['dragonhouse_cart'][$i]['dragonhousecheckout'].'</td>';
              echo '<td>'.$_SESSION['dragonhouse_cart'][$i]['dragonhouseday'].'</td>';
              echo '<td> Dh '. $result->PRICE.'</td>';
               echo '<td >1</td>';
                echo '<td >Dh '. $_SESSION['dragonhouse_cart'][$i]['dragonhouseroomprice'].'</td>';
        

              
              echo '</tr>';
            } 


          }
           $payable= $result->PRICE *$days;
           $_SESSION['pay']= $payable;
            ?>
          </tbody>
          <tfoot>
               <tr>
                   <td colspan="5"></td><td align="right"><h5><b>Total: </b></h5>
                   <td align="left">
                  <h5><b> <?php echo 'Dh ' . $payable= $days*$result->PRICE; ?></b></h5>
                                   
                  </td>
          </tr>
      
         
          </tfoot>  
        </table>

    
        <p>Nous attendons votre arrivée avec impatience et aimerions vous informer de ce qui suit afin de vous aider à planifier votre voyage.Votre numéro de réservation est<b><?php echo $_SESSION['confirmation']?>:</b><br/><br/>En cas de problème avec votre réservation, un représentant du service à la clientèle vous contactera. Sinon, considérez votre réservation confirmée.</p>
<ul>
 <li>Les animaux de compagnie ne sont pas autorises.</li>
 <li>Les aliments extérieurs sont autorisés à l'intérieur de la maison d'hôtes.</li>
 <li>L'heure d'arrivée est 13h00 et l'heure de départ est midi.</li>
 <li>Les clients arrivant avant 13h00 seront logés si les chambres sont libres et prêtes.</li>
 <li>Wifi 24h/24</li>
 <li>Les tarifs des chambres incluent la taxe gouvernementale et les frais de service.</li>
 <li>Les tarifs sont sujets à changement sans préavis.</li>
 <li>La notification d'annulation doit être faite au moins 10 jours avant l'arrivée pour le remboursement des dépôts. L'annulation reçue dans le délai de 10 jours entraînera la confiscation de l'intégralité des acomptes.

</li>
 <li>Nous servons le petit-déjeuner, le déjeuner et le dîner sur demande avec un préavis de 2 heures.</li><br>
<strong>I have agreed that I will present the following documents upon check in:</strong><br/>
 </ul>
 Si vous avez des questions, veuillez envoyer un e-mail à dragonhouse.com ou appeler le 212603669731
<br/><br/>
Merci pour choisir notre hotel
<br/><br/>
,<br/><br/>
Hotel fkih ben saleh
<br/><br/><br/>


 
</form>
</body>
</html>