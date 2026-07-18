<?php
$conn = mysqli_connect("localhost","root","","health_consultation");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "SELECT * FROM add_doctor WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<?php

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name']; 
    $address = $_POST['address'];
    $specialist = $_POST['specialist'];
    $education = $_POST['education'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // पुरानो फोटो
    $picture = $row['picture'];

    // नयाँ फोटो upload भयो भने
    if($_FILES['picture']['name'] != ""){

        // पुरानो फोटो delete
        if(file_exists("../uploads/".$picture)){
            unlink("../uploads/".$picture);
        }

        // नयाँ फोटो upload
        $picture = $_FILES['picture']['name'];
        $temp = $_FILES['picture']['tmp_name'];

        move_uploaded_file($temp,"../uploads/".$picture);
    }

    $sql = "UPDATE add_doctor SET

    id='$id',
    picture='$picture',
    name='$name',
    address='$address',
    specialist='$specialist',
    email='$email',
    phone='$phone',
    education='$education'

    WHERE id='$id'";

    if(mysqli_query($conn,$sql)){

        echo "<script>
        alert('Doctor Updated Successfully');
        window.location='dash-doctor.php';
        </script>";

    }else{
        echo "<script>alert('Update Failed');</script>";
    }
}

?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">

    <input type="text" name="id" value="<?php echo $row['id']; ?>" required>

<label>Current Photo</label><br>
<img src="../upload/<?php echo $row['picture']; ?>" width="120" style="border-radius:10px;"><br><br>
<label>Change Photo</label>
<input type="file" name="picture">
</div>

<input type="text" name="name" value="<?php echo $row['name']; ?>" required> 
<input type="text" name="address" value="<?php echo $row['address']; ?>" required>

<select name="specialist" required>
<option value="Cardiologist" <?php if($row['specialist']=="Cardiologist") echo "selected"; ?>> Cardiologist </option>
<option value="Neurologist" <?php if($row['specialist']=="Neurologist") echo "selected"; ?>> Neurologist </option>
<option value="Orthopedic" <?php if($row['specialist']=="Orthopedic") echo "selected"; ?>> Orthopedic </option>
<option value="Dermatologist" <?php if($row['specialist']=="Dermatologist") echo "selected"; ?>> Dermatologist </option>
<option value="Pediatrician" <?php if($row['specialist']=="Pediatrician") echo "selected"; ?>> Pediatrician </option>
</select>

<input type="email" name="email" value="<?php echo $row['email']; ?>" required>
<input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
<input type="text" name="education" value="<?php echo $row['education']; ?>" required>

<button type="submit" name="update" class="save"><i class="fa-solid fa-floppy-disk"></i>Update Doctor</button>
