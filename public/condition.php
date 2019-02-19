<?php
// IF
if(condition)
{
    //code a executer si "condition" vrai
}
// IF .... else
if(condition)
{
    //code a executer si "condition" vrai
}else {
     //code a executer si "condition" fausse
 }


// IF .... else IF 
if(condition)
{
    //code a executer si "condition" vrai
}
 else if (condition_2){
     //code a executer si "condition 2" est vrai
 }
// IF .... else IF .... else 
if(condition){
    //code a réaliser si condition est réalisée

} elseif (condition2) {
    # code...a executer si "condition2" est realisée
} else {
    # code...a executer si condition2 est fausse
}

// switch 
switch ($variable) {
    case 'A':
        # code... a executer si $variable vaut A
        break;
    case 'B':
        # code...a executer si $variable vaut B
        break;
    default:
        # code...a executer si $variable ne vaut ni A ni B 
        break;
}

// ternaire
$result =condition ? true :false;
