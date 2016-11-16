<!DOCTYPE html>
<html>
<body>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "personal";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }



  $sql = "SELECT id, firstname, lastname, age, email FROM person";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - age: " . $row["age"]. " - email: " . $row["email"]. "<br>";
      }
  } else {
      echo "0 results";
  }

  $conn->close();
?>
</body>
</html>
