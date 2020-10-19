<?php 
	require_once __DIR__. "/autoload/autoload.php";
	$key = intval(getInput("key"));
	$sl = intval(getInput("sl"));

	if($sl==0)
	{
		unset($_SESSION['cart'][$key]);
	}
	else
	{
		$_SESSION['cart'][$key]['sl']=$sl;
	}
	echo 1;
 ?>