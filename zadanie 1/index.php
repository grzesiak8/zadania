<?php
include_once('Numbers.php');


$n = new Numbers();
$n->addNumber(1);
$n->addNumber(4);
$n->addNumber(3);


echo $n->getResult();