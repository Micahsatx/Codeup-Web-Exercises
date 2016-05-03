<?php


function inputHas($key){
    // isset always returns true or false
    return isset($_REQUEST[$key]);

    // works exactly the same as above use shorter code.
    // if(isset($_REQUEST[$key])){
    //     return true;     
    // } else {
    //     return false;
    // }
}

function inputGet($key){
    return inputHas($key) ? $_REQUEST[$key] : null;
}

function loggedInUser(){
    if(isset($_SESSION['logged_in_user'])){
        return $_SESSION['logged_in_user'];
    }
}

function redirect($url){
    header("Location: $url");
    exit();
}

?>