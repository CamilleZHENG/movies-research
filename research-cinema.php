<?php

include 'data.php';
include 'functions.php';

$error_message = [];


if(array_key_exists('cinema', $_POST)){

  $movies_selected = array_filter($movies,function($movie){
  if( in_array($_POST['cinema'], $movie['cinema'])){
    return TRUE;
  }
  else {
    return FALSE;
  }
  });
  if(empty($movies_selected)){
    $error_message['result'] = 'Aucun film dans ce cinéma.';
  }

}



include 'research-cinema.phtml';
