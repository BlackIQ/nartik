<?php  if (count($errors) > 0) : ?>
    <div class="alert alert-danger alert-dismissible fade show mform border-danger">
        <?php foreach ($errors as $error) : ?>
            <h5 style="text-white"><?php echo $error ?></h5>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>