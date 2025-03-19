<?php require(BASE_PATH . '/views/partials/header.php') ?>

    <h1 class="text-center pt-4">Your Note</h1>
    <div>
        <?= $note["body"] ?>
    </div>
    <div class="d-flex justify-content-center gap-1 mt-5">   
        <a href="/notes" class="btn btn-primary fw-bold">All Your Notes</a>
        <a href="/notes/edit?id=<?= $note["id"] ?>" class="btn btn-warning fw-bold">Edit This Note</a>
        <form action="/notes" method="POST">
            <input type="hidden" name="_method" value="DELETE" />
            <input type="hidden" name="id" value="<?= $note["id"] ?>" />
            <button type="submit" class="btn btn-danger fw-bold">Delete This Note</button>
        </form>
    </div>

<?php require(BASE_PATH . '/views/partials/footer.php') ?>