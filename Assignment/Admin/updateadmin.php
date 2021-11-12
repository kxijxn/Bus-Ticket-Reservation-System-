<?php
    include 'conn.php';
    $ID = $_GET['updateid'];
    $sql= "SELECT * from admin where ID=$ID";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['Username'];
    $name2 = $row['Password'];
    
    if (isset($_POST['submit']))
    {
        $Plate = $_POST['Plate'];
        $Plate2 = $_POST['Plate2'];

        $sql = "UPDATE admin set ID=$ID, Username='$Plate', Password='$Plate2' where ID=$ID";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header("Location: add_admin.php");
	        exit();    
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
        <title>Update Admin</title>
        <link rel="stylesheet" href="styles/adminconfig.css">
    </head>
    
    <body>
        <div class="container">
                <div class="header">
                    <h2>Update Admin</h2>
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
                    <input type="text" name="Plate" placeholder="Username" autocomplete="off" value="<?php print $name;?>">  
                </div>
                <div class="form-control">  
                    Password:   
                    <input type="text" name="Plate2" placeholder="Password" autocomplete="off" value="<?php print $name2;?>">  
                </div>                                  
                <button name="submit">Update</button>                             
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