<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "class_data";
$conn = mysqli_connect($host, $user, $pass, $db);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Join Table</title>
</head>

<body>
    <div class="container">
        <div class="col">
            <div class="row">
                <div class=" w-50">
                    <h4>Data Student</h4>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM student");
                    $query->fetch_array();
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Class ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $data) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $data['first_name']; ?></td>
                                    <td><?= $data['last_name']; ?></td>
                                    <td><?= $data['class_id']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="w-50">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM class");
                    $query->fetch_array();
                    ?>
                    <h4>Class</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Class ID</th>
                                <th scope="col">Class Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($query as $data) :
                            ?>
                                <tr>
                                    <th scope="col"><?= $data['class_id']; ?></th>
                                    <th><?= $data['class_name']; ?></th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-50">
                <?php
                $query = mysqli_query($conn, "SELECT first_name, class_name FROM student INNER JOIN class ON student.class_id = class.class_id");
                $query->fetch_array();
                ?>
                <h4>Join Table Student with Class</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Class Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query as $data) :
                        ?>
                            <tr>
                                <th><?= $data['first_name']; ?></th>
                                <td><?= $data['class_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>