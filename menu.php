<div class="d-flex justify-content-center mb-1 bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php?page=create"><i class="fa-solid fa-square-plus text-success"></i> Create</a>
                    <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=read"><i class="fa-solid fa-book-open text-primary"></i> Read</a>
                    <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=update"><i class="fa-solid fa-pen-to-square text-warning"></i> Update</a>
                    <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=delete"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
                </div>
            </div>
        </div>
    </nav>
</div>