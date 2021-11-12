<?php
    include 'conn.php';

    if(isset($_GET['deleteid']))
    {
        $ID=$_GET['deleteid'];

        $sql="DELETE from schedules where ID=$ID";
        $result=mysqli_query($conn, $sql);

        if($result)
        {
            header('Location: routes.php');
        }
    }
?>