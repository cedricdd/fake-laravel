<?php require('partials/header.php') ?>

    <h1 class="text-center pt-4">Welcome To The Notes App</h1>
    <div class="d-flex justify-content-center gap-2">
        <?php if($_SESSION["user"] ?? false) : ?>
        <a class="btn btn-success fw-bold" href="/notes">View All Notes</a>
        <a class="btn btn-primary fw-bold" href="/notes/create">Create A Note</a>
        <?php else : ?>
        <a class="btn btn-success fw-bold" href="/register">Register</a>
        <a class="btn btn-primary fw-bold" href="/login">Log In</a>
        <?php endif ?>
    </div>

<?php require('partials/footer.php') ?>