<div class="row">
   <div class="col-sm-4 mx-auto py-5 border shadow rounded mt-5">
      <form method="post">
         <legend class="h1 text-center py-4">Inscription</legend>
         <div class="form-floating mb-3">
            <input name="telephone" type="tel" class="form-control" id="floatingInput" placeholder="Numéro de télephone" maxlength="9">
            <label for="floatingInput">Numéro de télephone</label>
         </div>
         <?php if (isset($errors['telephone'])): ?>
            <p class="text-danger"><?= $errors['telephone'] ?></p>
         <?php endif ?>

         <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
         </div>
         <?php if (isset($errors['password'])): ?>
            <p class="text-danger"><?= $errors['password'] ?></p>
         <?php endif ?>

         <button formnovalidate name="envoyer" type="submit" class="btn btn-primary w-100 py-3 mt-3">M'inscrire</button>
      </form>
   </div>
</div>