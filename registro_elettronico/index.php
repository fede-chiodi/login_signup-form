<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <h1>BENVENUTO NEL NOSTRO SITO</h1>
        </div>
        <section>
            <?php
                $isloggedin = false;
                if(isset($_SESSION['user'])){
                    $isloggedin = true;
                }
                $user = $_SESSION['user'];
                if(!$isloggedin)
                    echo "<div><a href='./login.php'><button>LOGIN</button></a></div><div><a href='./signup.php'><button>SIGN UP</button></a></div>";
            ?>
        </section>
        
    </header>
    <main>
        <?php
            $isloggedin = false;
            if(!isset($_SESSION['user'])){
                die();
            }
            $user = $_SESSION['user'];
            echo "<h1>Profilo di $user</h1>";
            $isloggedin = true;
        ?>
        <?php
            if($isloggedin)
                echo "<a href='./logout.php'><button>Logout</button></a>";
        ?>
    </main>
</body>
</html>