<?php
include_once('Numbers.php');

$n = new Numbers();
$n->addNumber(2);

$evenNumbers = $n->getEvenNumbers();
$oddsNumbers = $n->getOddsNumbers();

if(count($evenNumbers) == 1) {
	echo 'Test okej <br />';
}
if(count($oddsNumbers) == 0) {
	echo 'Test okej <br />';
}

if(isset($evenNumbers['0']) && $evenNumbers['0'] == 2) {
	echo 'Test okej <br />';
}

if(!isset($oddsNumbers['0'])) {
	echo 'Test okej <br />';
}

if ($n->getResult() == 'Trzykrotność liczb parzystych jest większa') {
	echo 'Test okej <br />';
}