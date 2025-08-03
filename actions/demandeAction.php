<?php
require 'config.php'; 

if (isset($_POST['submit'])) {
    $required = ['nom', 'prenom', 'email', 'demande', 'telephone', 'brend'];
    $missing = array_filter($required, fn($field) => empty($_POST[$field]));

    if ($missing) {
        $message = "Veuillez remplir tous les champs.";
    } else {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $demande = htmlspecialchars(trim($_POST['demande']));
        $telephone = htmlspecialchars(trim($_POST['telephone']));
        $brend = htmlspecialchars(trim($_POST['brend']));
        $brend_lower = strtolower($brend);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "L'adresse email n'est pas valide.";
        } elseif (!preg_match('/^(0[5-7][0-9]{8}|\+213[5-7][0-9]{8}|00213[5-7][0-9]{8})$/', $telephone)) {
    $message = "Le numéro de téléphone algérien est invalide.";
        } else {
            $stmt1 = $conn->prepare("SELECT id FROM demandes WHERE LOWER(brend) = ?");
            $stmt1->bind_param("s", $brend_lower);
            $stmt1->execute();
            $res1 = $stmt1->get_result();

            $stmt2 = $conn->prepare("SELECT id FROM demandes WHERE email = ?");
            $stmt2->bind_param("s", $email);
            $stmt2->execute();
            $res2 = $stmt2->get_result();

            $stmt3 = $conn->prepare("SELECT id FROM demandes WHERE telephone = ?");
            $stmt3->bind_param("s", $telephone);
            $stmt3->execute();
            $res3 = $stmt3->get_result();

            if ($res1->num_rows > 0) {
                $message = "Ce brend existe déjà.";
            } elseif ($res2->num_rows > 0) {
                $message = "Cet email a déjà été utilisé.";
            } elseif ($res3->num_rows > 0) {
                $message = "Ce numéro de téléphone est déjà enregistré.";
            } else {
                $stmt = $conn->prepare("INSERT INTO demandes (nom, prenom, email, demande, telephone, brend) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $nom, $prenom, $email, $demande, $telephone, $brend);
                if ($stmt->execute()) {
                    $message = "Votre demande a bien été envoyée. Merci pour votre confiance.";
                } else {
                    $message = "Erreur lors de l'envoi. Veuillez réessayer.";
                }
                $stmt->close();
            }

            $stmt1->close();
            $stmt2->close();
            $stmt3->close();
        }
    }
}
?>
