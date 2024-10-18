<?php

if (!isset($_SESSION['dragonhouse_cart'])) {
  # code...
  redirect(WEB_ROOT.'index.php');
}


// if (isset($_POST['profileCheck'])) {
//   # code...
//     unset($_SESSION['pay']);
//    unset($_SESSION['dragonhouse_cart']);
// }

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
            <h1  >Détails de réservation
                 
            </h1> 
       </div> 
  </div>

<div class="container"> 

    <div class="col-xs-12 col-sm-11">
      <!--<div class="jumbotron">-->
        <div class="">
           

          <td valign="top" class="body" style="padding-bottom:10px;">

           <form action="index.php?view=payment" method="post"  name="" >
            <span id="printout">
            
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Mr/Mme<?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <!-- <?php echo $email;?><br/><br/> -->
           Cher Mr/Mme. <?php echo $last;?>,<br/><br/>
           Cheleureux salutations de notre part!<br/><br/>
           S'il vous plait confirmez votre reservation:<br/><br/>
           <strong>GUEST NAME(S):</strong> <?php echo $name.' '.$last;?>


          </p>

        <table class="table table-hover">
              <thead>
                <tr  bgcolor="#999999">
                  <!-- <th width="10">#</th> -->
                  <th align="center" width="120">Type de chambre</th>
                  <th align="center" width="120">Date d'entrée</th>
                  <th align="center" width="120">Date de sortie</th>
                  <th align="center" width="120">Nuits</th>
                  <th  width="120">Prix</th>
                  <th align="center" width="120">Chambre</th>
                  <th align="center" width="90">Total</th> 
                </tr> 
              </thead>
          <tbody>
          
            <?php




             // $arival   = $_SESSION['from']; 
             //  $departure = $_SESSION['to']; 
              // $days = dateDiff($arival,$departure);
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
                echo '<td> dh '. $result->PRICE.'</td>';
                echo '<td >1</td>';
                echo '<td >dh '. $_SESSION['dragonhouse_cart'][$i]['dragonhouseroomprice'].'</td>'; 
                echo '</tr>';
              } 


          }
           $payable= $result->PRICE *$days;
           $_SESSION['pay']= $payable;
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="5"></td><td align="right"><h5><b>Montant: </b></h5>
              <td align="left">
              <h5><b> <?php echo 'dh ' . $payable= $days*$result->PRICE; ?></b></h5>
                           
              </td>
            </tr>
            <!--   <tr>
            <td colspan="4"></td><td colspan="5">
                  <div class="col-xs-12 col-sm-12" align="right">
                      <button type="submit" class="btn btn-primary" align="right" name="btnlogin">Paiement</button>
                  </div>

            </td>
            </tr> -->

          </tfoot>  
        </table>

    <?php   
     // unset($_SESSION['pay']);
     //    unset($_SESSION['dragonhouse_cart']);
        ?>
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
</span>
<div id="divButtons" name="divButtons">
<a href="print_reservation.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> imprimer</a>
<!-- <input type="button" value="Print" onclick="tablePrint();" class="btn btn-primary"> -->
</div>
              </form>
 
        </div>
    <!--  </div>-->
    </div>
    <!--/span--> 
    <!--Sidebar-->

  </div>
  <!--/row-->
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>