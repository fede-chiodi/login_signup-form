<?php
    (require("confdb.php")) or die("Unable to connect");
    ini_set('display_errors', 1);
    $data_name = $_POST["name"];
    $data_surname = $_POST["surname"];
    $data_email = $_POST["email"];
    $data_username = $_POST["username"];
    $data_password = $_POST["password"];

    try {
        $db = new PDO("mysql:host=$dbhost; dbname=$dbname;charset=utf8", $dbuser, $dbpw);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch (PDOException $e) {
        die ("Errore di connessione: " . $e->getMessage() );
    }
    $sql = "SELECT * FROM logins WHERE email=:data_email";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':data_email', $data_email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ);
    if($res) {
        header("Location: ./login.php?error=already_registered");
        die();
    }
    $sql = "SELECT * FROM logins WHERE username=:data_username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':data_username', $data_username);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ);
    if($res) {
        header("Location: ./signup.php?error=username_already_exists");
        die();
    }

    $pw_hash = password_hash($data_password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO logins (name, surname, email, username, password) VALUES(:data_name, :data_surname, :data_email, :data_username, :data_password)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':data_name', $data_name);
    $stmt->bindValue(':data_surname', $data_surname);
    $stmt->bindValue(':data_email', $data_email);
    $stmt->bindValue(':data_username', $data_username);
    $stmt->bindValue(':data_password', $pw_hash);
    $stmt->execute();

    header("Location: ./login.php?success=true");
    die();
?>