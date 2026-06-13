<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login & Register</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="auth-body">

    <div class="auth-container">

        <!-- LOGIN -->

        <div class="form-box login-box">

            <form action="login.php" method="POST">

                <h2>Login</h2>

                <div class="input-box">
                    <i class="fa-solid fa-envelope"></i>

                    <input type="email"
                        name="email"
                        placeholder="Email"
                        required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>

                    <input type="password"
                        name="password"
                        placeholder="Password"
                        required>
                </div>

                <button type="submit"
                    name="login"
                    class="auth-btn">

                    Login

                </button>

            </form>

        </div>

        <!-- REGISTER -->

        <div class="form-box register-box">

            <form action="register.php" method="POST">

                <h2>Create Account</h2>

                <div class="input-box">
                    <i class="fa-solid fa-user"></i>

                    <input type="text"
                        name="fullname"
                        placeholder="Full Name"
                        required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-envelope"></i>

                    <input type="email"
                        name="email"
                        placeholder="Email"
                        required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>

                    <input type="password"
                        name="password"
                        placeholder="Password"
                        required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-phone"></i>

                    <input type="tel"
                        name="phone"
                        placeholder="Phone Number"
                        required>
                </div>

                <button type="submit"
                    name="register"
                    class="auth-btn">

                    Register

                </button>

            </form>

        </div>

        <!-- TOGGLE PANEL -->

        <div class="toggle-panel">

            <div class="toggle-content">

                <h1>Welcome to Travel World</h1>

                <p>
                    Explore amazing destinations around the world.
                </p>

                <button id="showRegister"
                    class="toggle-btn">

                    Register

                </button>

                <button id="showLogin"
                 class="toggle-btn"
                 style="display:none;">

                    Login

                </button>

            </div>

        </div>

    </div>

    <script src="script.js"></script>

</body>

</html>