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
        <title>Home | ERP Model</title>
        <!-- Latest compiled and minified CSS & JS or JQuery -->
        <link rel="stylesheet" href="./assets/css/base-styles.css">
        <?php include("./core-styles-scripts.html") ?>
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

        <div class="service-container" id="our-services">
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


        <div class="row p-3" id="about-us">
            <div class="col-sx-1"></div>
            <div class="col-xs-10 content pl-4">
                <p style="text-align: justify;"><i>“A computer would deserve to be called intelligent if it could deceive a human into believing that it was
                        human.” ~ Alan Turing</i></p>
                <p style="text-align: justify;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non ab mollitia voluptas deleniti dolorum ipsum distinctio quis deserunt, tempore voluptatum. Labore enim molestias impedit, deleniti quaerat maiores deserunt cum iure.</p>
                <p style="text-align: justify;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non ab mollitia voluptas deleniti dolorum ipsum distinctio quis deserunt, tempore voluptatum. Labore enim molestias impedit, deleniti quaerat maiores deserunt cum iure.</p>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus iste sequi ea in, nam impedit quis reiciendis sed perspiciatis animi fuga voluptate minima cupiditate nisi voluptatem ut culpa accusantium! Sequi in quae fugiat tempore. Deserunt, ut adipisci ipsum quidem ipsam sed ab voluptates, animi dignissimos tempora saepe veniam mollitia corporis?</p>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus iste sequi ea in, nam impedit quis reiciendis sed perspiciatis animi fuga voluptate minima cupiditate nisi voluptatem ut culpa accusantium! Sequi in quae fugiat tempore. Deserunt, ut adipisci ipsum quidem ipsam sed ab voluptates, animi dignissimos tempora saepe veniam mollitia corporis?</p>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus iste sequi ea in, nam impedit quis reiciendis sed perspiciatis animi fuga voluptate minima cupiditate nisi voluptatem ut culpa accusantium! Sequi in quae fugiat tempore. Deserunt, ut adipisci ipsum quidem ipsam sed ab voluptates, animi dignissimos tempora saepe veniam mollitia corporis?</p>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, maiores rem magnam sint quibusdam fugit labore quod error, ipsa beatae atque minus consequatur. Ipsam pariatur recusandae vero suscipit totam, sapiente impedit ut ex necessitatibus harum labore debitis non dolores nobis nulla tempora exercitationem minus, illo distinctio? Vitae suscipit expedita quas?</p>
                <p><b>Mr. Swaraj Kumar Chaudhary<br>Head of Organization<br>swarajkumarchaudhary1729@gmail.com</b></p>

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