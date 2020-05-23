<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "formula-1-database");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




if (isset($_POST['log']))
{

  if(empty($_POST['username']) || empty($_POST['password'])   )
  {
  	echo "<script>alert('You have an empty field.');</script>";

      	echo"<script>location.assign('login_page.html')</script>";  // go back to the login page
  }


		$username = mysql_real_escape_string($_POST['username']);     // to get rid of the tricky characters which can destroy the database.
		$password = mysql_real_escape_string($_POST['password']);  // turn into a hash function.
	  $mysql_result= mysqli_query($link,"SELECT * from login WHERE username LIKE '$username' AND password LIKE '$password' LIMIT 1 ");
    $row_cnt = mysqli_num_rows($mysql_result);


			if($row_cnt!=1)   // if there is no such user like that.
		{
			echo "<script>alert('The username or the password does not exist in the database');</script>";

				echo"<script>location.assign('login_page.html')</script>";  // go back to the login page
		}

  else {
			echo "<script>alert('You have succesfully entered the system !');</script>";

			//session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		if($username==="user1")
		{	
      	echo"<script>location.assign('welcome_page.php')</script>";  // go to the new page
        }
        else
        {
        echo"<script>location.assign('welcome_page2.php')</script>";	
        }


		}

}
