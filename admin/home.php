<div class="container">
<h3>Tableau de bord d'administrateur:Bienvenue<?php echo $_SESSION['ADMIN_UNAME'];?></h3>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Chambres
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
      L’hotel dispose de différentes chambres classées selon des types. Chaque chambre appartient a une catégorie particulière et a une capacité maximale d'adultes et d'enfants pouvant être accueillis. Cliquer<a href="mod_room/index.php"> ici.</a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Accomodation
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
      Il s'agit des catégories de chambres de cet hôtel. Chaque catégorie de chambres a des caractéristiques uniques différentes les unes des autres. Pour voir toutes les catégories de tous les types de chambres, cliquez <a href="mod_accomodation/index.php">ICI.</a>  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Reservation
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
      Vous pouvez voir toutes les transactions de réservation de tous les clients. Ce qui permettra à la réceptionniste de confirmer la demande du client ou d'annuler la réservation. Cliquez <a href="mod_reservation/index.php">ICI.</a>
       </div>
    </div>
  </div>
 
   <?php if($_SESSION['ADMIN_UROLE']=="Administrator"){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
          Utilisateurs
        </a>
      </h4>
    </div>
    <div id="collapsesix" class="panel-collapse collapse">
      <div class="panel-body">
      Le système affiche la liste de toutes les personnes qui ont été enregistrées dans le système.Pour voir tous les utilisateurs enregistrés autres que l'utilisateur connecté, cliquez  <a href="mod_users/index.php">ICI.</a>
      </div>
    </div>
  </div>
  <!-- <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseseven">
          Utilities
        </a>
      </h4>
    </div>
    <div id="collapseseven" class="panel-collapse collapse">
      <div class="panel-body">
          In this area, you can change the description and slided of pictures of the home page. Click <a href="mod_settings/index.php">HERE.</a>
      </div>
    </div>
  </div> -->
 <?php } ?>
</div>
</div>