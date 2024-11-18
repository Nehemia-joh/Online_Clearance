<?php

$link=mysqli_connect("localhost","root","","clearancedb");
//capture the id variable from select.php

//super global array
$id=$_GET['id'];
//sql query for deleteing a row
$query="DELETE from users WHERE id = '$id'";
$result=mysqli_query($link,$query);
if($result){
    header("location:editadd.php");
}
