<?php
if (session_status()=== PHP_SESSION_NONE){
session_start();
} 


$conn = mysqli_connect("localhost","root","","health_consultation");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

$sql = "SELECT * FROM add_ambulance";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="../css/ambulence.css?v=<?php echo time(); ?>">
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
    </header><br><br><br><br><br><br>

    
    <div class="header">
        <h1 class="header-text"> Ambulance Services</h1>
    </div><br><br>

        <div class="doctor-img-container">

<?php
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){
?>

<div class="doctor-name">
<img src="../upload/<?php echo $row['picture']; ?>" class="ambulance-img">       

    <dl class="doctor-id">
        <dt><h3><?php echo $row['name']; ?></h3> </dt>
        <dd> <i class="fa-solid fa-phone"></i> Phone No: <?php echo $row['phone']; ?> </dd>
    </dl>
    <a href="tel:<?php echo $row['phone']; ?>">
        <input type="button" class="call" value=" Call Now">
    </a>

</div>

<?php
    }
}else{
    echo "<h3>No Ambulance Available</h3>";
}
?>

</div>
        
        <footer class="footer">
    <div class="footer-section">
        <h3>About Us</h3>
        <p>Your trusted platform for health information and online doctor consultation.</p>
    </div>

    <div class="footer-section">
        <h3>Quick Links</h3>
        <a href="index.php">Home</a>
        <a href="online-consult-page.php">Doctors</a>
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
}
</script>
      
        </body>
  </html>