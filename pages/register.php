<?php

if (isset($_POST['envoyer'])) {

   # Extraction de variable $_POST pour acceder directement à la variable
   extract($_POST);

   # Création de la variable erreurs pour enregistrer toute les erreurs commisent par le visiteur
   $errors = [];

   # Traitement
   if (empty($telephone)) {
      $errors['telephone'] = "Le numéro de téléphone est obligatoire";
   } elseif (strlen($telephone) < 9) {
      $errors['telephone'] = "Le numéro est court maxi 9 caractères";
   }

   if (empty($password)) {
      $errors['password'] = "Mot de passe est obligatoire";
   } elseif (strlen($password) < 6) {
      $errors['password'] = "Mot de passe très court maxi 6 caractères";
   }

   # 1 - Si le formulaire n'est pas bien rempli

   # 2 - Enregistrement dans la base de données

   if (count($errors) == 0) {

      # On vérifie si un utilisateur s'est déjà inscrit avec ce numéro de téléphone
      $request = $pdo->prepare("SELECT * FROM user WHERE telephone = :telephone");
      $request->execute(['telephone' => $telephone]);
      $user = $request->fetchAll();

      if ($user == null) {
         # 2 - a Achage du mot de passe
         $passwordHached = password_hash($password, PASSWORD_BCRYPT);
         $request = $pdo->prepare("INSERT INTO user (telephone, password) VALUES (:telephone, :password)");
         $request->execute([
            'telephone' => $telephone,
            'password' => $passwordHached
         ]);

         header('Location: index.php?page=register-success');

      }else {
         $errors['telephone'] = "Ce numéro de téléphone est déjà utiliser pour un autre compte";
      }
   }
}

include('partials/_header.php');

include('vue/register.php');

include('partials/_footer.php');
