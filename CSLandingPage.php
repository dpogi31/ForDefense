<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "chronosync";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$register_message = '';
$login_message = '';

if (isset($_POST['registerSubmit'])) {
    $username = trim($_POST['signup_username']);
    $email = trim($_POST['signup_email']);
    $password = $_POST['signup_password'];
    $confirm_password = $_POST['signup_confirm_password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    if ($password !== $confirm_password) {
        $register_message = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $register_message = "Email already registered.";
        } else {
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, gender, age) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $username, $email, $hashed_password, $gender, $age);
            if ($stmt->execute()) {
                $register_message = "Registration successful! You can now log in.";
            } else {
                $register_message = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}

if (isset($_POST['loginSubmit'])) {
    $username = trim($_POST['login_username']);
    $password = $_POST['login_password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user'] = $username;
            header("Location: CSHomePage.php");
            exit;
        } else {
            $login_message = "Invalid password.";
        }
    } else {
        $login_message = "Username not found.";
    }

    $stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600&family=Raleway:wght@400;500;600&family=Roboto:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="CS.css">
</head>

<body>
    <div class="landing-container">
        <img src="assets/images/logo1.png" alt="logo" class="landing-logo">
        <h1>Welcome to <span class="brand" style="font-size: 5rem;">Chrono Sync</span></h1>
        <p>Redefining every second with smart innovation.</p>
        <a href="#" class="landing-page-btn" id="loginBtn">Get Started</a>
    </div>

    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>

            <div class="form-toggle">
                <button id="loginToggle" class="active">Login</button>
                <button id="signupToggle">Sign Up</button>
            </div>

            <form id="loginForm" class="form" method="POST" action="">
                <h2>Login</h2>
                <?php if ($login_message): ?>
                    <p class="message"><?= htmlspecialchars($login_message) ?></p>
                <?php endif; ?>
                <input type="text" name="login_username" id="login_username" placeholder="Username" required />
                <input type="password" name="login_password" id="login_password" placeholder="Password" required />


                <input type="checkbox" id="myCheckbox">
                <label for="myCheckbox">Save this Info?</label>

                <div class="google-login">
                    <p>or</p>
                    <a href="https://accounts.google.com/..." target="_blank" class="google-btn">
                        <img src="assets/images/GG.png" alt="Google icon">
                        Sign in with Google
                    </a>
                </div>

                <button type="submit" name="loginSubmit">Login</button>
            </form>

            <form id="signupForm" class="form hidden" method="POST" action="">
                <h2>Sign Up</h2>
                <?php if ($register_message): ?>
                    <p class="message"><?= htmlspecialchars($register_message) ?></p>
                <?php endif; ?>
                <input type="text" name="signup_username" placeholder="Username" required />
                <input type="email" name="signup_email" placeholder="Email" required />
                <input type="password" name="signup_password" placeholder="Password" required />
                <input type="password" name="signup_confirm_password" placeholder="Confirm Password" required />

                <label>Gender:</label>
                <div class="gender-options">
                    <input type="radio" name="gender" value="male" required> Male
                    <input type="radio" name="gender" value="female" required> Female
                </div>
                <div class="form-container">
                    <label for="age">Age:</label>
                    <select class="Age" name="age" id="age" required>
                        <option value="under_18">Under 18</option>
                        <option value="18-25">18–30</option>
                        <option value="26-35">30–35</option>
                        <option value="36-50">36–50</option>
                        <option value="above_50">50 and Above</option>
                    </select>
                </div>

                <button type="submit" name="registerSubmit">Sign Up</button>
            </form>

        </div>
    </div>

    <footer class="footer-landing">
        <div class="footer-content">
            <h2>Chrono Sync</h2>
            <p>Stay in sync with your health, your style, and your time. Only at Chrono Sync.</p>
            <div class="footer-icons">
                <a href="https://www.facebook.com/" aria-label="Facebook" target="_blank"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/" aria-label="Instagram" target="_blank"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/" aria-label="Tiktok" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.youtube.com/" aria-label="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.linkedin.com/" aria-label="Linkedin" target="_blank"><i
                        class="fab fa-linkedin-in"></i></a>

            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 ChronoSync. All rights reserved.</p>
        </div>
    </footer>
    <script src="CS.js"></script>
</body>

</html>