<?php
    session_start();
    include 'conn.php';
    $scheduleID = $_GET['id'];
    $userID = $_SESSION['ID'];
    
    
    if (isset($_POST['submit'])) 
    {
        $scheduleID = $_POST['scheduleID'];
        $userID = $_POST['userID'];
        $card = $_POST['card'];
        $cv = $_POST['cv'];

        if (empty($card) && empty($cv)) 
        {
            header("Location: payment.php?error=Both fields is required!");
            exit();
        }
        else if (empty($card)) 
        {
            header("Location: payment.php?error=Card Number is required!");
            exit();
        }
        else if(empty($cv))
        {
            header("Location: payment.php?error=CVV is required!");
            exit();
        }
        else
        {
            $sql = "INSERT into booking(user_id, schedule_id) values('$userID', '$scheduleID')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                header("Location: bookings.php");
                exit();
            }
            
        };
    };


    if (isset($_SESSION['ID']) && isset($_SESSION['Username']))
    {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment</title>
        <link rel="stylesheet" href="styles/signup.css">
        
    </head>
    
    <body>
        <div class="transition transition-1 is-active"></div>

        <div class="nav">
            <nav>
            <ul class="nav-links">
                    <li><a href="index_user.php">Home</a></li>
                    <li><a href="logout.php" class="active">Sign Out</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </div> 


        <div class="container">
            <div class="header">
                <h2>Payment</h2>
                <div class="Req">
                    <?php if (isset($_GET['error'])) 
                    { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php 
                    } ?>
                </div> 
            </div>
               
            <form method="POST" class="form">    
                <div class="form-control">
                    Card Number: 
                    <input type="text" name="card" placeholder="Card Number" autocomplete="off">
                </div>  
                <div class="form-control">   
                    CVV:
                    <input type="password" name="cv" placeholder="CVV" autocomplete="off">   
                </div>    
                <input type="hidden" name="userID" value="<?php echo $userID;?>"> 
                <input type="hidden" name="scheduleID" value="<?php echo $scheduleID;?>">                         
                <button type="submit" name="submit">Pay</button>                              
            </form>
        </div>
        <script src="JavaScript/transition.js"></script>
    </body>
</html>
<?php
}
else
{
    header("Location: index_user.php");
    exit();
}
?>