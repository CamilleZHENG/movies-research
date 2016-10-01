<?php

include 'data.php';
include 'functions.php';

$error_message = [];
//$movies_selected = [];

if(array_key_exists('research_duration', $_POST)){

    $duration_searched = intval(trim(filter_var($_POST['research_duration'],FILTER_SANITIZE_STRING)));

    if(empty($duration_searched)){

        $error_message['saisie'] = 'Saisir la durée du film que vous voulez rechercher.';
    }
    else {

        $movies_selected = array_filter($movies,function($movie){
        if($movie['duration'] <= intval(trim(filter_var($_POST['research_duration'],FILTER_SANITIZE_STRING)))){
          return TRUE;
        }
        else {
          return FALSE;
        }
        });

        if(empty($movies_selected)){
          $error_message['result'] = 'Aucun film correspond votre recherche.';
        }
    }
}

include 'research_duration.phtml';
