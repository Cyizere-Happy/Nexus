<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community - Nexus</title>
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
                <a href="users.html" class="active">Community</a>
                <a href="login.html" id="loginLink" class="auth-button login">Login</a>
                <a href="signup.html" id="signupLink" class="auth-button signup">Sign Up</a>
                <a href="#" id="logoutBtn" style="display: none;" class="auth-button logout">Logout</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="community-section">
            <div class="community-header">
                <h2>Nexus Community</h2>
                <p>Meet our growing community of users</p>
            </div>
            <div class="users-container">
                <div class="users-stats">
                    <div class="stat-card">
                        <h3 id="totalUsers">0</h3>
                        <p>Total Members</p>
                    </div>
                    <div class="stat-card">
                        <h3 id="activeUsers">0</h3>
                        <p>Active Today</p>
                    </div>
                </div>
                <div class="users-table-container">
                    <table id="usersTable" class="users-table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Joined Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="loading-state">
                                    <div class="loading-spinner"></div>
                                    <p>Loading community members...</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="users.html">Community</a></li>
                    <li><a href="login.php">Login</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
    <script src="js/auth.js"></script>
    <script src="js/users.js"></script>
</body>
</html>
