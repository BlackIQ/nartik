<?php  if (count($errors) > 0) : ?>
    <script>
        window.alert(
            <?php foreach ($errors as $error) : ?>
                <?php echo $error ?>
            <?php endforeach ?>
        );
    </script>
<?php  endif ?>