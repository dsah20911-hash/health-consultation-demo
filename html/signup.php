<?php
    // 1. Database Connection
    $conn = mysqli_connect("localhost","root","","health_consultation");
    if(!$conn)
    {
        die("connection failed");
    }
    else{
        // 2. Process Signup Form Submission
        if(isset($_POST['submit'])){
            
            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $date = mysqli_real_escape_string($conn, $_POST['date']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // check the confirm password
            if($password !== $confirm_password) {
                echo "<script>alert('Password and Confirm Password do not match!'); window.location.href='signup.php';</script>";
                exit();
            }

            $hashed_password = md5($password);

            // अब यहाँ $fullname मज्जाले म्याच हुन्छ
            $sql = "INSERT INTO sign_up (fullname, email, phone, date, gender, password) 
                    VALUES ('$fullname', '$email', '$phone', '$date', '$gender', '$hashed_password')";
            
            if(mysqli_query($conn, $sql))
            {
                echo "<script>alert('Inserted successfully! Please login.'); window.location.href='login.php';</script>";
                exit();
            }
            else{
                echo "<script>alert('Error: " . mysqli_error($conn) . "'); </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Health Consultation | Sign Up</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .container {
      background: #fff;
      width: 100%;
      max-width: 420px;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.15);
      animation: fadeIn 0.6s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }
    h2 {
      text-align: center;
      margin-bottom: 6px;
      color: #1e293b;
      font-weight: 600;
    }
    .subtitle {
      text-align: center;
      font-size: 14px;
      color: #64748b;
      margin-bottom: 22px;
    }
    label {
      font-size: 13px;
      color: #475569;
      display: block;
      margin-bottom: 4px;
      margin-top: 12px;
    }
    input, select {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      font-size: 14px;
      outline: none;
      transition: 0.3s;
    }
    input:focus, select:focus {
      border-color: #38bdf8;
      box-shadow: 0 0 0 3px rgba(56,189,248,0.2);
    }
    button {
      width: 100%;
      margin-top: 20px;
      padding: 13px;
      background: linear-gradient(135deg, #38bdf8, #2563eb);
      border: none;
      color: #fff;
      font-size: 16px;
      font-weight: 500;
      border-radius: 12px;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(37,99,235,0.35);
    }
    .footer-text {
      text-align: center;
      margin-top: 18px;
      font-size: 14px;
      color: #475569;
    }
    .footer-text a {
      color: #2563eb;
      text-decoration: none;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Create Account</h2>
    <p class="subtitle">Consult certified doctors online anytime, anywhere.</p>

    <form action="signup.php" method="POST">
      <label>Full Name</label>
      <input type="text" name="fullname" placeholder="John Doe" required>

      <label>Email Address</label>
      <input type="email" name="email" placeholder="example@email.com" required>

      <label>Phone Number</label>
      <input type="tel" name="phone" placeholder="98XXXXXXXX" required>

      <label>Date of Birth</label>
      <input type="date" name="date" required>

      <label>Gender</label>
      <select name="gender" required>
        <option value="">Select gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <label>Password</label>
      <input type="password" name="password" placeholder="••••••••" required>

      <label>Confirm Password</label>
      <input type="password" name="confirm_password" placeholder="••••••••" required>

      <button type="submit" name="submit">Create Account</button>
    </form>

    <div class="footer-text">
      Already have an account? <a href="login.php">Login</a>
    </div>
  </div>
</body>
</html>