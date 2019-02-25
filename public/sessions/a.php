<?php
include_once "config.php";

$_SESSION["test"]="ABC";
// lorsque l'utilisateur arrive sur la page il est methode GET 
$name=null; 

if(!isset($_SESSION["name"])){
    $_SESSION["name"]=null;
}


//récupération de  la donnée
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $_SESSION["name"] = isset($_POST["name"]) ? trim($_POST["name"]): null ;
}

include_once "menu.php";
?>
<h1>Fichier A</h1>
<Form method = "POST" >
<input type ="text" name="name" >
<button type="submit"> Valider</button>
</Form>

<?php
if(!empty($_SESSION["name"])) :?>
<div>

Bonjour <?=$_SESSION["name"]?>
</div>
<?php endif;?>





