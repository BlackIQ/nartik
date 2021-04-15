<?php

include("../include/data.php");

$sql = "SELECT * FROM report WHERE person = '$id' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
    <table class="table table-hover table-responsive table-bordered">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr title="<?php echo $row["answer"]; ?>" data-toggle="tooltip" data-placement="right">
                    <th scope="row"><?php echo $row['code']; ?></th>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row["dt"]; ?></td>
                    <td class="text-danger">
                        <?php
                            if ($row['answer'] == 'no') {
                                echo '<span class="text-danger">No Answer</span>';
                            }
                            else {
                                $answer = $row['answer'];
                                echo '<span class="text-success">'.$answer.'</span>';
                            }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
}
else {
    echo "<h1>You have no tickets yet.</h1>";
}
?>