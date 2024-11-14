<?php
// Include the database connection
include('db.php');

// Check if the form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind the query to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Verify the password using password_verify
        if (password_verify($password, $user['password'])) {
            // Password is correct, set cookies and log the user in
            setcookie('user_id', $user['id'], time() + 30 * 24 * 60 * 60, '/', '', false, true);  // 30-day cookie
            setcookie('username', $user['username'], time() + 30 * 24 * 60 * 60, '/', '', false, true);

            // Redirect to a protected page (dashboard)
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

