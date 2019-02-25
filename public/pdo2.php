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
 * 2. connection à la BD
 */
$db_type="mysql";
// $db_info="mysql:host=127.0.0.1;dbname=webpizza";
$db_info= "$db_type:host=$db_host;dbname=$db_schema";

try {
    $db = new PDO($db_info,$db_user,$db_pass);
} catch (PDOException $e) {
    print "Erreur!:".$e->getMessage()."<br>";
    echo __FILE__."à la ligne".__LINE__;
    die(); // on arrete le programme ici
}

//définition du charset
$db->exec("set names utf8");

/**
 * 3. La requete
 * Définition de la requete
 */
// on récupere l'id depuis l'url
$id=isset($_GET["id"])? intval($_GET["id"]):null;
// var_dump($id);

// si l'$id n'est pas null, on execute la requete
if($id!=null){
    $qstr_ingredients = "SELECT * FROM ingredients where id=:maVarPDO";
    //  récupération du resultat de la requete
    // $q_ingredients=$db->query($qstr_ingredients);
    $q_ingredients=$db->prepare($qstr_ingredients);
    // var_dump($q_ingredients);
    //execution de la requete 
    // $r_ingredients=$q_ingredients->fetchAll();
    // $q_ingredients->execute([
    //     "maVarPDO"=>$id
    //     ]);
    // on caste la valeur de $id en entier
    // var_dump(":maVarPDO");
        $q_ingredients->bindValue(":maVarPDO",$id,PDO::PARAM_INT);
        $q_ingredients->execute();
    $r_ingredients=$q_ingredients->fetchAll();
    var_dump($r_ingredients);

}
else{
    // si $id est null, on déclare $r_ingredients vide
    $r_ingredients=[];
}

?>
<!-- affiche le resultat de la requete dans un tableau -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Vegan</th>
            <th>Hallal</th>
        </tr>
    </thead>
<tbody>
<?php foreach ($r_ingredients as $key => $value):?>
<tr>
        <td><?= $value["id"];?></td>
        <td><?= $value["name"];?></td>
        <td><?= $value["vegan_compliance"];?></td>
        <td><?= $value["halal_compliance"];?></td>
    </tr>
<?php endforeach; ?>
</tbody>

</table>

<?php
// fermeture de la connection pdo
$db= null;