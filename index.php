<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
        .footer {
            height: 50px;
            line-height: 50px;
            background: #ccc;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require('./menu.php'); ?>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'nhom13');
        $result = mysqli_query($conn, 'select * from hang');
    ?>

<div class="container">
                <div class="row">
                    <?php

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <div class="col-md-3 text-center mb-3">
                            <div class="card mb-5">
                                <img style="height: 150px; width: auto" class="card-img-top mx-auto" src="<?php echo $row['image'] ?>" alt="">
                                <div class="card-body">
                                    <p class="card-title"><?php echo $row['name'] ?></p>
                                    <p class="card-text">Giá: <?php echo $row['price'] ?> $</p>
                                    <button class="btn btn-primary">Mua Hàng</button>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    require('./sql_close.php');
                    ?>
                </div>
            </div>

    <?php require('./footer.php'); ?>
</body>

</html>