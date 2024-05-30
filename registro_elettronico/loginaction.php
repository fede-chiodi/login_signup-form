<?php
    session_start();
    (require("confdb.php")) or die("Unable to connect");
    ini_set('display_errors', 1);
    $data_username = $_POST["username"];
    $data_password = $_POST["password"];

    try {
        $db = new PDO("mysql:host=$dbhost; dbname=$dbname;charset=utf8", $dbuser, $dbpw);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch (PDOException $e) {
        die ("Errore di connessione: " . $e->getMessage() );
    }

    $sql = "SELECT * FROM logins WHERE username=:data_username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':data_username', $data_username);
    $stmt->execute();

    $res = $stmt->fetch(PDO::FETCH_OBJ);
    if(password_verify($data_password, $res->password)){
        $_SESSION['user'] = $res->username;
        header("Location: ./index.php?user=$data_username");
        die();
    }
    else{
        header("Location: ./login.php?error=pw_error");
        sessioon_destroy();
        die();
    }
?>