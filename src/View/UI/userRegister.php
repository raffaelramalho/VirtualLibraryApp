<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarium</title>
    <link rel="stylesheet" href="src/View/css/login.css">
    <link rel="stylesheet" href="src/View/css/root.css">
    <link rel="icon" href="assets/book.svg" type="image/svg+xml">
    <script src="https://kit.fontawesome.com/84f133515c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="app">
        <div class="app-form">
            <form action="userLogin.php" method="get">
                    <h1>Librarium</h1>
                <div class="app-form-control">
                    <label for="name">Name:</label>
                    <input type="text" id="name" placeholder="Joseph" required>
                </div>
                <div class="app-form-control">
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="example@email.com" required>
                </div>
                <div class="app-form-control">
                    <label for="birth">Birthday:</label>
                    <input type="date" id="birth" placeholder="" required>
                </div>
                <div class="app-form-control">
                    <label for="password">Password:</label>
                    <input type="password" id="password" required>
                </div>
                <div class="app-form-control">
                    <label for="Cpassword">Confirm Password:</label>
                    <input type="password" id="Cpassword" required>
                </div>
                <div class="app-form-control">
                    <div class="app-form-control-btn">
                        <button>Login</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>