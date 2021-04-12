<?php  if (count($errors) > 0) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php foreach ($errors as $error) : ?>
            <h3><?php echo $error ?></h3>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>