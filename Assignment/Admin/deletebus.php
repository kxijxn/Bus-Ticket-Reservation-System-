<?php
    include 'conn.php';

    if(isset($_GET['deleteid']))
    {
        $ID=$_GET['deleteid'];

        $sql="DELETE from bus where BusID=$ID";
        $result=mysqli_query($conn, $sql);

        if($result)
        {
            header('Location: buses.php');
        }
    }
?>