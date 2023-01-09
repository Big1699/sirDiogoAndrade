<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- CSS only -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous"
    />
    <!-- FontAwesome CSS (Icons) -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" integrity="sha512-aNH2ILn88yXgp/1dcFPt2/EkSNc03f9HBFX0rqX3Kw37+vjipi1pK3L9W08TZLhMg4Slk810sPLdJlNIjwygFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="btn btn-primary" onclick="setDarkMode()" type="button" id="botao">
            <img src="./img/sun-moon-removebg-preview.png" class="img-fluid" alt="">
        </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-list-ul" id="icon-ul"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#about-me">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#my_experience">My Experience</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#education">My Education</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#hobbies">Hobbies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contacts_form">Contact Me</a>
          </li>
          <?php
            // Se o user já fez login
            if(isset($_SESSION['loggedin'])) { ?>
                <li class="nav-item">
                <a class="nav-link" href="./CMS/pages/home/welcome.php">CMS</a>
              </li>
              <?php } else { ?>
                <li class="nav-item">
                <a class="nav-link" href="./CMS/auth/login.php">Login</a>
              </li>
              <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

<!-- About Me -->
<section id="about-me" class="container py-5">
    <div class="row row-cols-1 row-cols-xl-2">
        <div class="col pb-5">
            <div class="image">
                <img src="./img/fotodiogo.jpg" class="img-fluid" alt="">
            </div> 
        </div>
        <div class="col">
            <h1 class="mb-5">About Me:</h1>
            <p>
                Hello, i'm Diogo Andrade, i'm 23 years old and i'm an Informatic Engineer Student at
                Instituto Politécnico de Viana do Castelo.
            </p>
            <p>Since I was a kid, I always liked Informatics, started playing pc games very early, searching about the
                tech world and started using
                some tech tools at a very young age.</p>
    
            <p>
                I had the oportunity to follow a good part of the thecnology evolution, and that fast evolotuion made me
                want to know more about informatic
                As soon as I entered Highschool, I started my informatics world jorney, as you can see on my Education.
            </p>
            <p>
                Speaking about hobbies, since I was kid, I was a roller hockey goalkeeper and currently I am a
                Coach.
                I had the oportunity to win some titles, including national and european trophies, and being honored
                by the town hall for my team achievments.
                But most importantly, I got values ​​and mates that will accompany me for the rest of my life.
            </p>
        </div>
    </div>
</section>

<!-- Skills -->
<section id="skills_languages" class="container py-5 my-5">
    <div class="row">
        <div class="col p-5">

            <h3 class="text-center">Skills</h3>

            <!-- Progress Bars das Linguagens -->
            <div class="mb-5">
                <p class="h6">HTML</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            </div>
            <div class="mb-5">
                <p class="h6">Java</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            </div>
            <div class="mb-5">
                <p class="h6">C#</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            </div>
            <div class="mb-5">
                <p class="h6">C</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            </div>
            <div class="mb-5">
                <p class="h6">Ionic</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            </div>

        </div>

        <div class="col p-5">
            <h3 class="text-center">Languages</h3>
            <!-- Progress Bars das Linguagens -->
            <div class="mb-5">
                <p class="h6">Portuguese</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>
            <div class="mb-5">
                <p class="h6">English</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            </div>
            <div class="mb-5">
                <p class="h6">Spanish</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                </div>
            </div>
        </div>

    </div>
  
 
</section>

<section id="my_experience" class="container py-5">
    <h1 class="text-center mb-5">My Experience</h1>

    <div class="card p-3 mb-5">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col text-center align-self-center">
                <img src="./img/chip7logo.png" alt="">
            </div>
            <div class="col card-body">
                <h5 class="card-title">Hardware Technician</h5>
                <h6 class="card-subtitle">mar de 2022 - Present</h6>
                <p class="card-text">Chip7 - Half Period</p>
                <p class="card-text">Vila Nova de Famalicão, Braga</p>
            </div>
        </div>
    </div>
    <div class="card p-3 mb-5">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col text-center align-self-center">
                <img src="./img/hcblogo.png" alt="">
            </div>
            <div class="col card-body">
                <h5 class="card-title">Roller Hockey Coach</h5>
                <h6 class="card-subtitle">set de 2021 - Present</h6>
                <p class="card-text">Hoquei Clube de Braga - Half Period</p>
                <p class="card-text">Braga, Portugal</p>
            </div>
        </div>
    </div>
    <div class="card p-3 mb-5">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col text-center align-self-center">
                <img src="./img/ikealogo.png" alt="">
            </div>
            <div class="col card-body">
                <h5 class="card-title">Goods Flow Co-Worker</h5>
                <h6 class="card-subtitle">jun de 2021 - nov de 2021</h6>
                <p class="card-text">IKEA - Half Period</p>
                <p class="card-text">Braga, Portugal</p>
            </div>
        </div>
    </div>
    <div class="card p-3 mb-5">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col text-center align-self-center">
                <img src="./img/lucemlogo.jpg" alt="">
            </div>
            <div class="col card-body">
                <h5 class="card-title">Internship Trainee</h5>
                <h6 class="card-subtitle">fev de 2020 - ago de 2020</h6>
                <p class="card-text">Lucemplast LDA - Trainee</p>
                <p class="card-text">Braga, Portugal</p>
            </div>
        </div>
    </div>
</section>

<section id="education" class="container py-5">
    <h1 class="text-center mb-5">Education</h1>

    <div class="card p-3 mb-5 mt-5">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col text-center align-self-center">
                <img src="./img/ipvclogo.jpg" alt="">
            </div>
            <div class="col card-body">
                <h5 class="card-title">Instituto Politécnico De Viana Do Castelo</h5>
                <h6 class="card-subtitle">2020 - Present</h6>
                <p class="card-text">Bachelor's Degree - Informatic Engineer Student</p>
                <p class="card-text">Viana do Castelo, Braga</p>
            </div>
        </div>
    </div>
    <div class="card p-3 mb-5">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col text-center align-self-center">
                <img src="./img/ipca-logo.jpg" alt="">
            </div>
            <div class="col card-body">
                <h5 class="card-title">Instituto Politécnico De Cávado e Ave</h5>
                <h6 class="card-subtitle">2018 - 2020</h6>
                <p class="card-text">Tesp - Informatic Secutiry and Network</p>
                <p class="card-text">Barcelos, Porgual</p>
            </div>
        </div>
    </div>
    <div class="card p-3 mb-5">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col text-center align-self-center">
                <img src="./img/sa.png" alt="">
            </div>
            <div class="col card-body">
                <h5 class="card-title">Escola Secundária Sá de Miranda</h5>
                <h6 class="card-subtitle">2014 - 2017</h6>
                <p class="card-text">Highschool - Informatic Systems</p>
                <p class="card-text">Braga, Portugal</p>
            </div>
        </div>
    </div>
</section>

<section id="projects" class="container px-5 py-3">
    <h1 id="titulo" class="text-center mb-5">Projects</h1>
    <h3 id="titulo2" class="text-center mb-5">Some of my most important projects</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="./img/ionic.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Travel Agency</h5>
              <p class="card-text">This application was made in ionic, with the goal to simulate a travel agency, where the client can 
                choose a destination, see the prices, chose a hotel and room and finally pay the booking.
                One of the goals was to develop a good looking application and start working more on front end area.
                As i said, the application was made in ionic, but the site prototype was made in figma.
                Check more down bellow.
            </p>
            </div>
            <div class="card-footer text-center">
                <div class="row">
                    <div class="col">
                        <a href="https://www.figma.com/file/mONKcWEIqZqDIakeSi7f7Y/Travel-Agency-Landing-Page-(Community)?node-id=0%3A1">
                            <span class="icon"><i class="fa-brands fa-figma center"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col">
                        <a href="https://github.com/Big1699">
                            <span class="icon"><i class="fa-brands fa-github"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="./img/java.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Order Delevery</h5>
              <p class="card-text">This project is a java application that the goal is to order delevery. The application has 
                a user login, with different options for the differente users, like, order update, existing stock and more.
                Check more down bellow.
              </p>
            </div>
            <div class="card-footer text-center">
                <a href="https://github.com/Big1699">
                    <span class="icon"><i class="fa-brands fa-github"></i>
                    </span>
                </a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card h-100">
              <img src="./img/java.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Sports Venue Rental</h5>
                <p class="card-text">As the name said, this project consists in java application of sports venue rental,
                    where the client can rental different type of sports fields, like tenis, football, roller hockey, and others.
                    The price of the rental changes with the sports and some others conditions that were estipulated.
                    Check more down bellow.
                 </p>
              </div>
              <div class="card-footer text-center">
                    <a href="https://github.com/Big1699">
                        <span class="icon"><i class="fa-brands fa-github"></i>
                        </span>
                    </a>
  
              </div>
            </div>
          </div> <div class="col">
            <div class="card h-100">
              <img src="./img/c_logo.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Financial asset manager</h5>
                <p class="card-text">This project was developed in c#, where that consists in web application that is capable to 
                create, edit and delete financial assets, with differente type of users and their corresponding operations.
                Check more down bellow. </p>
              </div>
              <div class="card-footer text-center">
                <a href="https://github.com/Big1699">
                    <span class="icon"><i class="fa-brands fa-github"></i>
                    </span>
                </a>
              </div>
            </div>
          </div>
      </div>
</section>


<section id="hobbies" class="container px-5 py-3">
    <h1 id="titulo" class="text-center mb-5">Hobbies</h1>
    <div class="card-group">
        <div class="card">
          <img class="card-img-top" src="./img/2.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title text-center">Last Season</h5>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="./img/3.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title text-center">European Club Champion</h5>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="./img/4.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title text-center">National Champion</h5>
          </div>
        </div>
      </div>
</section>

<section id="contacts_form" class="container card px-5 py-3">
    <h2 class="text-center my-5">Contact Me:</h2>
    <div class="row">
        <div class="col contact">
            <ul class="h4" style="padding-left: 0;">
                <a href="tel:912909140">
                    <li class="mb-4">
                        <span class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <span class="text"> 912909140</span>
                    </li>
                </a>
                <a href="mailto:diogoandrade@ipvc.pt">
                    <li class="mb-4">
                        <span class="icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </span>
                        <span class="text"> diogoandrade@ipvc.pt</span>
                    </li>
                </a>
                <a href="https://www.linkedin.com/in/diogo-andrade-0b50401a4/">
                    <li class="mb-4">
                        <span class="icon"><i class="fa-brands fa-linkedin"></i>
                        </span>
                        <span class="text"> Linkedin.com</span>
                    </li>
                </a>
                <a href="">
                    <li class="mb-4">
                        <span class="icon"><i class="fa-sharp fa-solid fa-location-dot"></i>
                        </span>
                        <span class="text"> Braga, Portugal</span>
                    </li>
                </a>
               
            </ul>

            <!--Google map-->
        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
            <iframe src="https://maps.google.com/maps?q=Braga&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0" allowfullscreen></iframe>
        </div>

        </div>
        <div class="col form">
            <form>
                <div class="form-group pb-3">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Name">

                </div>
                <div class="form-group pb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email1" placeholder="Enter Email">
                </div>
                <div class="form-group pb-3">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message1" rows="3" placeholder="Hi Diogo, ..."></textarea>
                </div>
                <div class="form-group button pb-3">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- JavaScript Bundle with Popper -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"
></script>
<script src="darkmode.js"></script>
</body>
</html>


<?php
include 'connect.php';
$pdo = pdo_connect_mysql();
?>