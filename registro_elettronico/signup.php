<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./form.css">
    <title>Sign Up</title>
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
        <h1>SIGN UP IN OUR WEB SITE</h1>
    </header>
    <main>
        <h1>Sign Up</h1>
        <?php
            if($_GET) {
                echo "<p class='error'>Username già esistente, sceglierne un altro</p>";
            }
        ?>
        <form method="post" action="./signupaction.php">
            <div>
                <label for="name">Name</label>
                <input name="name" type="text" id="name" required>  
            </div>
            <div>
                <label for="surname">Surname</label>
                <input name="surname" type="text" id="surname" required>  
            </div>
            <div>
                <label for="email">Email</label>
                <input name="email" type="email" id="email" placeholder="Insert your email" required>  
            </div>
            <div>
                <label for="username">Username</label>
                <input name="username" type="text" id="username" placeholder="Insert your username" required>  
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" type="password" id="password" placeholder="Insert a password for your account" required>
            </div>
            <div class="show">
                <input type="checkbox" onclick="myFunction()">
                <p>Show password</p>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </main>
    <script src="./show_psw.js"></script>
</body>
</html>