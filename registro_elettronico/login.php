<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./form.css">
    <title>Login</title>
    <style>
        header {
            background-color: rgb(38, 38, 116);
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        header > h1{
            font-size: 40px;
            color: white;
        }

        main > section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .show{
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 0.3rem;
            align-items: center;
        }

        .show > input {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>LOGIN IN OUR WEB SITE</h1>
    </header>
    <main>
        <h1>Login</h1>
        <?php
            if($_GET["error"]){ 
                if($_GET["error"] == 'pw_error'){
                    echo "<p class='error'>Dati inseriti sbagliati</p>";
                }
                else if($_GET["error"] == 'already_registered'){
                    echo "<p class='error'>Sei già registrato, effettua il login !!</p>";
                }
            }
            if($_GET["success"]){
                echo "<p class='success'>Registrazione correttamente effettuato</p>";
            }
        ?>
        <form method="post" action="./loginaction.php">
            <div>
                <label for="username">Username</label>
                <input name="username" type="text" id="username" placeholder="Insert your username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" type="password" id="password" placeholder="Insert your password" required>
            </div>
            <div class="show">
                <input type="checkbox" onclick="myFunction()">
                <p>Show password</p>
            </div>
            <button type="submit">LOGIN</button>
        </form>
        <section>
            <p>Non hai ancora effettuato il login?</p>
            <a href="./signup.php">
                <button>REGISTRATI</button>
            </a>
        </section>
    </main>
    <script src="./show_psw.js"></script>
</body>
</html>