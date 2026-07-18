<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // २. Database Connection
    $conn = mysqli_connect("localhost", "root", "", "health_consultation");
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    // ३. Form Submission Handle गर्ने
    if(isset($_POST['submit'])){
        $phone_email = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];

        $hashed_password = md5($password);
        
        $sql = "SELECT * FROM sign_up WHERE (email='$phone_email' OR phone='$phone_email') AND password='$hashed_password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $user = mysqli_fetch_assoc($result);
            
            
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['user_name'] = $user['fullname']; 
            
            

            
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                if ($action == 'consult') {
                    header("Location: direct-consult.php");
                    exit();
                } 
                elseif ($action == 'book') {
                    header("Location: book-appointment.php");
                    exit();
                }
            } else {
                header("Location: online-consult-page.php");
                exit();
            }
        }
        else{
            echo "<script>alert('Invalid Email/Phone or Password!'); window.location.href='login.php';</script>";
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Health Consultation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { 
        margin: 0; 
        padding: 0; 
        box-sizing: border-box; 
        font-family: 'Segoe UI', sans-serif; 
    }
        body {
             
        background-color: #f4f7f6; 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        min-height: 100vh; 
    }
        .login-container { 
            background-color: #ffffff; 
            width: 100%; 
            max-width: 400px; 
            padding: 40px; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
            text-align: center; 
        }
        .login-header i { 
            font-size: 50px; 
            color: #007bff; 
            margin-bottom: 15px; 
        }
        .login-header h2 { 
            color: #2c3e50; 
            margin-bottom: 5px; 
            font-size: 24px;
        }
        .login-header p { 
            color: #777; 
            margin-bottom: 30px; 
            font-size: 14px; 
        }
        .form-group { 
            margin-bottom: 20px; 
            text-align: left; 
        }
        .form-group label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 600; 
            color: #333;
        }
        .form-group input { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ccc; 
            border-radius: 6px; 
            font-size: 16px; 
            outline: none; 
        }
        .form-group input:focus { 
            border-color: #007bff; 
        }
        .btn-login { 
            width: 100%; 
            background-color: #007bff; 
            color: white; 
            padding: 12px; 
            border: none; 
            border-radius: 6px; 
            font-size: 17px; 
            font-weight: bold; 
            cursor: pointer; 
            margin-top: 10px; 
        }
        .btn-login:hover { 
            background-color: #0056b3; 
        }
        .footer-links {
             margin-top: 25px; 
             font-size: 14px; 
            }
        .footer-links a { 
            color: #007bff; 
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fa-solid fa-user-md"></i> 
            <h2>Login</h2>
            <p>Access your Account.</p>
        </div>

        <form action="login.php<?php if(isset($_GET['action'])) { echo '?action='.$_GET['action']; } ?>" method="POST">
            <div class="form-group">
                <label for="username">Phone Number or Email</label>
                <input type="text" id="username" name="username" placeholder="Enter Phone or Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-login" name="submit">Login Securely</button>
        </form>   

        <div class="footer-links">
            <p>Don't have an account? <a href="signup.php<?php if(isset($_GET['action'])) { echo '?action='.$_GET['action']; } ?>">Sign Up here</a></p>
        </div>
    </div>
</body>
</html>