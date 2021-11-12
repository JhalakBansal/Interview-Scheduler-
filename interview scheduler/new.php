<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
           $('#example').DataTable();
      });
    </script>
</head>
<body>
<table id="example">
<tr>
<th>Participant 1 Name</th>
<th>Participant 2 Name</th>
<th>Date</th>
<th>Start time</th>
<th>End time</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "interviewbit");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `user`;";
//$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);

if (!empty($result) && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Participant 1 Name"]. "</td><td>" . $row["Participant 2 Name"]. "</td><td>". $row["Date"] . "</td><td>"
. $row["Start time"]. "</td><td>". $row["End time"]. "</td></tr>";
}
echo "</table>";    
}
else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>