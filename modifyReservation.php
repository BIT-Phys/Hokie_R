<?php
require_once("db.php");
$conn = mysqli_connect()
$result = mysqli_query($conn,"SELECT * FROM reservations");
?>
<!doctype html>
<html>
<head>
  <title>Retrieve reservation</title>
</head>
<body>
  <?php
  if (mysqli_num_rows($result)>0) {
     ?>
     <table>
       <tr>
         <td>Reservation ID</td>
         <td>Name</td>
         <td>Phone Number</td>
         <td>Time</td>
       </tr>
       <?php
       $i=0;
       while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <td><?php echo $row["ReservationID"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["phone"]; ?></td>
          <td><?php echo $row["time"]; ?></td>
          <td><a href="update.php?id=<?php echo $row["ReservationID"]; ?>">Update</a></td>
        </tr>
        <?php
        $i++;
       }
       ?>
     </table>
     <?php
  }
  else {
    echo "No result found";
  }
?>
</body>
</html>
