<?php
$phpIsBorn=1995;
$MIT_Students =["Andi Gutmans","Zeev Suraski"];
echo "Rasmus Lerdorf est le créateur de php.<br>\n";
echo "A l'origine PHP veut dire Personal Home Page.<br>\n";
echo "Php est née en ".$phpIsBorn. ".". "<br>";
echo "Quelques Années après,".$MIT_Students[1]." et ".$MIT_Students[0]. " reprennent le projet PHP.<br>";

$a=substr($MIT_Students[1],0,2);
$b=substr($MIT_Students[0],1,2);
echo "Ensemble, ils créent la société ".$a.$b."<br>";

$originalString="J'aime les chats !";
$newPhrase= str_replace("chat","belette",$originalString);
echo "phrase originale"," ", $originalString ,"<br>", "phrase modifiée: ", $newPhrase;
//methode 2
echo preg_replace("/chat/","belette",$originalString."<br>");
// methode 3
echo substr_replace($originalString,"chien",11);
// methode 4
$exp_str = explode(" ",$originalString);
var_dump($exp_str);
echo "<br>";
echo "nombre de caractères :". strlen($originalString)."<br>";
echo "le tableau \$MIT_Students possede:".count($MIT_Students)."entrées.<br>";
