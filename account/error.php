<?php  if (count($errors) > 0) : ?>
    <div class="alrt">
        <?php foreach ($errors as $error) : ?>
            <h4><?php echo $error ?></h4>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>