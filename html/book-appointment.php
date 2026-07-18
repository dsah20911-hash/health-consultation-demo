<?php
session_start();

if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

//----------------------
// Database Connection
//----------------------
$conn = mysqli_connect("localhost", "root", "", "health_consultation");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

//----------------------
// Form submission
//----------------------
if (isset($_POST['patient_name'])) {

    $name = $_POST['patient_name'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $message = $_POST['message'];
 $status = "pending";

    $sql = "INSERT INTO book_appointments
    (patient_name, phone, age, gender, department, appointment_date, appointment_time, message, status)
    VALUES
    ('$name','$phone','$age','$gender','$department','$date','$time','$message','$status')";

    if (mysqli_query($conn, $sql)) {
        $success_msg = "Appointment Booked Successfully!";
    } else {
        $error_msg = "Error Booking Appointment: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../css/book.css">
</head>
<body>

<div class="booking-container">
    <div class="form-header">
        <h2>Book an Appointment</h2>
        <p>Fill out the form below to schedule a consultation.</p>

        <?php
        if (isset($success_msg)) {
            echo "<p style='color:green;font-weight:bold;'>$success_msg</p>";
        }

        if (isset($error_msg)) {
            echo "<p style='color:red;font-weight:bold;'>$error_msg</p>";
        }
        ?>
    </div>

    <form action="" method="POST">

        <div class="form-row">
            <div class="form-group">
                <label>Patient Name</label>
                <input type="text" name="patient_name" placeholder="Full Name" required>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="98XXXXXXXX" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" placeholder="e.g. 25" required>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Select Department</label>
            <select name="department" required>
                <option value="">-- Choose Department --</option>
                <option value="general">General Physician</option>
                <option value="cardio">Cardiology (Heart)</option>
                <option value="dental">Dental</option>
                <option value="derma">Dermatology (Skin)</option>
            </select>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Preferred Date</label>
                <input type="date" name="appointment_date" required>
            </div>

            <div class="form-group">
                <label>Preferred Time</label>
                <select name="appointment_time" required>
                    <option value="morning">Morning (9 AM - 12 PM)</option>
                    <option value="afternoon">Afternoon (1 PM - 4 PM)</option>
                    <option value="evening">Evening (5 PM - 8 PM)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Describe Your Problem</label>
            <textarea name="message" rows="4" placeholder="Briefly describe your symptoms..."></textarea>
        </div>

        <button type="submit" class="btn-submit">Confirm Booking</button>

    </form>
</div>

</body>
</html>