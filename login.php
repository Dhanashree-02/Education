<?php
session_start();

// Dummy user data for demonstration
$users = [
    'admin' => 'admin123'
];

// Function to authenticate the user
function authenticate($username, $password, $users) {
    return isset($users[$username]) && $users[$username] === $password;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (authenticate($username, $password, $users)) {
        $_SESSION['username'] = $username;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password';
        // Redirect back to the login page with an error (you might want to implement a better error handling mechanism)
        header('Location: index.php');
        exit;
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}
