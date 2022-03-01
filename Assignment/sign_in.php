<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>
        <link rel="stylesheet" href="styles/signin.css">
        
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
                    <h2>Sign In</h2>
                    <div class="error">
                        <?php if (isset($_GET['error'])) 
                        { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php 
                        } ?>
                    </div>
                </div>

            <form method="POST" class="form" action="login.php">    
                <div class="form-control">  
                    Username:   
                    <input type="text" name="username" placeholder="Username" autocomplete="off">  
                </div> 
                <div class="form-control">   
                    Password:   
                    <input type="password" name="password" placeholder="Password" autocomplete="off">  
                </div>                                 
                <button name="submit">Sign In</button>  
                <div class="signup_link">
                    Not a member? <a href="sign_up.php">Click here to Sign Up!</a>
                </div>                             
            </form>
        </div>
        <script src="JavaScript/transition.js"></script>
    </body>
</html>