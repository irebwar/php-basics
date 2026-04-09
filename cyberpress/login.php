<?php require_once 'includes/header.php'; ?>

<div class="row justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow border-0 rounded-3">
            <div class="card-header bg-dark text-white text-center py-3">
                <h4 class="mb-0"><i class="bi bi-person-lock"></i>چوونەژورەوە</h4>
                <?php if (isset($_SESSION['error'])) :?>
                    <div class="alert alert-danger text-center" role="alert">
                        <i class="bi bi-exclamation-triangle"></i>
                        <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-body p-4">
                <form action="login_process.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">ناوی بەکارهێنەر</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">تێپەڕەوشە</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">چوونەژورەوە</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>