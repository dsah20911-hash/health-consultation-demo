<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
<link rel="stylesheet" href="../css/dashbord.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

<!-- Hamburger Menu -->
<div class="menu-toggle" onclick="toggleMenu()">
    <i class="fas fa-bars"></i>
</div>

<!-- Sidebar -->
<div class="sidebar">

    <div class="logo">
        <i class="fas fa-heart-pulse"></i>
        <span>MyHealth</span>
    </div>
    <ul>
        <li><a href="#" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a> </li>
        <li> <a href="#"><i class="fas fa-calendar-alt"></i><span>My Schedule</span></a></li>
        <li><a href="dash-doctor.php"><i class="fa-solid fa-user-doctor"></i><span>Doctor</span></a></li>
        <li><a href="dash-patient.php"><i class="fas fa-users"></i><span>Patients</span></a> </li>
        <li><a href="dash-ambulance.php"><i class="fa-solid fa-ambulance"></i> <span>Ambulance</span></a> </li>
        <li><a href="#"><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
        <li><a href="#"><i class="fas fa-cog"></i><span>Settings</span></a></li>
    </ul>

    <div class="doctor-profile">

        <img src="https://img.freepik.com/free-photo/senior-doctor-with-her-colleagues-hospital_23-2149363065.jpg?w=740"
        alt="Doctor">
        <h4>Dr. Ram Sharma</h4>
        <p>Cardiologist</p>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">

    <div class="topbar">

        <h1>Welcome, Our Hospital</h1>
        <button class="logout-btn"> <i class="fas fa-sign-out-alt"></i> Logout </button>
    </div>

    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
                <div class="card">
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="info">
                <h3>5</h3>
                <p>Today's Appointments</p>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-users-medical"></i>
            </div>
            <div class="info">
                <h3>120</h3>
                <p>Total Patients</p>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="info">
                <h3>3</h3>
                <p>Pending Consultations</p>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="info">
                <h3>4.8</h3>
                <p>Average Rating</p>
            </div>
        </div>
    </div>

    <div class="section-header">
        <h2>Upcoming Appointments</h2>

        <a href="#" class="view-all">
            View All
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <div class="appointment-table-container">

        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>Mr. Hari Prasad</td>
                    <td>10:00 AM</td>
                    <td>2024-03-10</td>
                    <td>Chest Pain</td>

                    <td class="status-confirmed">
                        Confirmed
                    </td>
                    <td>
                        <button class="action-btn">
                            View Details
                        </button>

                        <button class="action-btn" style="background:#28a745;">
                            Start Call
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>Ms. Sanjana Thapa</td>
                    <td>11:30 AM</td>
                    <td>2024-03-10</td>
                    <td>Follow-up</td>
                    <td class="status-pending">
                        Pending
                    </td>

                    <td>
                        <button class="action-btn">  View Details </button>
                        <button class="action-btn">  Reschedule </button>
                    </td>
                </tr>

                <tr>
                    <td>Mr. Kamal Basnet</td>
                    <td>02:00 PM</td>
                    <td>2024-03-10</td>
                    <td>High Blood Pressure</td>

                    <td class="status-confirmed">
                        Confirmed
                    </td>

                    <td>
                        <button class="action-btn"> View Details </button>
                        <button class="action-btn"style="background:#28a745;"> Start Call</button>
                    </td>
                </tr>

                <tr>
                    <td>Mrs. Devi Ghimire</td>
                    <td>04:30 PM</td>
                    <td>2024-03-11</td>
                    <td>General Checkup</td>

                    <td class="status-pending"> Pending </td>

                    <td>
                        <button class="action-btn"> View Details </button>
                        <button class="action-btn"> Reschedule </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
<!-- End Main Content -->

<script>

function toggleMenu() {

    document.querySelector(".sidebar").classList.toggle("active");

}

// Sidebar बन्द गर्न बाहिर click गर्दा

document.addEventListener("click", function(e){

    const sidebar = document.querySelector(".sidebar");
    const menu = document.querySelector(".menu-toggle");

    if(
        !sidebar.contains(e.target) &&
        !menu.contains(e.target)
    ){
        sidebar.classList.remove("active");
    }

});

</script>

</body>
</html>