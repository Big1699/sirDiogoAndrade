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
<?php
require './CMS/db/connection.php';
$pdo = pdo_connect_mysql();
?>

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
<?php
    $stmtMe = $pdo->prepare('SELECT * from aboutme');
    $stmtMe->execute();
    
     # definir o fetch mode
    $stmtMe->setFetchMode(PDO::FETCH_ASSOC);
    $dados=$stmtMe->fetch();
?>

<section id="about-me" class="container py-5">
    <div class="row row-cols-1 row-cols-xl-2">
        <div class="col pb-5">
            <div class="image">
                <img src="./img/<?php echo $dados['filename']?>" class="img-fluid" alt="">
            </div> 
        </div>
        <div class="col">
            <h1 class="mb-5">About Me:</h1>
            <p>
                <?php echo $dados['description'] ?>
            </p>
        </div>
    </div>
</section>

<!-- Skills -->
<section id="skills_languages" class="container py-5 my-5">
    <div class="row">
        <div class="col p-5">

            <h3 class="text-center">Skills</h3>
            <?php
            $stmtskills = $pdo->prepare('SELECT * from skillslanguages WHERE type = 0');
            $stmtskills->execute();
    
            # definir o fetch mode
            $stmtskills->setFetchMode(PDO::FETCH_ASSOC);

            while($dadosskills=$stmtskills->fetch()){ ?>
                <div class="mb-5">
                <p class="h6"><?php echo $dadosskills['name']?></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dadosskills['level']?>%"></div>
                </div>
            </div>
            <?php }?>
        </div>

        <div class="col p-5">
            <h3 class="text-center">Languages</h3>
            <?php
            $stmtskills = $pdo->prepare('SELECT * from skillslanguages WHERE type = 1');
            $stmtskills->execute();
    
            # definir o fetch mode
            $stmtskills->setFetchMode(PDO::FETCH_ASSOC);

            while($dadosskills=$stmtskills->fetch()){ ?>
                <div class="mb-5">
                <p class="h6"><?php echo $dadosskills['name']?></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dadosskills['level']?>%"></div>
                </div>
            </div>
            <?php }?>
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
           <?php
                    $stmtprojects = $pdo->prepare('SELECT * from projects');
                    $stmtprojects->execute();
    
                 # definir o fetch mode
                    $stmtprojects->setFetchMode(PDO::FETCH_ASSOC);

                 while($dadosprojects=$stmtprojects->fetch()){ ?>
                       
                <img src="./img/<?php echo $dadosprojects['filename']?>" class="card-img-top" alt="...">
                <div class="card-body">
                
                    <h5 class="card-title"><?php echo $dadosprojects['projectname']?></h5>
                    <p class="card-text"><?php echo $dadosprojects['description']?></p>
                 </div>
                <div class="card-footer text-center">
                <div class="row">
                    <div class="col">
                        <a href="<?php echo $dadosprojects['ref2']?>">
                            <span class="icon"><i class="fa-brands fa-figma center"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo $dadosprojects['ref1']?>">
                            <span class="icon"><i class="fa-brands fa-github"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div><?php }?>
          </div>
        </div>
</section>


<section id="hobbies" class="container px-5 py-3">
    <h1 id="titulo" class="text-center mb-5">Hobbies</h1>

    <?php
            $stmthobbies = $pdo->prepare('SELECT * from hobbies');
            $stmthobbies->execute();
    
            # definir o fetch mode
            $stmthobbies->setFetchMode(PDO::FETCH_ASSOC);

            while($dadoshobbies=$stmthobbies->fetch()){ ?>
                <div class="mb-5">
                    <div class="card-group">
                        <div class="card">
                        <img class="card-img-top" src="./img/<?php echo $dadoshobbies['filename']?>" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $dadoshobbies['description']?></h5>
                        </div>
                        </div>
                    </div>
                 </div>
            <?php }?>
</section>

<section id="contacts_form" class="container card px-5 py-3">
    <h2 class="text-center my-5">Contact Me:</h2>
    <div class="row">
        <div class="col contact">
        <?php
        $stmtcontacts = $pdo->prepare('SELECT * from contacts');
        $stmtcontacts->execute();
    
        # definir o fetch mode
        $stmtcontacts->setFetchMode(PDO::FETCH_ASSOC);
        $dadoscontacts=$stmtcontacts->fetch();
        ?>
            <ul class="h4" style="padding-left: 0;">
                <a href="tel:<?php echo $dadoscontacts['phone'] ?>">
                    <li class="mb-4">
                        <span class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <span class="text"> <?php echo $dadoscontacts['phone'] ?></span>
                    </li>
                </a>
                <a href="mailto:d<?php echo $dadoscontacts['email'] ?>">
                    <li class="mb-4">
                        <span class="icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </span>
                        <span class="text"> <?php echo $dadoscontacts['email'] ?></span>
                    </li>
                </a>
                <a href="<?php echo $dadoscontacts['socialref'] ?>">
                    <li class="mb-4">
                        <span class="icon"><i class="fa-brands fa-linkedin"></i>
                        </span>
                        <span class="text"> <?php echo $dadoscontacts['social'] ?></span>
                    </li>
                </a>
                <a href="">
                    <li class="mb-4">
                        <span class="icon"><i class="fa-sharp fa-solid fa-location-dot"></i>
                        </span>
                        <span class="text"> <?php echo $dadoscontacts['location'] ?></span>
                    </li>
                </a>
               
            </ul>

            <!--Google map-->
        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
            <iframe src="https://maps.google.com/maps?q=<?php echo $dadoscontacts['location'] ?>&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
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
include './CMS/db/connection.php';
$pdo = pdo_connect_mysql();
?>