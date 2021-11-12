<?php
    include 'conn.php';

    if (isset($_POST['submit']))
    {
        $Plate = $_POST['Plate'];
        $Plate2 = $_POST['Plate2'];

        if(empty($Plate) and empty($Plate2))
        {
            header("Location: adminconfig.php?error=Both fields cannot be empty!");
	        exit();
        }
        elseif(empty($Plate))
        {
            header("Location: adminconfig.php?error=Username cannot be empty!");
	        exit();
        }
        elseif(empty($Plate2))
        {
            header("Location: adminconfig.php?error=Password cannot be empty!");
	        exit();
        }
        else
        {
            $sql="INSERT into admin(Username, Password) values('$Plate', '$Plate2')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                header("Location: add_admin.php");
	            exit(); 
            }   
        }
    }
    
    session_start();

    if (isset($_SESSION['ID']) && isset($_SESSION['Username']))
    {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Admin</title>
        <link rel="stylesheet" href="styles/adminconfig.css">
    </head>
    
    <body>
        <div class="container">
                <div class="header">
                    <h2>Add Admin</h2>
                    <div class="error">
                        <?php if (isset($_GET['error'])) 
                        { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php 
                        } ?> 
                    </div>
                </div>

            <form method="POST" class="form">    
                <div class="form-control">  
                    Username:   
                    <input type="text" name="Plate" placeholder="Username" autocomplete="off">  
                </div>
                <div class="form-control">  
                    Password:   
                    <input type="text" name="Plate2" placeholder="Password" autocomplete="off">  
                </div>                                
                <button name="submit">Submit</button>                             
            </form>
        </div>
        <script src="JavaScript/transition.js"></script>
    </body>
</html>

<?php
}
else
{
    header("Location: sign_in.php");
    exit();
}
?>