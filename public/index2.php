<?php
// 1 On démarre la session
session_start();
$data=null;
// 3.récupération des données du formaulaire
if ($_SERVER["REQUEST_METHOD"]=== "POST"){

    $data=isset($_POST["data"]) ? trim($_POST["data"]):null;
    // 4 controle du champ
    $message =null;
    if (preg_match("/[a-z-]+/",$data)){

        $message=[
            "state"=> "succes",
            "msg"=> "c'est une chaine"
        ];
    } else {
        $message=[
            "state"=> "danger",
            "msg"=> "ce n'est pas une chaine"  
        ];
    }
    //5. Ajout du message dans la $_SESSION
    $_SESSION["flashmsg"]=$message;
    //9. on redirige l'utilisateur 
    header("location:".$_SERVER["HTTP_REFERER"]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vertex</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4">
                <!-- 6 test de l'existance du message -->
                <?php if(isset($_SESSION["flashmsg"]) && !empty($_SESSION["flashmag"])) : ?>
                 <div class="alert alert-<?= $_SESSION["flashmsg"]["state"]?>">
                        <?=$_SESSION["flashmsg"]["msg"]?>
                 </div>   
            <?php endif;?>

            <!-- 2. aff -->
            <form method="post">
                <input type="text" name="data" class="form-control">
                <button class="btn btn-info btn-block">send</button>
            </form>

            </div>

    </div>
    </div>

</body> 
</html> 