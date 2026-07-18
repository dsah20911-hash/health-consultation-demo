<?php
$conn = mysqli_connect("localhost","root","","health_consultation");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

if(!isset($_GET['id'])){
    die("Invalid Appointment");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM book_appointments WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){
    die("Appointment Not Found");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Appointment Slip</title>

<style>

body{
    background:#f2f2f2;
    font-family:Arial, Helvetica, sans-serif;
}

.paper{
    width:800px;
    margin:30px auto;
    background:#fff;
    border:2px solid #333;
    padding:30px;
}

.header{
    text-align:center;
    border-bottom:2px solid #0a7;
    padding-bottom:15px;
    margin-bottom:20px;
}

.header h1{
    margin:0;
    color:#0a7;
}

.header p{
    margin:5px;
}

table{
    width:100%;
    border-collapse:collapse;
}

td{
    padding:12px;
    border:1px solid #ccc;
}

.label{
    width:35%;
    font-weight:bold;
    background:#f8f8f8;
}

.btns{
    text-align:center;
    margin-top:25px;
}

button{
    padding:12px 25px;
    border:none;
    color:white;
    cursor:pointer;
    border-radius:5px;
    font-size:16px;
}

.print{
    background:#28a745;
}

.back{
    background:#007bff;
}

@media print{

body{
    background:white;
}

.btns{
    display:none;
}

.paper{
    border:none;
    width:100%;
    margin:0;
}

}

</style>

</head>

<body>

<div class="paper">

<div class="header">
<h1>Health Consultation System</h1>
<p>Appointment Slip</p>
</div>

<table>

<tr>
<td class="label">Appointment ID</td>
<td><?php echo $row['id']; ?></td>
</tr>

<tr>
<td class="label">Patient Name</td>
<td><?php echo $row['patient_name']; ?></td>
</tr>

<tr>
<td class="label">Phone</td>
<td><?php echo $row['phone']; ?></td>
</tr>

<tr>
<td class="label">Age</td>
<td><?php echo $row['age']; ?></td>
</tr>

<tr>
<td class="label">Gender</td>
<td><?php echo $row['gender']; ?></td>
</tr>

<tr>
<td class="label">Department</td>
<td><?php echo $row['department']; ?></td>
</tr>

<tr>
<td class="label">Appointment Date</td>
<td><?php echo $row['appointment_date']; ?></td>
</tr>

<tr>
<td class="label">Appointment Time</td>
<td><?php echo $row['appointment_time']; ?></td>
</tr>

<tr>
<td class="label">Problem</td>
<td><?php echo $row['message']; ?></td>
</tr>

<tr>
<td class="label">Status</td>
<td><?php echo $row['status']; ?></td>
</tr>

</table>

<div class="btns">

<button class="print" onclick="window.print()">
Print Appointment
</button>

<button class="back" onclick="history.back()">
Back
</button>

</div>

</div>

</body>
</html>