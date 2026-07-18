<?php

    $conn = mysqli_connect("localhost","root","","health_consultation");
    if(!$conn)
    {
        die("connection failed");
    }
    else{
   if(isset($_POST['btn-submit'])){
    $id =$_POST['id'];
$picture = $_FILES['picture']['name'];
$temp = $_FILES['picture']['tmp_name'];

move_uploaded_file($temp, "../upload/" . $picture);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $specialist = $_POST['specialist'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $fee = $_POST['fee'];

        $sql = "INSERT INTO add_doctor (id, picture, name, address, specialist, email, phone, education, experience, fee)
         VALUES ('$id', '$picture', '$name','$address', '$specialist', '$email', '$phone', '$education', '$experience', '$fee')";
        

    if(mysqli_query($conn, $sql))
        {
            echo "inserted sucessfully";
        }
        else{
            echo mysqli_error($conn);
        }
    }
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Doctor</title>

<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="../css/dash-doctor-add-form.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h2><i class="fa-solid fa-user-doctor"></i> Add New Doctor</h2>
    </div>

    <form action="dash-doctor-add-form.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" name="id" placeholder="Enter Doctor ID" required>
        </div>

        <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" name="picture" accept="image/*">
        </div>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter Full Name" required>
        </div>

         <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" placeholder="Enter address" required>
        </div>


        <div class="form-group">
            <label>Specialist</label>
            <select name="specialist" placeholder="seleect specialist" required>
                <option>Select Specialist</option>
                <option>Cardiologist</option>
                <option>Neurologist</option>
                <option>Orthopedic</option>
                <option>Dermatologist</option>
                <option>Pediatrician</option>
            </select>

        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="number" name="phone" placeholder="98XXXXXXXX" required>
        </div>

        <div class="form-group">
            <label>Qualification</label>
            <input type="text" name="education" placeholder="Enter qualification" required>
        </div>
        
        <div class="form-group">
            <label>Experience</label>
            <input type="text" name="experience" placeholder="Enter Experience" required>
        </div>  

        <div class="form-group">
            <label>consultation fee Rs.</label>
            <input type="text" name="fee" placeholder="Enter consultation fee" required>
        </div>

        <div class="buttons">
            <button class="save" type="submit" name="btn-submit" class="btn-submit">
                <i class="fa-solid fa-floppy-disk"></i> Save Doctor
            </button>

            <button type="reset" class="reset">
                <i class="fa-solid fa-rotate-right"></i> Reset
            </button>
        </div>

    </form>

</div>

</body>
</html>