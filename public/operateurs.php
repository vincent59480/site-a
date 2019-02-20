<?php
// Opérateur d'affectation
// =
$var = "Valeur";
$a = 12;
$b = 25;
// Opérateur de comparaison
// ==
$a == $b;
// === Compare les valeur ET les types
$a === $b;
// ! Différent , retourne l'inverse
!true; // vaut false

// != différent de .. 
$a!=$b;
// !== strictement Différent de 
$a!== $b;
// > Supérieur à 
$a > $b;
// supérieur ou égale
$a >=$b;
// Inférieur à
$a < $b;
// Inférieur ou égale
$a <= $b;

// Opérateur de tableau
// =>
$monTableau = array(
    "fruit_1"=>"pomme",
    "fruit_2" => "poire"
);
echo $monTableau["fruit_2"]; // affiche poire

// Opérateur de concaténation
// .
$a="Hello ";
$b="World";
$a.$b; // retourne hello Word
// les objets
$monObject = (object)array(
    "fruit_1"=>"pomme",
    "fruit_2" => "poire"

);
var_dump ($monObject);
// Opérateur d'Object
// ->

echo "<br>";
echo $monObject ->fruit_2;
echo "<br>";

/**
 * Les opérateurs logiques
 */

// ET &&
var_dump (true && true);

// ou OR ||
var_dump (true or true);

// ou exclusif 
// Xor 
// 1 des deux est vrai renvoie vrai
var_dump (true xor false); // renvoie true
