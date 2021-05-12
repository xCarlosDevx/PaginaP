
<?php

$servername =   'bxarti5uv4vopmmni1i0-mysql.services.clever-cloud.com';
$username   =   'uq3vruf4b6lbifjl';
$password   =   'GDyQwVjHOTrgS4biT74K';
$dbname     =   "bxarti5uv4vopmmni1i0";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
