<?php

//  1. Définition des info de BDD
// nom du serveur de base de donnée
$db_host = "127.0.0.1";
// port de BDD
$db_port ="3306";
//nom de l'utilsateur de la bdd
$db_user ="root";
// mot de passe de l'utilisateur de la BDD
$db_pass="";
// Nom de la BDD
$db_schema="webpizza";

/**
 * 2. Connection à la BDD
 * 
 */

$db=mysqli_connect($db_host,$db_user,$db_pass,$db_schema);
// print_r($db);
/**
 * 3.Une requete
 */
// $q_ingredients : variable contenant la requete
 $q_ingredients = "SELECT * FROM `ingredients` WHERE `vegan_compliance` like 1 ORDER by name ASC";

//$r_ingredients :results Ingredient
$r_ingredients = mysqli_query($db,$q_ingredients);
var_dump ($r_ingredients);
/**
 * 4. traitement de la requete
 * $d_ingredients : variable contenant le résultat sous forme de tableau associatif
 */
$d_ingredients= mysqli_fetch_all($r_ingredients,MYSQLI_ASSOC);
// print_r($d_ingredients);
?>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
             <th>Vegan</th>
            <!-- <th>Hallal</th> -->
        </tr>
    </thead>
<tbody>
    <?php foreach($d_ingredients as $key=> $value):?> 
    <tr>
        <td><?= $value["id"];?></td>
        <td><?= utf8_encode($value["name"]);?></td>
        <td><?= $value["vegan_compliance"];?></td>
        <!-- <td><?= $value["halal_compliance"];?></td> -->
    </tr>
<?php endforeach; ?>
</tbody>

</table>


