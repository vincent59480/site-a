<?php
// tableaux numériques
$numericalArray = array(
"pomme", // index :0
"poire", // index :1
"banane" // index :2 
);
// affiche banane
echo $numericalArray[2];
echo "<br>";

/**
 * tableau associatif
 */
$assoArray = array(
    "firstname"=>"bruce",
    "lastname" => "Wayne"
);
echo $assoArray["firstname"];
echo "------";
echo "<br>";
echo "------";
echo "<br>";

print_r($numericalArray);
echo "------";
echo "<br>";
print_r($assoArray);
/**
 * fonction pour débuguer 
 */
function debug($data)  { 
    echo "<pre>";
    print_r($data);
    echo"</pre>";
    }
    debug($assoArray);
    debug($numericalArray);
    
