<?php
session_start();
?>
<?php
include "Db_connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn,$sql);
if($result){
  if($result->num_rows == 1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
  }else{
    echo "<script>alert('User not found');</script>";
  }
}else{
    die("Query Failed: ". mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Nexus Auth</title>
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
                <a href="logout.php" id="logoutBtn" class="auth-button logout">Logout</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="dashboard-section">
            <div class="dashboard-header">
                <h2>Welcome Back, <?php echo $_SESSION['username']; ?></h2>
                <p>Here's what's happening with your account</p>
            </div>
            <div class="dashboard-grid">
                <div class="dashboard-card profile-card">
                    <div class="card-header">
                        <h3>Profile Information</h3>
                        <button class="edit-button">Edit Profile</button>
                    </div>
                    <div class="profile-info">
                        <div class="profile-avatar">
                            <div class="avatar-placeholder"></div>
                        </div>
                        <div class="profile-details">
                            <div class="info-group">
                                <label>Username</label>
                                <p id="username"><?php echo $_SESSION['username']; ?></p>
                            </div>
                            <div class="info-group">
                                <label>Email</label>
                                <p id="email"><?php echo $_SESSION['email']; ?></p>
                            </div>
                            <div class="info-group">
                                <label>Member Since</label>
                                <p id="joinDate">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-card status-card">
                    <div class="card-header">
                        <h3>Account Status</h3>
                    </div>
                    <div class="status-info">
                        <div class="status-item">
                            <span class="status-label">Account Type</span>
                            <span class="status-value">Premium</span>
                        </div>
                        <div class="status-item">
                            <span class="status-label">Last Login</span>
                            <span class="status-value" id="lastLogin">Loading...</span>
                        </div>
                        <div class="status-item">
                            <span class="status-label">Security Level</span>
                            <span class="status-value">Enhanced</span>
                        </div>
                    </div>
                </div>
                <div class="dashboard-card activity-card">
                    <div class="card-header">
                        <h3>Recent Activity</h3>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon login"></div>
                            <div class="activity-details">
                                <p>Successful login</p>
                                <span class="activity-time">Just now</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon profile"></div>
                            <div class="activity-details">
                                <p>Profile updated</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon security"></div>
                            <div class="activity-details">
                                <p>Security settings modified</p>
                                <span class="activity-time">1 day ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Sign Up</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
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
