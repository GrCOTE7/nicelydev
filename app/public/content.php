<?php

echo '<p>Bonjour ! Je suis PHP de version '. phpversion().'</p>';

//[ ] Nginx + PHP + MySQL dans Docker

$servername = 'mysql';
$username = 'user';
$password = 'password';
$dbname = 'appdb';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<hr>";

    $sql = 'CREATE TABLE IF NOT EXISTS example_table (
  
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
  
  )';

    $conn->exec($sql);

    $sql = "INSERT INTO example_table (firstname, lastname) VALUES
   ('John', 'DOE')";
    $conn->exec($sql);

    $sql = "SELECT * FROM example_table";
    $req = $conn->query($sql);
    $res = $req->fetchAll(PDO::FETCH_ASSOC);
    echo '<PRE>';
    var_dump($res);
    echo '</PRE>';

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<hr>
<p>(En direct, CLI: php -S "localhost:80")</p>
