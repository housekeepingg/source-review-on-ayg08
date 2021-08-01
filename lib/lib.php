<?php

    $GLOBALS['s'] = mysqli_connect("localhost","root","","list");
    
    mysqli_query($GLOBALS['s'],"set names utf8");

    date_default_timezone_set("Asia/Seoul");
    
    session_start();

    function alert($a){
		echo "<script>alert('{$a}')</script>";
	}

	function move($a){
		echo "<script>location.replace('{$a}')</script>";
		exit();
	}

    function back(){
		echo "<script>history.back()</script>";
		exit();
	}


    function first_page(){
        move('/list/index.php');
    }

    function hit($search,$txt){
		return str_replace($search,"<span class='hit'>{$search}</span>", $txt);
	}

    $curl = $_SERVER['REQUEST_URI'];

    if($_POST){
        extract($_POST);
    }

?>

