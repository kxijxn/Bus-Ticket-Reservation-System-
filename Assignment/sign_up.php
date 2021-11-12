<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <link rel="stylesheet" href="styles/signup.css">
        
    </head>
    
    <body>
        <div class="transition transition-1 is-active"></div>

        <div class="nav">
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="sign_in.php">Sign In</a></li>
                    <li><a href="sign_up.php" class="active">Sign Up</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </div> 


        <div class="container">
            <div class="header">
                <h2>Sign Up</h2>
                <div class="Req">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                </div>
                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>   
            </div>
               
            <form method="POST" class="form" action="signup-check.php" >    
                <div class="form-control">
                    Username: 
                    <?php if (isset($_GET['username'])) 
                    {?>
                        <input type="text" name="username" placeholder="Username" value="<?php echo $_GET['username']; ?>">
                    <?php 
                    }
                    else
                    { ?>
                        <input type="text" name="username" placeholder="Username" autocomplete="off">
                    <?php 
                    }?>  
                </div>  
                <div class="form-control">   
                    Password:
                    <?php if (isset($_GET['password'])) 
                    { ?>
                        <input type="password" name="password" placeholder="Password" value="<?php echo $_GET['password']; ?>">
                    <?php 
                    }
                    else
                    { ?>
                        <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <?php 
                    }?>    
                      
                </div>
                <div class="form-control">   
                    Confirm Password:   
                    <?php if (isset($_GET['password2'])) 
                    { ?>
                        <input type="password" name="password2" placeholder="Confirm Password" value="<?php echo $_GET['password2']; ?>">
                    <?php 
                    }
                    else
                    { ?>
                        <input type="password" name="password2" placeholder="Confirm Password" autocomplete="off">
                    <?php 
                    }?>    
                </div>                             
                <button name="submit">Sign Up</button>  
                <div class="signup_link">
                    Already a member? <a href="sign_in.php">Click here to Sign In!</a>
                </div>                             
            </form>
        </div>
        <script src="JavaScript/transition.js"></script>
    </body>
</html>

