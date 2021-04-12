<?php  if (count($errors) > 0) : ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto text-danger">There is a problem</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
    </div>
<?php  endif ?>