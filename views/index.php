<?php require('partials/header.php') ?>
<?php require('partials/nav.php') ?>

    <h1 class="text-center pt-4">Welcome <?= $_SESSION["user"]["email"] ?? "" ?> To The Notes App</h1>
    <div class="d-flex justify-content-center gap-2">
        <?php if($_SESSION["user"] ?? false) : ?>
        <a class="btn btn-success fw-bold" href="/notes">View All Notes</a>
        <a class="btn btn-primary fw-bold" href="/notes/create">Create A Note</a>
        <?php else : ?>
        <h4>You need to login to start using the app!</h4>
        <?php endif ?>
    </div>

<?php require('partials/footer.php') ?>