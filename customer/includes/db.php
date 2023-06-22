<?php
$con=mysqli_connect("localhost","root","","onlineshopping");

        if(mysqli_connect_errno())
        {
            echo "Failed to connect to Mysql" . mysql_error();
        }
    ?>