<!doctype html>
<html lang="en">

<head>
    <title>LearnHub - All-in-One Educational Platform</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <link rel="shortcut icon" href="assets/logo & favicon/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/navabr.css">

    <link rel="stylesheet" href="./css/common-navbar-style.css">

    <link rel="stylesheet" href="./css/footer.css">

    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/venobox/venobox.css" rel="stylesheet">
    <link href="vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">

    <style>
        body {
            width: 100%;
            margin: 0px;
            padding: 0px;
            overflow-x: hidden;
        }

        .solved,
        .unsolved,
        .closed {
            color: #fff;
            font-family: circular;
            border-radius: 20px !important;
        }

        .solved:hover,
        .unsolved:hover,
        .closed:hover {
            color: #fff;
        }

        .solved:hover,
        .closed:hover {
            cursor: context-menu !important;
        }

        .solved {
            background: #21bf73;
        }

        .unsolved {
            background: #ff0000;
        }

        .closed {
            background: #ff7300;
        }

        .ask-doubts:hover {
            color: #fff;
            outline: none;
        }

        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none;
        }

        .mail-link {
            font-family: circular;
            font-weight: bold;
            color: #ff0000;
        }

        .mail-link:hover {
            text-decoration: none;
            color: #ff0000;
        }
    </style>

</head>

<body>

    <header id="header" class="fixed-top">
        <div class="container-fluid d-flex">
            <div class="logo mr-auto">
                <a href="#"><img class="logo-one" src="./assets/logo & favicon/logo.png" alt="logo one" /></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#header">Home</a></li>
                    <li><a href="#hero">About Us</a></li>
                    <li><a href="#schedule">Courses</a></li>
                    <li><a href="project.html">Practice</a></li>
                    <li><a href="#team">Contact Us</a></li>

                    <li class="get-started" style="color: red;">
                        <a href="#contact">Register For Exam</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <h1 class="head text-center">Our Community</h1>

    <div class="jumbotron text-center" style="margin:3% 8%">
        <p class="text-center">
            Ask your doubts here and also help others to solve their problems. Maintain the Community Guidelines.
        </p>
        <a href="question-asker.html" class="btn unsolved">Ask Your Doubts</a>
    </div>

    <?php

    session_start();

    $con = mysqli_connect('localhost', 'root', '', 'learnhub', '3308');
    if ($con == false) {
        echo "Error in database connection!!";
    } else {
        $select = "SELECT * FROM `community`";
        $query = mysqli_query($con, $select);
        echo "<section class='container'>";
        echo "<hr />";
        while ($row = mysqli_fetch_assoc($query)) {

            if ($row["answer"] == "None" && $row["type"] == 'unsolved') {
                echo "<div class='shadow m-3 row aos-init aos-animate' style='padding:3%' data-aos='fade-up' data-aos-delay='100'>";
                echo "<h6 class='text-muted' style='font-family:circular;'><i>" . $row["solved by"] . "</i>";
                echo "<p class='mt-3'> <span><b>Q : </b></span>" . $row["question"] . "</p>";
                $_SESSION["id"] = $row["id"];
                echo "<a href='./answer-keeper.php' class='btn unsolved' id=" . $row['id'] . " onclick='buttonID(this.id);'>Solve This Problem</a>";
                echo "</div>";
                echo "<hr />";
            } else if ($row['type'] == 'closed') {
                echo "<div class='shadow m-3 row aos-init aos-animate' style='padding:3%' data-aos='fade-up' data-aos-delay='100'>";
                echo "<h6 class='text-muted' style='font-family:circular;'><i>" . $row['solved by'] . "</i>";
                echo "<p class='mt-3'> <span><b>Q : </b></span>" . $row['question'] . "</p>";
                echo "<button class='btn closed'>Closed</button>";
                echo "</div>";
                echo "<hr />";
            } else {
                echo "<div class='shadow m-3 row aos-init aos-animate' style='padding:3%' data-aos='fade-up' data-aos-delay='100'>";
                echo "<h6 class='text-muted' style='font-family:circular;'><i>" . $row['solved by'] . "</i>";
                echo "<p class='mt-3'> <span><b>Q : </b></span>" . $row['question'] . "</p>";
                echo "<p class='mt-3'> <span><b>Ans : </b></span>" . $row['answer'] . "</p>";
                echo "<button class='btn solved'>Solved</button>";
                echo "</div>";
                echo "<hr />";
            }
        }
        echo "</section>";
    }

    ?>

    <footer>
        <div class="footer-top" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <div class="row" style="font-family: Circular;">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="./index.html">
                            <img class="logo2" src="./assets/logo & favicon/logo.png" alt="logo two" />
                        </a>
                        <p class="content1" style="text-align: left;">
                            LearnHub which is aimed towards providing a learning ecosystem
                            for technology Career Acceleration
                        </p>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content2">SOCIAL MEDIA</div>
                        <div class="icons">
                            <a class="icon-link" href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a class="icon-link" href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a class="icon-link" href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a class="icon-link" href="" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a><br />
                            <a href="mailto:learnhub@gmail.com" class="mail-link">learnhub@gmail.com</a>
                        </div>
                        <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>

            <div class="footer2" style="font-family: Circular;">
                &copy;2020 <span>LearnHub</span>
                All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="javascript/navbar.js"></script>

    <!-- Vendor JS Files -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/venobox/venobox.min.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="javascript/main.js"></script>


</body>

</html>