<!DOCTYPE html>
<html lang="en">

<head>
    <title>Success Story</title>
    <?php include '../../common/headRef.php'; ?>
    <style>
        .card-img {
            width: 250px;
            margin: auto;
            aspect-ratio: 1;
        }

        body {
            position: relative;
        }

        body::before {
            content: "";
            background-image: url("../../imgs/back5.jpg");
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.2;
            /* Adjust the opacity (0.0 to 1.0) for transparency */
        }
    </style>
</head>

<body>
    <?php include 'navbar.php';
    include_once '../../conn.php';
    $id = $_GET['id'];

    $db = connect();
    $sql = 'SELECT * FROM success_details WHERE success_stories_id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $details = $stmt->fetchAll();

    $sql = 'SELECT * FROM success_stories WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $basic = $stmt->fetch();


    ?>
    <div class="container" style="width:60%; margin:auto; min-height:100vh">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 me-5">
                <?php
                echo "<h4> About " . $basic['name'] . "</h4>";
                echo '<h6><i>' . $basic['job'] . '</i></h6>';
                echo '<img height="200px" width="200px" src="' . $basic['photo'] . '" alt="">';
                ?>
            </div>
            <div class="col">
                <?php
                foreach ($details as $detail) {
                    echo "<div class=my-3>";
                    echo "<h4>" . $detail['heading'] . "</h4>";
                    echo "<p>" . $detail['description'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php include '../../common/footer.php'; ?>
</body>

</html>