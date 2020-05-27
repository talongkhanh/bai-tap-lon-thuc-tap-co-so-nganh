<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <style type="text/css" media="screen">
        .footer {
            height: 50px;
            line-height: 50px;
            background: #ccc;
            text-align: center;
        }
    </style>

    <body>
        <?php require('./menu.php');

        $search = $_POST['search'];
        ?>

        <div class="container mt-5">
            <?php
            require('./sql_connect.php');
            if (isset($_POST['search'])) {
                $search = $_POST['searchtxt'];
                $sql_search = "select * from hang where name LIKE '%$search%' ";

                $query_search = mysqli_query($conn, $sql_search);
            }
            ?>
            <?php
            if ($count = mysqli_num_rows($query_search) == 0) {
                ?>
                <div class="alert alert-warning" role="alert">
                    <h3>Không Có Sản Phẩm Nào!</h3>
                </div>
                <?php
            } else {
            ?>
                <div class="container">
                    <div class="row">
                        <?php

                        while ($row_search = mysqli_fetch_assoc($query_search)) {
                        ?>

                            <div class="col-md-3 text-center">
                                <div class="card mb-5">
                                    <img style="width: 100px; height: auto" class="card-img-top mx-auto" src="<?php echo $row_search['image'] ?>" alt="">
                                    <div class="card-body">
                                        <p class="card-title"><?php echo $row_search['name'] ?></p>
                                        <p class="card-text">Giá: <?php echo $row_search['price'] ?> VND</p>
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
            <?php
            }
            ?>
            

        </div>
        <?php
        require('./footer.php');
        ?>
    </body>

</html>