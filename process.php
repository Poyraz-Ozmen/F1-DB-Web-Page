<?php

session_start();

$mysqli = new mysqli('localhost', 'root','','formula-1-database') or die(mysqli_error($mysqli));

$update=false;
$name='';
$nation='';
$pid=0;
if (isset($_POST['save'])){
	$name = $_POST['name'];
	$nation = $_POST['nation'];
	$pid = $_POST['pid'];

	

	$mysqli->query("INSERT INTO pilots (name, nation, pid) VALUES ('$name', '$nation', '$pid')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	header("location: index2.php");
}

if (isset($_GET['delete'])){
	$pid = $_GET['delete'];
	$mysqli->query("DELETE FROM pilots WHERE pid=$pid") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	header("location: index2.php");

}

if (isset($_GET['edit'])){
	$pid = $_GET['edit'];
	$update=true;
	$result = $mysqli->query("SELECT * FROM pilots WHERE pid=$pid") or die($mysqli->error());
	if(count($result)==1){
		$row = $result->fetch_array();
		$name = $row['name'];
		$nation = $row['nation'];
		$pid = $row['pid'];
	}
}

if (isset($_POST['update'])){
	$pid = $_POST['pid'];
	$name =$_POST['name'];
	$nation = $_POST['nation'];

	$mysqli->query("UPDATE pilots SET name='$name', nation='$nation' WHERE pid=$pid") or die($mysqli->error());
	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";
	header("location: index2.php");
}