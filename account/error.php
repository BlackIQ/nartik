<?php  if (count($errors) > 0) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php foreach ($errors as $error) : ?>
            <h4><?php echo $error ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>