<?php

use Classes\Link;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['title'])) {
            $link = new Link($_POST['title']);
            $link->addLink();
        }
    }
?>

<div class="row">
    <div class="col-12">
        <h2>Add New Link</h2>
        </a>
        <hr>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?page=newLinks';?>" method="POST">
            <div class="form-group">
                <label for="title">title</label>
                <input name="title" type="text" placeholder="link title" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Create" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>