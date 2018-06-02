<?php

function dd($var){
    die(var_dump($var));
}

function isAjaxRequest(){
    return isset($_REQUEST['ajax']);
}

function getAction(){
    return isset($_REQUEST['action']) ? $_REQUEST['action'] : false;
}