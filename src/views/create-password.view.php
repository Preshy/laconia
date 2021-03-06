<?php include __DIR__ . '/partials/header.php'; ?>

<?php include __DIR__ . '/partials/page-header.php'; ?>

<section class="content-section">
    <div class="small-container">

        <h1>
            <?= $this->page_title; ?>
        </h1>
        <p>Make sure your password conforms to all proper security standards.</p>

        <?php include __DIR__ . '/partials/message.php'; ?>

        <form id="form-create-password" action="" method="post">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <input type="submit" name="create" value="Create Password">
        </form>

    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>