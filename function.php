<?php
function validerMotDePasse($motDePasse) {
    // Vérifier la longueur du mot de passe
    if (strlen($motDePasse) <= 6 || strlen($motDePasse) >= 10) {
        return "Erreur : Le mot de passe doit avoir plus de 6 et moins de 10 caractères.";
    }
    
    // Le sel statique
    $salt = "ABC1234@";
    
    // Concaténer le sel avec le mot de passe
    $motDePasseConcatene = $motDePasse . $salt;
    
    // Chiffrer le mot de passe concaténé
    $motDePasseChiffre = password_hash($motDePasseConcatene, PASSWORD_DEFAULT);
    
    // Tester le mot de passe chiffré
    $motDePasseSaisi = "motdepass"; 
    
    if (password_verify($motDePasseSaisi . $salt, $motDePasseChiffre)) {
        return "Mot de passe correct ! Salt : $salt, Mot de passe chiffré : $motDePasseChiffre.";
    } else {
        return "Mot de passe incorrect. Essayez avec un autre mot de passe.";
    }
}

// Test de la fonction
$motDePasseTest = "motdepass"; 
$resultat = validerMotDePasse($motDePasseTest);
echo $resultat;
?>
