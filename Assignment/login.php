<?php 
session_start(); 
include "conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) 
{

	function validate($data)
    {
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$pass = validate($_POST['password']);

    if (empty($username) && empty($pass))
    {
		header("Location: sign_in.php?error=Fields cannot be empty!&$userdata");
	    exit();
	}
	else if (empty($username)) 
    {
		header("Location: sign_in.php?error=Username is required!");
	    exit();
	}
    else if(empty($pass))
    {
        header("Location: sign_in.php?error=Password is required!");
	    exit();
	}
    else
    {
        $pass = md5($pass);
        $sql = "SELECT * FROM users WHERE Username = '$username' AND Password = '$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);

            if ($row['Username'] === $username && $row['Password'] === $pass)
            {
               $_SESSION['Username'] = $row['Username'];
               $_SESSION['ID'] = $row['ID']; 
               header("Location: index_user.php"); 
            }
            else
            {
                header("Location: sign_in.php?error= Incorrect Username or Password!");
                exit();
            }
        }
        else
        {
            header("Location: sign_in.php?error= Incorrect Username or Password!");
	        exit();
        }
    }
}
else
{
	header("Location: sign_in.php");
	exit();
}