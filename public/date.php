<?php
$tse_start=microtime(true);
$tse_end= $tse_start;
?>


<h3>
Time Stamps
</h3>
<p>
Nombre de seconde écoulées depuis le 1er Janvier 1970 à 00h00m00s
<?= time()?> <br>
<?= microtime()?> <br>
<?= microtime(true)?> <br>
</p>

<h3>
Mise en pause du script
</h3>
<div>1</div>
<div>2</div>
<div>3</div>
<div>4</div>
<div>5</div>

<h3>
Calcul du temp de chargement de la page
</h3>
<?php
$tse_end=microtime(true);
echo $tse_end-$tse_start;
?>
<h3>
Nom du jour: <?=date("D") ?><br>
Nom du jour: <?=date("l") ?><br>
Nom du jour: (mois) <?=date("j") ?><br>
Nom du jour: (mois) <?=date("d") ?><br>
Numero du jour: (semaine) <?=date("N") ?><br>
Numéro du jour: (semaine) <?=date("w") ?><br>
Nom du jour: (année) <?=date("z") ?><br>
Numero du mois: (mois) <?=date("n") ?><br>
Numero du mois: (mois) <?=date("m") ?><br>
Nom du mois: (mois) <?=date("M") ?><br>
Nom du mois: (mois) <?=date("F") ?><br>
Nombre de jour du mois: (mois) <?=date("t") ?><br>
année bissextil:  <?=date("L") ?><br>
Année:  <?=date("y") ?><br>
Année:  <?=date("Y") ?><br>
Numéro de la semaine: <?=date("W") ?><br>
</h3>
