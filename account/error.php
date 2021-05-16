<?php  if (count($errors) > 0) : ?>
    <div class="alrt">
        <?php foreach ($errors as $error) : ?>
            <h5><?php echo $error ?></h5>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>