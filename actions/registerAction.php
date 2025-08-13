<?php
if (isset($_POST['submit'])) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST['lastName']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ) {
        require 'actions/config.php';

        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName  = htmlspecialchars($_POST['lastName']);
        $email     = htmlspecialchars($_POST['email']);
        $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "L'adresse email n'est pas valide.";
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "Cet email est déjà utilisé.";
            } else {
                $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
                if ($stmt->execute()) {
                    header("Location: login.php?success=1");
                    exit;
                } else {
                    $error = "Erreur lors de l'enregistrement.";
                }
            }
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
