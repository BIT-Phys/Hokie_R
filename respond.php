<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Respond to Reservation</title>
  <style>
  body {
    background-color: rgb(150, 150, 150);
  }
  img.logo {
    position: relative;
    height: 100px;
    width: auto;
  }
  .submit {
    background-color: green;
  }
  .approveReservation {
    font-weight: bold;
  }
  </style>
</head>
<body>
  <img src="restaurant_logo.jpg" class="logo"/>
  <form action="insert.php" method="post">
    <p>
      <label for="approveReservation" class="approveReservation">Approve Reservation?</label><br>
      <input type="radio" id="approve" name="approveReservation" value="approve">
      <label for="approve">Approve</label><br>
      <input type="radio" id="cancel" name="approveReservation" value="cancel">
      <label for="cancel">Cancel</label>
    </p>
    <input type="submit" class="submit" value="Submit">
  </form>
  <script>
    //user input
    var currentTime = new Date();
    var responseTime = new Date("05/07/2021");

    //time difference in seconds
    var timeDiff = (responseTime - currentTime)/1000;

    //Number of whole days in the time difference
    var days = Math.floor(timeDiff/(24*60*60));
    timeDiff = timeDiff - days*24*60*60;

    //Number of whole hours in the remaining time difference after accounting for the whole days
    var hours = Math.floor(timeDiff/(60*60));
    timeDiff = timeDiff - hours*60*60;

    //Number of whole minutes in the remaining time difference after accounting for the whole hours
    var minutes = Math.floor(timeDiff/60);

    //generate an output in the html document
    document.writeln("There are " + days + " days " + hours + " hours and " + minutes + " minutes left to respond.");

  </script>
  <?php
  require_once("db.php");

  $sql = "select ReservationID, name, phone, time from reservations";
  $result = $mydb->query($sql);

  echo "<table>";
  echo "<thead>";
  echo "<th>Reservation ID</th><th>Name</th><th>Phone Number</th><th>Time</th>";
  echo "</thead>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row["ReservationID"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["time"]."</td>";
      echo "</tr>";
    }

  ?>
</body>
</html>
