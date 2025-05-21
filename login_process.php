<?php
session_start();
header('Content-Type: application/json');

include 'db.php'; // your database connection file

// Validate POST
if (!isset($_POST['login_email'], $_POST['login_password'])) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
    exit;
}

$email = $_POST['login_email'];
$password = $_POST['login_password'];

// Query for user by email
$stmt = $conn->prepare("SELECT id, user_name, email, password FROM user_reg WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['email'] = $user['email'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid password.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Email not found.']);
}

$stmt->close();
$conn->close();
?>
