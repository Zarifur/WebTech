<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    

    try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE Lab5DB";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$dbname = "Lab5DB";

    try {
        $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } catch (PDOException $e) 
    {
        echo $e->getMessage();
    }



  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql2 = "CREATE TABLE TestDB_Table (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($sql2);
  echo "<br>" . "Table TestDB_Table created successfully";
} catch(PDOException $e) {
  echo $sql2 . "<br>" . $e->getMessage();
}


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql3 = "INSERT INTO TestDB_Table (firstname, lastname, email)
  VALUES ('Zarif', 'Amir', 'Zarif@gmail.com')";
  // use exec() because no results are returned
  $conn->exec($sql3);
  echo "<br>" . "New record_1 created successfully";
} catch(PDOException $e) {
  echo  "<br>" . $sql3 . "<br>" . $e->getMessage();
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql4 = "INSERT INTO TestDB_Table (firstname, lastname, email)
  VALUES ('Rakibul', 'Alam', 'Rakibul@gmail.com')";
  // use exec() because no results are returned
  $conn->exec($sql4);
  echo "<br>" . "New record_2 created successfully";
} catch(PDOException $e) {
  echo $sql4 . "<br>" . $e->getMessage();
}



echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM TestDB_Table");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

echo "</table>";





try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql5 = "UPDATE TestDB_Table SET lastname='Amir Sanad' WHERE firstname='Zarif'";

  // Prepare statement
  $stmt = $conn->prepare($sql5);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo "<br>" . $stmt->rowCount() . " records UPDATED successfully";
  } 
  catch(PDOException $e) {
   echo $sql5 . "<br>" . $e->getMessage();
  }


 echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM TestDB_Table");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

echo "</table>";



try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql6 = "DELETE FROM TestDB_Table WHERE firstname='Rakibul'";

  // use exec() because no results are returned
  $conn->exec($sql6);
  echo "<br>" . "Record deleted successfully";
} catch(PDOException $e) {
  echo $sql6 . "<br>" . $e->getMessage();
}

 echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM TestDB_Table");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

echo "</table>";






 // return $conn;

?>
