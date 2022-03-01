<?php
    include 'conn.php';

    if (isset($_POST['submit']))
    {
        $Plate = $_POST['Plate'];
    
        if(empty($Plate))
        {
            header("Location: busconfig.php?error=Cannot be empty!");
	        exit();
        }
        else
        {
            $sql = "INSERT into bus(BusPlateNumber) values('$Plate')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                header("Location: buses.php");
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
        <title>Add Bus</title>
        <link rel="stylesheet" href="styles/busconfig.css">
    </head>
    
    <body>
        <div class="container">
                <div class="header">
                    <h2>Register New Bus</h2>
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
                    BusPlateNumber:   
                    <input type="text" name="Plate" placeholder="BusPlateNumber" autocomplete="off">  
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