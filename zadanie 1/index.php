<?php
include_once('Numbers.php');

$n = new Numbers();
$n->addNumber(1);
$n->addNumber(2);
$n->addNumber(4);
$n->addNumber(5);

echo $n->getResult();