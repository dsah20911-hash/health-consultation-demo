<?php
$conn = mysqli_connect("localhost","root","","health_consultation");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM add_ambulance WHERE id='$id'";

    if(mysqli_query($conn,$sql)){
        header("Location: dash-ambulance.php");
        exit();
    }else{
        echo mysqli_error($conn);
    }
}
?>