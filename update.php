<?php
require_once("db.php");
if(count($_POST)>0) {
  mysqli_query($conn, "UPDATE reservations set reservationid='" . $_POST['reservationid'] . "', name='" . $_POST['name'] . "', phone='" . $_POST['phone'] . "', time='" . $_POST['time'] . "' WHERE reservationid='" . $_POST['reservationid'] . "'");
  $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT * FROM reservations WHERE reservationid='" . $_GET['reservationid'] . "'");
$row = mysqli_fetch_array($result);
?>
<html>
<head>
  <title>Update Reservation</title>
</head>
<body>
  <form name="frmReserve" method="post" action="">
    <div><?php if(isset($message)) {echo $message;} ?>
    </div>
    <div style="padding-bottom:5px;">
      <a href="modifyReservation.php">Reservation List</a>
    </div>
    Reservation ID: <br>
    <input type="hidden" name="reservationid" class="txtField" value="<?php echo $row['reservationid']; ?>">
    <input type="text" name="reservationid" value="<?php echo $row['reservationid']; ?>">
    <br>
    Name: <br>
    <input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
    <br>
    Phone Number: <br>
    <input type="text" name="phone" class="txtField" value="<?php echo $row['phone']; ?>">
    <br>
    Time: <br>
    <input type="text" name="time" class="txtField" value="<?php echo $row['time']; ?>">
    <br>
    <input type="submit" name="submit" value="Submit" class="button">
  </form>
</body>
</html>
