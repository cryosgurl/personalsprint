<!DOCTYPE html>
<html>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    First name:<br>
    <input type="text" name="firstname" placeholder="john" >
    <br>
    Last name:<br>
    <input type="text" name="lastname" placeholder="doe" >
    <br>
    age:<br>
    <input type="number" name="age" placeholder="10" >
    <br>
    email:<br>
    <input type="email" name="email" placeholder="doe@gmail.com" >
    <br><br>
    <input type="submit" value="Submit">
  </form>
  <button onclick="window.location.href='dbview.php'">See Db</button>
</body>
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


$stmt = $conn->prepare("INSERT INTO person (firstname, lastname, age, email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $firstname, $lastname, $age, $email);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  // set parameters and execute
  $firstname =  test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $age = test_input($_POST["age"]);
  $email = test_input($_POST["email"]);
  $stmt->execute();

  echo "New records created successfully <br>";
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$stmt->close();
$conn->close();


?>
</html>
