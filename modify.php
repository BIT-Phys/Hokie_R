<!doctype html>
<html>
<title>Modify Reservation</title>
<style>
body {
  background-color: rgb(150, 150, 150);
}
img.logo {
  position: relative;
  height: 100px;
  width: auto;
}
#modify {
  color: green;
}
#cancel {
  color: green;
}
</style>
<body>
  <img src="restaurant_logo.jpg" class="logo"/>
  <h1>Need to change the reservation?</h1>
  <ul>
    <li>
      <a href="modify.php#modify">Modify</a>
    </li>
    <li>
      <a href="modify.php#cancel">Cancel</a>
    </li>
  </ul>
  <h2 id="modify">Modify</h2>
    <p>If you need to modify the reservation, do so <a href="modifyReservation.php">here</a>.</p>
  <h2 id="cancel">Cancel</h2>
    <p>If you are no longer able to keep the reservation, cancel it <a href="cancelReservation.php">here</a>.</p>
</body>
</html>
