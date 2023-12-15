
<?php
// $dns = 'mysql:host=localhost;dbname=creationAppartement';
// $login = 'root';
// $password = '';
//$db = new PDO($dns,$login,$password);



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbbanque";

    try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection ok!";
    } catch (PDOException $e) {
    echo "Err: " . $e->getMessage();
    
    }
?>
  