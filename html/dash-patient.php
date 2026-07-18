
<?php
$conn = mysqli_connect("localhost","root","","health_consultation");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

$sql = "SELECT * FROM book_appointments ORDER BY id DESC";
$result = mysqli_query($conn,$sql);


// Approve Appointment
if(isset($_GET['approve'])){
    $id = intval($_GET['approve']);
    mysqli_query($conn,"UPDATE book_appointments
    SET status='Approved'
    WHERE id='$id'");
    header("Location: dash-patient.php");
    exit();
}

// Reject Appointment
if(isset($_GET['reject'])){
    $id = intval($_GET['reject']);
    mysqli_query($conn, "UPDATE book_appointments SET status='Rejected' WHERE id='$id'");
    header("Location: dash-patient.php"); 
    exit();
}
// Delete Appointment
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn,"DELETE FROM book_appointments
    WHERE id='$id'");
    header("Location: dash-patient.php");
    exit();
}
//total patient
$total = mysqli_num_rows($result);

$pending = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM book_appointments WHERE status='Pending'"));

$approved = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM book_appointments WHERE status='Approved'"));

$rejected = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM book_appointments WHERE status='Rejected'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../css/dash-patient.css">

</head>
<body>

<div class="container">
    <h2>Manage Appointments</h2>
    <!-- Dashboard Cards -->
    <div class="cards">

        <div class="card total">
            <i class="fa-solid fa-calendar-check"></i>
            <h3 id="total"><h3><?php echo $total; ?></h3></h3>
            <p>Total</p>
        </div>

        <div class="card pending">
            <i class="fa-solid fa-clock"></i>
            <h3 id="pending"><h3><?php echo $pending; ?></h3></h3>
            <p>Pending</p>
        </div>

        <div class="card approved">
            <i class="fa-solid fa-circle-check"></i>
            <h3 id="approved"><h3><?php echo $approved; ?></h3></h3>
            <p>Approved</p>
        </div>

        <div class="card rejected">
            <i class="fa-solid fa-circle-xmark"></i>
            <h3 id="rejected"><h3><?php echo $rejected; ?></h3></h3>
            <p>Rejected</p>
        </div>

    </div>

    <!-- Search -->
    <div class="search-box">
        <input type="text"
        id="search"
        placeholder="Search Patient Name">
        <select id="statusFilter">
            <option value="">All Status</option>
            <option>Pending</option>
            <option>Approved</option>
            <option>Rejected</option>
        </select>
    </div>

    <!-- Appointment Table -->
    <div class="table-responsive">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="appointmentTable">
            <tbody id="appointmentTable">

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['patient_name']; ?></td>

    <td><?php echo $row['phone']; ?></td>

    <td><?php echo $row['age']; ?></td>

    <td><?php echo $row['gender']; ?></td>

    <td><?php echo $row['department']; ?></td>

    <td><?php echo $row['appointment_date']; ?></td>

    <td><?php echo $row['appointment_time']; ?></td>

    <td>
<span class="status <?php echo strtolower($row['status']); ?>">
<?php echo $row['status']; ?>
</span>
</td>
    
     <td>
<a href="view-appointment.php?id=<?php echo $row['id']; ?>">
    <button class="action-btn view">
        View
    </button>
</a>

<a href="?approve=<?php echo $row['id']; ?>">
<button class="action-btn approve">
Approve
</button>
</a>

<a href="?reject=<?php echo $row['id']; ?>">
<button class="action-btn reject">
Reject
</button>
</a>

<a href="?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this appointment?')">

<button class="action-btn delete">
Delete
</button>

</a>

</td>

    </td>

</tr>

<?php } ?>

</tbody>
        </tbody>
    </table>
    </div>
</div>

<!-- View Modal -->
<div id="viewModal" class="modal">
<div class="modal-content">
<span class="close">&times;</span>
<h2>Appointment Details</h2>
<p><b>ID :</b> <span id="v_id"></span></p>
<p><b>Patient :</b> <span id="v_name"></span></p>
<p><b>Phone :</b> <span id="v_phone"></span></p>
<p><b>Age :</b> <span id="v_age"></span></p>
<p><b>Gender :</b> <span id="v_gender"></span></p>
<p><b>Department :</b> <span id="v_department"></span></p>
<p><b>Date :</b> <span id="v_date"></span></p>
<p><b>Time :</b> <span id="v_time"></span></p>
<p><b>Problem :</b> <span id="v_problem"></span></p>
<p><b>Status :</b> <span id="v_status"></span></p>
</div>
</div>

<script>
document.getElementById("search").addEventListener("keyup", function () {

    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#appointmentTable tr");

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        if(text.includes(value)){
            row.style.display = "";
        }else{
            row.style.display = "none";
        }
    });
});

document.getElementById("statusFilter").addEventListener("change", function () {

    let status = this.value.toLowerCase();
    let rows = document.querySelectorAll("#appointmentTable tr");

    rows.forEach(function(row){

        let rowStatus = row.cells[8].innerText.toLowerCase();

        if(status === "" || rowStatus === status){
            row.style.display = "";
        }else{
            row.style.display = "none";
        }

    });

});


function deleteAppointment(url){
    Swal.fire({
        title:'Are you sure?',
        text:'This appointment will be deleted.',
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'Delete'
    }).then((result)=>{
        if(result.isConfirmed){
            window.location.href=url;
        }
    });
}

function viewAppointment(id, name, phone, age, gender, department, date, time, problem, status){

    document.getElementById("v_id").innerHTML = id;
    document.getElementById("v_name").innerHTML = name;
    document.getElementById("v_phone").innerHTML = phone;
    document.getElementById("v_age").innerHTML = age;
    document.getElementById("v_gender").innerHTML = gender;
    document.getElementById("v_department").innerHTML = department;
    document.getElementById("v_date").innerHTML = date;
    document.getElementById("v_time").innerHTML = time;
    document.getElementById("v_problem").innerHTML = problem;
    document.getElementById("v_status").innerHTML = status;

    document.getElementById("viewModal").style.display = "block";
}

// Modal Close
let modal = document.getElementById("viewModal");
let closeBtn = document.querySelector(".close");

closeBtn.onclick = function () {
    modal.style.display = "none";
}

window.onclick = function(event){
    if(event.target == modal){
        modal.style.display = "none";
    }
}
</script>
</body>
</html>