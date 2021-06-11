<?php  if (count($errors) > 0) : ?>
    <div class="alert alert-danger border-danger" role="alert">
        <?php foreach ($errors as $error) : ?>
            <h4 style="color: red;"><?php echo $error ?></h4>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>