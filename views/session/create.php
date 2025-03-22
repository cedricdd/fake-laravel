<?php require(BASE_PATH . '/views/partials/header.php') ?>
<?php require(BASE_PATH . '/views/partials/nav.php') ?>

    <h1 class="text-center mt-4 pt-4"><?= $title ?></h1>
    <form method="POST" accept-charset="UTF-8">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="<?= $_POST["email"] ?? "" ?>">
            <?php if(isset($errors["email"])) echo "<div class='text-danger mt-2'>" . $errors["email"] . "</div>" ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <?php if(isset($errors["password"])) echo "<div class='text-danger mt-2'>" . $errors["password"] . "</div>" ?>
        </div>
        <button type="submit" class="btn btn-primary">Log In</button>
    </form>

<?php require(BASE_PATH . '/views/partials/footer.php') ?>