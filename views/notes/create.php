<?php require(BASE_PATH . '/views/partials/header.php') ?>

    <h1 class="text-center pt-4">Create A New Note</h1>
    <form action="/notes" method="POST" accept-charset="UTF-8" class="px-5">
        <textarea class="form-control" id="body" name="body" rows="6" placeholder="Enter Your Note Here (Max 1000 Characters)"><?= $_POST["body"] ?? "" ?></textarea>
        <?php if(isset($errors['body'])) echo "<span class='text-danger'>{$errors['body']}</span>" ?>
        <div class="d-flex justify-content-center mt-2 gap-1">
            <a href="/notes" class="btn btn-success fw-bold">Cancel Creation</a>
            <button type="submit" class="btn btn-primary fw-bold">Add Note</button>
        </div>
    </form>

<?php require(BASE_PATH . '/views/partials/footer.php') ?>