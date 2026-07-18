<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online health consultation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/index.css?v=<?php echo time(); ?>">
</head>
<body>
    
    <header class="nav">
       <div class="navbar">
        <div class="nav-logo">
            <div class="logo"> </div>
        </div>
        <div class="nav-address"> </div>
        <h1 class="title"> ONLINE HEALTH CONSULTATION </h1>
       </div>

       <div class="menu-toggle" onclick="toggleMenu()">
    <i class="fas fa-bars"></i>
</div>

    <div class="menubar" id="menu">
       <a href="index.php"><input type="button" class="border" value="home"></a>
       <a href="online-consult-page.php"><input type="button" class="border" value="Consult Doctor"></a>
       <input type="button" class="border" value="Buy Medicine">
       
       <a href="<?php echo isset($_SESSION['user_id']) ? 'book-appointment.php' : 'login.php?action=book'; ?>" <?php if(!isset($_SESSION['user_id'])) { echo "onclick=\"alert('Please login first!');\""; } ?>>
            <input type="button" class="border" value="Book Appointment">
       </a>
       <a href="ambulance.php"><input type="button" class="border" value="Ambulance"></a>
      
       <div class="search-menu">
        <select class="search-select">
          <option>All</option>
        </select>
        <input placeholder="MY HEALTH CONSULT" class="search-input">
       <button> <div class="search-icon">
        <i class="fa-solid fa-magnifying-glass"></i></div></button>
     </div>
      
    <div class="auth-btns">
        <?php if(isset($_SESSION['user_id'])): ?>
            <span style="color: white; font-weight: bold; margin-right: 10px;">
                Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User'; ?> 👋
            </span>
            <a href="logout.php" class="btn signup-btn" style="background-color: #dc3545;"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn login-btn"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            <a href="signup.php" class="btn signup-btn"> <i class="fa-solid fa-user-plus"></i> Sign Up</a>
        <?php endif; ?>
       </div>
    </header><br><br><br><br><br><br><br><br>
    <div class="consult-text">
<h3 class="consult-head">Online Consultation</h3>
<h4> Having health issues?</h4>
<p>Get instant medical Consultation width professional doctors in few hospitals or clicks.</p>
</div>
<div class="consult-pic"> </div> 


<header class="hero">
        <div class="hero-text">
            <h1>Your Health, Our Priority</h1>
            <p>Consult with top doctors from the comfort of your home. Video consultation, appointments, and medicine delivery.</p>
            
            <div class="search-box">
                <input type="text" placeholder="Search doctor, symptoms, or hospital...">
                <button>Search</button>
            </div>
        </div>
        <div class="hero-image">
            <img src="https://img.freepik.com/free-photo/portrait-successful-mid-adult-doctor-with-crossed-arms_1262-12865.jpg?w=740" alt="Doctor" style="width: 900px;">
        </div>


    </header>

    <h2 class="section-title">Our Services</h2>
    <section class="services-container">
    
         <a href="online-consult-page.php">
        <div class="service-card">
           
            <i class="fas fa-user-md"></i>
            <h3>Doctor Consult</h3>
            <p>Connect with specialists via video call.</p>
        </div></a>
        <div class="service-card">
            <i class="fas fa-pills"></i>
            <h3>Buy Medicine</h3>
            <p>Order medicines and get home delivery.</p>
        </div>
        <a href="book-appointment.php">
        <div class="service-card">
            <i class="fa-solid fa-hospital"></i>
            <h3>Book Appointment </h3>
            <p>Check & View your Appointment.</p>
        </div></a>
       <a href="ambulance.php"> <div class="service-card">
            <i class="fas fa-ambulance"></i>
            <h3>Ambulance</h3>
            <p>24/7 Emergency ambulance service.</p>
        </div></a>
    </section>
 <div class="slider">
            <div class="slides">
                <div class="slide"><img src="../photo/p1.jpg" alt="banner"></div>
                <div class="slide"><img src="../photo/p2.jpg" alt="banner"></div>
                <div class="slide"><img src="../photo/p3.jpg" alt="banner"></div>
                <div class="slide"><img src="../photo/p4.jpg" alt="banner"></div>
                
                <div class="slide"><img src="../photo/p5.jpg" alt="banner"></div>
                <div class="slide"><img src="../photo/p1.jpg" alt="banner"></div>
                <div class="slide"><img src="../photo/p2.jpg" alt="banner"></div>
                
               
            </div>
        </div>
        
  
        <footer class="footer">
    <div class="footer-section">
        <h3>About Us</h3>
        <p>Your trusted platform for health information and online doctor consultation.</p>
    </div>

    <div class="footer-section">
        <h3>Quick Links</h3>
        <a href="#">Home</a>
        <a href="#">Doctors</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </div>

    <div class="footer-section">
        <h3>Contact</h3>
        <p>Email: dsah20911@gmail.com</p>
        <p>Phone: +977-9815800230</p>
    </div>
</footer>

<div class="footer-bottom">
    © 2025 All Rights Reserved.
</div>

    <script>
function toggleMenu(){
    document.getElementById("menu").classList.toggle("active");
}</script>
    </body>
</html>