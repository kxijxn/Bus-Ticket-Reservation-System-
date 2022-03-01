<?php
    include 'conn.php';
    $ID = $_GET['updateid'];
    $sql= "SELECT * from schedules where ID=$ID";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['BusPlateNumber'];
    $name2 = $row['Route'];
    $name3 = $row['Departure'];
    $name4 = $row['Date'];
    $name5 = $row['Price'];
    $name6 = $row['Time'];
    
    if (isset($_POST['submit']))
    {
        $Plate = $_POST['busID'];
        $Plate2 = $_POST['route'];
        $Plate3 = $_POST['departure'];
        $Plate4 = $_POST['date'];
        $Plate5 = $_POST['price'];
        $Plate6 = $_POST['time'];

        $sql = "UPDATE schedules set ID=$ID, BusPlateNumber='$Plate',Route='$Plate2', Departure='$Plate3', Date='$Plate4', Price='$Plate5', Time='$Plate6' Where ID=$ID";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header("Location: routes.php");
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
        <title>Update Route</title>
        <link rel="stylesheet" href="styles/routeconfig.css">
    </head>
    
    <body>
        <div class="container">
                <div class="header">
                    <h2>Update Route</h2>
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
                    <input type="text" name="busID" placeholder="BusID" autocomplete="off" value="<?php print $name;?>">  
                </div>
                <div class="form-control">  
                    Route:   
                    <input type="text" name="route" placeholder="Route" autocomplete="off" value="<?php print $name2;?>">  
                </div>
                <div class="form-control">  
                    Departure:   
                    <input type="text" name="departure" placeholder="Departure" autocomplete="off" value="<?php print $name3;?>">  
                </div>
                <div class="form-control">  
                    Date:   
                    <input type="text" name="date" placeholder="Date" autocomplete="off" value="<?php print $name4;?>">  
                </div> 
                <div class="form-control">  
                    Price:   
                    <input type="text" name="price" placeholder="Price" autocomplete="off" value="<?php print $name5;?>">   
                </div>
                <div class="form-control">  
                    Time:   
                    <input type="text" name="time" placeholder="Time" autocomplete="off" value="<?php print $name6;?>">  
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
    header("Location: index_admin.php");
    exit();
}
?>