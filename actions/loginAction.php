<?php 

if (isset($_SESSION['user_Id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT Id, firstname, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($Id, $firstName, $password_hash);
        $stmt->fetch();

        if (password_verify($password, $password_hash)) {
            $_SESSION['user_Id'] = $Id;
            $_SESSION['user_firstName'] = $firstName;
            header("Location: dashboard.php");
            exit();
        }
    }

    $error = "Identifiants invalides.";
}
?>