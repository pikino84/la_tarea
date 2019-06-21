<?php
//FUNCION
function calculaedad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
    return $ano_diferencia;
}
    
function plural($age){
    switch($age){
        case 0:
            $plural = "años";
        break;
        case 1:
            $plural = "año";
        break;
        default:
            $plural = "años";
        break;
    }
    return $plural;
}