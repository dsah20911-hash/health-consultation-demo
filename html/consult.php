<?php
    $conn = mysqli_connect("localhost","root","","online_health");
    if(!$conn)
    {
        die("connection failed");
    }
    else{
   if(isset($_POST['btn-submit'])){
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];



        $sql = "INSERT INTO consult (fullname, age, gender, message) values ('$fullname', '$age', '$gender', '$message')";
    if(mysqli_query($conn, $sql))
        {
            echo "inserted sucessfully";
        }
        else{
            echo "error";
        }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><consult-form></consult-form></title>
    <link rel="stylesheet" href="consult-form.css">
    <style> /* --- General Setup --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e3f2fd; /* Light blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* --- Booking Form Container --- */
        .booking-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 600px; /* Form width limit */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 14px;
        }

        /* --- Form Fields --- */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input, 
        .form-group select, 
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: 0.3s;
            outline: none;
        }

        /* Input focus effect */
        .form-group input:focus, 
        .form-group select:focus, 
        .form-group textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        /* Row for side-by-side inputs */
        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1; /* Equal width */
        }

        /* --- Submit Button --- */
        .btn-submit {
            width: 100%;
            background-color: #28a745; /* Green color */
            color: white;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        /* Mobile Responsive */
        @media (max-width: 500px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            .booking-container {
                padding: 20px;
            }
        }</style>
</head>
<body>
     <div class="booking-container">
        <div class="form-header">
            <h2>massege chat</h2>
            <p>Fill out the form below to schedule a consultation.</p>
        </div>

        <form action="consult.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="fullname">Patient Name</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                </div>
            
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" placeholder="e.g. 25" required>
                </div><br>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    </div>
                    </div>
                    
            <div class="form-group">
                <label for="message">Describe Your Problem</label>
                <textarea id="message" name="message" rows="4" placeholder="Briefly describe your symptoms..."></textarea>
            </div>

            <button type="submit" class="btn-submit" name="btn-submit">send</button>
        </form>
        </div>
</body>
</html>