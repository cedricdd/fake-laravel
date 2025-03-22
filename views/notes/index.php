<?php require(BASE_PATH . '/views/partials/header.php') ?>
<?php require(BASE_PATH . '/views/partials/nav.php') ?>

    <h1 class="text-center py-4">Your Notes</h1>
    <?php
        if(empty($notes)) echo "<h3 class='text-center'>You haven't created any notes yet!</h3>";
        else {
            echo "<ul class='py-4'>" . PHP_EOL;
            foreach($notes as $note) echo "<li><a href='/notes/show?id={$note['id']}'>{$note['body']}</a></li>" . PHP_EOL;
            echo "</ul>" . PHP_EOL;
        }
    ?>

    <div class="d-flex justify-content-center mt-4 gap-2">
        <a class="btn btn-success" href="/">Back To Index</a>
        <a class="btn btn-primary" href="/notes/create">Create A Note</a>
    </div>

<?php require(BASE_PATH . '/views/partials/footer.php') ?>