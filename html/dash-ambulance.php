 <?php
$conn = mysqli_connect("localhost","root","","health_consultation");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

// Status change
if(isset($_GET['status_id'])){

    $id = $_GET['status_id'];

    $result = mysqli_query($conn,"SELECT status FROM add_ambulance WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);

    if($row['status']=="Active"){
        $newStatus = "Inactive";
    }else{
        $newStatus = "Active";
    }

    mysqli_query($conn,"UPDATE add_ambulance SET status='$newStatus' WHERE id='$id'");

    header("Location: dash-ambulance.php");
    exit();
}

$sql = "SELECT * FROM add_ambulance";
$result = mysqli_query($conn, $sql);


?>
 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Ambulance</title>
<link rel="stylesheet" href="../css/dash-ambulance.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
</head>
<body>

<div class="container">

    <div class="header">
        <h2><i class="fa-solid fa-user-doctor"></i> Manage Ambulance</h2>
        <div class="top-actions">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search Ambulance..." onkeyup="searchAmbulance()">
            </div>

            <a href="dash-ambulance-add-form.php"><button class="add-btn"><i class="fa-solid fa-plus"></i> Add Ambulance</button></a>
        </div>
    </div>

    <table id="AmbulanceTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Experience</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
       
        <tbody>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['id']; ?></td>

    <td>
        <img src="../upload/<?php echo $row['picture']; ?>" class="ambulance-img">
    </td>

    <td><?php echo $row['name']; ?></td>
     <td><?php echo $row['address']; ?></td>

    <td><?php echo $row['email']; ?></td>

    <td><?php echo $row['phone']; ?></td>
   <td><?php echo $row['experience']; ?></td>
<td>
    <a href="?status_id=<?php echo $row['id']; ?>">
        <?php
        if($row['status'] == "Active"){
            echo "<span class='active'>Active</span>";
        } else {
            echo "<span class='inactive'>Inactive</span>";
        }
        ?>
    </a>
</td>
    <td>
       <a href="edit-ambulance.php?id=<?php echo $row['id']; ?>"> <button class="edit-btn"><i class="fa-solid fa-pen"></i> Edit</button></a>

<a href="delete-ambulance.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this ambulance?')">
    <button class="delete-btn"><i class="fa-solid fa-trash"></i> Delete</button> </a>   
 </td>
</tr>

<?php
}
?>

</tbody>
    </table>
</div>
<script>// ===============================
// Search Doctor
function searchAmbulance() {
    let input = document.getElementById("searchInput").value.toUpperCase();
    let table = document.getElementById("AmbulanceTable");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td");
        let found = false;

        for (let j = 0; j < td.length; j++) {
            if (td[j].textContent.toUpperCase().indexOf(input) > -1) {
                found = true;
                break;
            }
        }

        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
 
// Edit Doctor
// ===============================
let editButtons = document.querySelectorAll(".edit-btn");
editButtons.forEach(function(button){
    button.addEventListener("click", function(){
        alert("Edit Ambulance Feature");
    });
});
// ===============================
// Add Doctor
// ===============================
document.querySelector(".add-btn").addEventListener("click", function(){
    alert("Open Add Ambulance Form");
});</script>
</body>
</html>