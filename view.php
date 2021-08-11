<!doctype html>
<html>
<head>
  <title>View Reservation Details</title>
  <style>
    body {
      background-color: rgb(150, 150, 150);
    }
    img.logo {
      position: relative;
      height: 100px;
      width: auto;
    }
    table, th, td {
      border: 1px solid black;
    }
    table {
      border-collapse: collapse;
      empty-cells: show;
      display:
    }
    th {
      color: white;
      background-color: green;
    }
    td {
      height: 20px;
      color: white;
      background-color: rgb(129, 129, 129);
    }
  </style>
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    //ajex in Javascript
		var asyncRequest;

    function getAllReservations() {
      //display all products
      var url = "displayReservations.php";
        try {
          asyncRequest = new XMLHttpRequest();

          asyncRequest.onreadystatechange=stateChange;
          asyncRequest.open('GET',url,true);
          asyncRequest.send();
        }
          catch (exception) {alert("Request failed");}
    }

		function stateChange() {
			if(asyncRequest.readyState==4 && asyncRequest.status==200) {
				document.getElementById("contentArea").innerHTML=
					asyncRequest.responseText;
			}
		}

    function clearPage(){
      document.getElementById("contentArea").innerHTML = "";
    }

    function init(){

      var z3 = document.getElementById("reservationLink");
      z3.addEventListener("mouseover", getAllReservations);

      var z4 = document.getElementById("reservationLink");
      z4.addEventListener("mouseout", clearPage);
    }
    document.addEventListener("DOMContentLoaded", init);

    //ajax in jQuery
    $(function(){
      $("#reservationDropDown").change(function(){
        $.ajax({
          url:"displayReservations.php?id=" + $("#reservationDropDown").val(),
          async:true,
          success: function(result){
            $("#contentArea").html(result);
          }
        })
      })
    })
	</script>
</head>
<body>
  <div class="container-fluid">
    <img src="restaurant_logo.jpg" class="logo"/>
    <h2>View Reservations</h2>
  <nav>
    <ul class="nav nav-pills nav-justified">
      <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"
        role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="modify.php">Modify</a></li>
          <li><a href="respond.php">Respond</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <a id="reservationLink" href="">All Reservations</a> <br />
  <label> Choose a Reservation: &nbsp;&nbsp;
    <select name="reservationid" id="reservationDropDown">
      <?php
        require_once("db.php");
        $sql = "select reservationid from reservations order by reservationid";
        $result = $mydb->query($sql);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["reservationid"]."'>".$row["reservationid"]."</option>";
        }
      ?>
    </select>
  </label><br />
  <div id="contentArea">&nbsp;</div>
</div>
</body>
</html>
