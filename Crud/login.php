<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nexus Auth</title>
    <link rel="stylesheet" href="auth-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav-content">
            <div class="logo">
                <div class="logo-circle"></div>
                <h1>Nexus</h1>
            </div>
            <div class="nav-links">
                <a href="Home.html">Home</a>
                <a href="users.html">Community</a>
                <a href="login.html" class="active">Login</a>
                <a href="signup.html" class="auth-button signup">Sign Up</a>
                <a href="#" id="logoutBtn" style="display: none;" class="auth-button logout">Logout</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="auth-container">
            <div class="auth-card">
                <h2>Welcome Back</h2>
                <p class="auth-subtitle">Sign in to your Nexus account</p>
                <form id="loginForm" class="auth-form" method="post" action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" required placeholder="Enter your password" name="password">
                    </div>
                    <button type="submit" class="auth-button primary" name="submit">Sign In</button>
                </form>
                <div class="auth-footer">
                    <p>Don't have an account? <a href="signup.html">Sign up here</a></p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <div class="logo">
                    <div class="logo-circle"></div>
                    <h2>Nexus</h2>
                </div>
                <p>Building the future of authentication, one secure login at a time.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="users.html">Community</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.html">Sign Up</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Services provided</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Nexus Authentication. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php
include "Db_connection.php";
if(isset($_POST['submit'])){
   $email= $_POST['email'];
   $password= $_POST['password'];
   $sql = "SELECT * FROM users Where email='$email'";
   $result = mysqli_query($conn, $sql);
   if($result){
    if($result->num_rows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['passkey'])){
            header("Location: Dashboard.php?id={$row['id']}");
            exit();
        }else{
            echo "<script>alert('Incorrect password')</script>";
        }
    }else{
        echo "<script>alert('Invalid login Credentials')</script>";
    }
   }else{
      die("Query Failed: ". mysqli_error($conn));
   }
}
?>