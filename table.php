<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'classes/dbh.class.php';
include 'classes/test.class.php';

$db = new Test();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Email Table</title>
</head>

<body>

    <?php
    if (isset($_GET['deleteBtn'])) {
        $deleteBtn = $_GET['deleteBtn'];
        $db->deleteRecord($deleteBtn);
    }
    ?>
    <div class="myDataTable">
        <form action="" method="post">

            <?php
            $list = $db->getDomainName();
            foreach ($list as $key => $value) {
            ?>
                <button type="submit" name="submit[<?php echo $value; ?>]" style="margin:10px;background:pink;padding:5px 10px;"><?php echo $value; ?></button>

            <?php } ?>

            <br>
            <button type="submit" name="byDate" style="margin:10px; margin-bottom:20px;">Sort By Date</button>
            <button type="submit" name="byEmail" style="margin:10px;">Sort By Email</button>

            <table class="table" id="myTable" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!isset($_POST['submit'])) {
                        $list = $db->getUsers();
                    } else {
                        $selectDomain = array_keys($_POST['submit'])[0];
                        $list = $db->getUsersByDomain($selectDomain);
                    }

                    foreach ($list as $key => $value) {
                    ?>
                        <tr style="height:40px;">
                            <td style="border: 1px solid black; width:150px;text-align:center;"><?php echo $value['date']; ?></td>
                            <td style="border: 1px solid black; width:300px;padding-left:10px;"><?php echo $value['email']; ?></td>
                            <td style="border: 1px solid black;width:80px;text-align:center;"><a href="table.php?deleteBtn=<?php echo $value['id']; ?>" style="color:red; text-decoration: none;">Delete</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </form>
    </div>
</body>

</html>