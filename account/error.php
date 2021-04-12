<?php  if (count($errors) > 0) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php foreach ($errors as $error) : ?>
            <h4><?php echo $error ?></h4>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>