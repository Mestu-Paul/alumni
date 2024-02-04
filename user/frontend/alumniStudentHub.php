<!DOCTYPE html>
<html lang="en">

<head>
    <title>Success Story</title>
    <?php include '../../common/headRef.php'; ?>
    <style>
        .card1{
            height: 200px;
            border-radius: 10px;
            cursor: pointer;
        }
        .card1 .card1-title{
            height: 50%;
            background-color: #0069ff;
            border-radius: 10px 10px 0px 0px;
            box-shadow: 0px 4px 10px 1px #0069ff;
            padding: 10px;
            font-size: 18px;
            color: white;
            font-weight: 900;
        }
        .card1 .card1-footer{
            height: 50%;
            background-color: #f1f1f1;
            border-radius: 0px 0px 10px 10px;
            box-shadow: 0px 4px 10px 1px gray;
            padding: 10px;
            font-size: 16px;
            color: black;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php';
    $titleList = ["Academic Report / Transcript Request",
     "Application for a Discontinuation Assessment ",
     "Application for a Special Assessment",
     "Application for Graduation confirmation or Syllabus Request",
     "Request for Certificate Reprint ",
     "Request for Uncollected Certificates"
    ];
    $descriptionList = ["Click here for an academic transcript or academic record ",
    "Click here if you would like to apply for a Discontinuation Assessment",
    "Click here you would like to apply for a Special Assessment",
    "Click here if you would like to apply for qualification verification or request your syllabus",
    "Click here if you would like to request a certificate reprint",
    "Click here if you would like to request an uncollected certificate"
    ];
    ?>
    <div class="container" style="min-height:100vh">
        <div class="headLine" style="color:#0069ff;">
            ALUMNI/ FORMER STUDENT QUERIES
        </div>
        <div class="row">
            <?php 
            for($i=0; $i<count($titleList); $i++){
                echo '
                <div class="col-3  mb-3 card1">
                <a href="studentQueryForm.php?id='.$i.'">
                <div class="card1-title">
                '.$titleList[$i].'
                </div>
                <div class="card1-footer">
                '.$descriptionList[$i].'
                </div>
                </a>
            </div>';
            }
            ?>
            
        </div>
    </div>
    <?php include '../../common/footer.php'; ?>
</body>

</html>