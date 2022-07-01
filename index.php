<?php include("./config.php") ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home | ERP</title>
        <!-- Add core styles here -->
        <link rel="stylesheet" href="./assets/css/base-styles.css">
        <!-- Latest compiled and minified CSS & JS or JQuery -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
    <div class="container-fluid text-center">
        <!-- Header -->
        <?php include("./includes/header.php") ?>

        <div class="wrapper mt-4 mb-5">
            <div id="carousel-update" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#carousel-update" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-update" data-slide-to="1"></li>
                    <li data-target="#carousel-update" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/vendor/slideshow-img-1.jpg" alt="Los Angeles">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/vendor/slideshow-img-2.jpg" alt="Chicago">
                        <div class="carousel-caption">
                            <h3>Chicago</h3>
                            <p>Thank you, Chicago!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/vendor/slideshow-img-3.jpg" alt="New York">
                        <div class="carousel-caption">
                            <h3>New York</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-update" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carousel-update" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="announcements">
                <div class="text-center">
                    <p>ANNOUNCEMENTS</p>
                </div>
                <ul id="notice" class="text-center">
                    <?php
                    include("./info/announcements.php");
                    for ($i = 0; $i < sizeof($announcements); $i++) {
                        $title = ucwords($announcements[$i]["title"]);
                        $descr = $announcements[$i]["descr"];
                        $added_on = $announcements[$i]["added_on"];
                        echo "
                            <li class='news-item'>
                                <p class='font-weight-bold'>$title</p>
                                <p>$descr</p>
                            </li>
                            <hr>
                        ";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <br>

        <div class="service-container">
            <h1>Our Services</h1>
            <div class="services">
                <div class="service">
                    <img src="./assets/vendor/slideshow-img-1.jpg" class="img-responsive service-img" alt="">
                    <div class="service-text p-4">
                        <h4>Service Text</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis maiores, vitae quasi magni iusto natus inventore nam ipsam harum saepe dolores autem aut reiciendis nemo nesciunt, accusantium, facere rem ipsum!</p>
                    </div>
                </div>
                <div class="service">
                    <img src="./assets/vendor/slideshow-img-1.jpg" class="img-responsive service-img" alt="">
                    <div class="service-text p-4">
                        <h4>Service Text</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis maiores, vitae quasi magni iusto natus inventore nam ipsam harum saepe dolores autem aut reiciendis nemo nesciunt, accusantium, facere rem ipsum!</p>
                    </div>
                </div>
                <div class="service">
                    <img src="./assets/vendor/slideshow-img-1.jpg" class="img-responsive service-img" alt="">
                    <div class="service-text p-4">
                        <h4>Service Text</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis maiores, vitae quasi magni iusto natus inventore nam ipsam harum saepe dolores autem aut reiciendis nemo nesciunt, accusantium, facere rem ipsum!</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row p-3">
            <div class="col-sx-1"></div>
            <div class="col-xs-10 content pl-4">
                <p style="text-align: justify;"><i>“A computer would deserve to be called intelligent if it could deceive a human into believing that it was
                        human.” ~ Alan Turing</i></p>
                <p style="text-align: justify;">The Department of Computer Science and Engineering (CSE) at National Institute of Technology Sikkim
                    has been functioning since the inception of the Institute in the year 2010. The Department provides an
                    outstanding teaching environment complemented by excellence in research.</p>
                <p style="text-align: justify;">The Department offers four years B. Tech degree, two years M. Tech degree and Ph. D in Computer
                    Science and Engineering. The Department has a comprehensive curriculum on topics related to all aspects
                    of Computer Science with special emphasis on applicability that is provided using latest techniques of
                    engineering. The course structure is up-to-date and includes courses on state-of-the-art curriculum to equip
                    the students and teachers with the latest developments in the field. The Department aspires to develop
                    interdisciplinary and multidisciplinary projects based on the expertise of faculty members.</p>
                <p style="text-align: justify;">The major areas of on-going research in the Department include Artificial Intelligence, Machine
                    Learning, Cryptography, Network Security, Parallel-Distributed and High-Performance Computing,
                    Algorithms, Cloud Computing, Wireless and Sensor Networks, etc. The department and the Institute
                    collectively focus on building research groups and leverage the research activities in Sikkim in particular,
                    and North-East region in general using a coordinated effort of various other organizations working in the
                    field of community development using science and technology. The Department has state-of-the-art
                    infrastructure supported by high-speed Ethernet and wireless network.</p>
                <p style="text-align: justify;">The faculty and students often collaborate on projects, working side-by-side with researchers from other
                    departments across the campus, colleges of North-East region in India and with institutes abroad. In
                    addition to the available excellent environment and quality research opportunities in the Department, there
                    is also a real sense of community and teamwork. The Department enjoys a rich culture of research through
                    various projects under schemes such as Visvesvaraya Ph. D scheme, Research grants from DeitY and DST,
                    National Mission on Himalayan Studies, specific developmental projects for North-East region, etc. The
                    Department also contributes towards community developments through Unnat Bharat Abhiyan and
                    scientific lifestyle development of local community (as per the scheme of the Department of Atomic
                    Energy).</p>
                <p style="text-align: justify;">The Department aims to become worthy in imparting high-quality knowledge and develop research attitude
                    in Computer Science and Engineering domains as well as inter-disciplinary research with a purpose to
                    serve humanity. These serviceable attitudes can be developed by imparting knowledge in cutting edge
                    technologies keeping step with prevalent industrial standards, while at the same time instill societal
                    responsibilities steeped in ethics for all professional activities.</p>
                <p><b>Dr. Pratyay Kuila<br>Head of Computer Science & Engineering Department<br>e-mail: cse_hod@nitsikkim.ac.in</b></p>

                </b>
            </div>
        </div>

        <?php include("./includes/footer.php") ?>
    </div>
    </div>

    </div>
</body>
<script src="./assets/js/base-scripts.js"></script>

</html>