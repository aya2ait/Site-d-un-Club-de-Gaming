<?php 

session_start();

	include("connection.php");
	include("functions.php");
    include("funadmin.php");

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>club website</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    /* Custom CSS for the carousel */
    .carousel-caption {
      bottom: 20px; /* Position the caption at the bottom */
      text-align: center; /* Center align the content */
    }

    .carousel-caption .btn {
      background-color: #0d6efd; /* Dark background color for the button */
      border-color: #343a40; /* Dark border color */
    }

    .carousel-caption .btn:hover {
      background-color: #0d6efd; /* Darker background color on hover */
      border-color: #1d2124; /* Darker border color on hover */
    }
  </style>
</head>
<body  class="bg-with-image">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="./site images/logp.png" alt="logo" class="w-80 " width="100" height="100"  >
            FSTT GAMING
            
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mg-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown"> <!-- Ajoutez la classe "dropdown" ici -->
                    <a class="nav-link dropdown-toggle" href="categories.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catégories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> <!--  le menu déroulant  -->
                        <li><a class="dropdown-item" href="categories.html#action">Action</a></li>
                        <li><a class="dropdown-item" href="categories.html#aventure">Aventure</a></li>
                        <li><a class="dropdown-item" href="categories.html#2player">2 Players</a></li>
                        <li><a class="dropdown-item" href="categories.html#sport">Sport</a></li>

                    </ul>
                </li>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="calendrier.php">Calendrier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="test.html">Competitions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Espace Admin</a>
                </li>

                <?php

    
    // Vérifiez si l'utilisateur est connecté et si 'prenom' est défini dans la session
    if(isset($_SESSION['id']) && isset($_SESSION['prenom'])) {
        $username = $_SESSION['prenom'];
        echo '
        <li class="nav-item">
            <a class="nav-link">
                <i class="fas fa-user"></i> ' . $username . '
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn text-white bg-dark px-3 rounded-0" href="logout.php">Logout</a>
        </li>';
    } else {
        echo '<li class="nav-item">
            <a class="nav-link btn text-white bg-dark px-3 rounded-0" href="login.php">Login</a>
        </li>';
    }
?>

                
            
               


              



                
            </ul>
        </div>
    </div>
</nav>



<!--actualites -->
<section class="container" style="margin-top: 150px;">
    
    <h2 class="pt-5" style=" margin-left: 550px;">ACTUALITÉS</h2>


    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
        <div class="col">
            <div class="card border-0 rounded-0">
                <img src="./site images/GAMING EVENT TEMPLATE VIDEO DESIGN - Fait avec PosterMyWall.jpg" class="card-img-top rounded-0" alt="image1">
                <div class="card-body">
                    <p class="card-text text-muted" style="text-align: center;"><strong>Tournois Fourtnite est encore realisé </strong></p>
                    <div class="d-flex justify-content-center mt-2">
                        <p class="mx-4 text-muted card-text"><i class="fa fa-gamepad"></i></i></p>
                        <p class="mx-4 text-muted card-text"><i class="fa fa-trophy"></i></p>                    
                       
                    </div>
                    <div class="d-flex my-1">
                        <a href="voirplus.html#voirplus1" class="btn btn-lg text-white bg-dark px-4 rounded-0">lire plus</a>

                        
                    </div>
                </div> 
            </div>
        </div>


        <div class="col">
            <div class="card border-0 rounded-0">
                <img src="./site images/PUBG Gaming Event flyer template - Fait avec PosterMyWall.jpg" class="card-img-top rounded-0" alt="image1">
                <div class="card-body">
                    <p class="card-text text-muted" style="text-align: center;"><strong>Compétition PUBG amusante!</strong></p>
                    <div class="d-flex justify-content-center mt-3">
                        <p class="mx-4 text-muted card-text"><i class="fa fa-gamepad"></i></i></p>
                        <p class="mx-4 text-muted card-text"><i class="fa fa-trophy"></i></p>                    
                       
                    </div>
                    <div class="d-flex my-1">
                        <a href="voirplus.html#voirplus2" class="btn btn-lg text-white bg-dark px-4 rounded-0">lire plus</a>
                       
                    </div>
                </div> 
            </div>
        </div>



        <div class="col">
            <div class="card border-0 rounded-0">
                <img src="./site images/Untitledjoin us - Fait avec PosterMyWall.jpg" class="card-img-top rounded-0" alt="image1">
                <div class="card-body">
                    <p class="card-text text-muted"style="text-align: center;"><strong>Rejoingnez notre club</strong></p>
                    <div class="d-flex justify-content-center mt-2">
                        <p class="mx-4 text-muted card-text"><i class="fa fa-gamepad"></i></i></p>
                        <p class="mx-4 text-muted card-text"><i class="fa fa-trophy"></i></p>                    
                        
                    </div>
                    <div class="d-flex my-1">
                        <a href="voirplus.html#voirplus3" class="btn btn-lg text-white bg-dark px-4 rounded-0">lire plus</a>
                    
                    </div>
                </div> 
            </div>
        </div>


    </section>

    <!--dark background and logos + quotes--> 
    <section class="bg-dark" style="margin-top: -15%;">
        <div class="container-fluid" style="background-color:rgb(12, 4, 100); height: 70vh; "> <!-- Utilisation de container-fluid pour occuper toute la largeur -->
            <div class="container pt-5"> <!-- Conteneur interne pour le centrage du contenu -->
                <div class="row" style="margin-top: 25%;">
                    <div class="col-lg-8 mb-5" style="margin-left: 250px;">
                        <h2 class="lh-lg" style="font-family: 'Comic Sans MS', cursive, sans-serif;color:rgb(255, 255, 0);">&ldquo;Plongez dans l'univers infini du gaming avec nous!&rdquo;</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
    <!-- Carousel -->
    <h2 class="pt-5" style=" margin-left: 650px;">COMPETITION</h2>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="margin-top: 100px;">
      <div class="carousel-inner">
        <!-- First Slide -->
        <div class="carousel-item active">
          <img src="/site images/carousel.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="my-1">
              <a href="competition.php" class="btn btn-lg text-white">Rejoignez-nous</a>
            </div>
          </div>
        </div>
        <!-- Second Slide -->
        <div class="carousel-item">
          <img src="/site images/carousel2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="my-1">
              <a href="competition.php" class="btn btn-lg text-white">Rejoignez-nous</a>
            </div>
          </div>
        </div>
        <!-- Third Slide -->
        <div class="carousel-item">
          <img src="/site images/TEAM - Fait avec PosterMyWall.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="my-1">
              <a href="competition.php" class="btn btn-lg text-white">Rejoignez-nous</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
<!-- Our services -->

<section class="container" style="margin-top: 150px;">
    <h2 class="pt-5" style="margin-left: 550px;">Services</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
        <div class="col-4">
            <div class="card border-0 rounded-0">
                <img src="./site images/espacce.jpg" class="card-img-top rounded-0" alt="image1">
                <div class="card-body">
                    <p class="card-text text-muted" style="text-align: center;"><strong>Espaces de jeu dédiés</strong></p>
                </div> 
            </div>
        </div>
        <div class="col-4">
            <div class="card border-0 rounded-0">
                <img src="./site images/trophy.jpg" class="card-img-top rounded-0" alt="image1">
                <div class="card-body">
                    <p class="card-text text-muted" style="text-align: center;"><strong>Organisation de tournois et d'événements</strong></p>
                </div> 
            </div>
        </div>
        <div class="col-4">
            <div class="card border-0 rounded-0">
                <img src="./site images/Formations et ateliers.jpg" class="card-img-top rounded-0" alt="image1">
                <div class="card-body">
                    <p class="card-text text-muted"style="text-align: center;"><strong>Formations et ateliers </strong></p>
                </div> 
            </div>
        </div>
    </div>
</section>


<!--notre mission-->
<section class="about section-padding" style="margin-top: 150px;">
    <div class="row align-items-center"> <!-- Utilisation de la classe align-items-center pour aligner verticalement le contenu -->
        <div class="col-lg-5 col-md-12 col-12">
            <div class="mission-container">
                <h2 class="mission-title">MISSION</h2> <!-- Titre "MISSION" -->
            </div>
            <div class="d-flex align-items-center"> <!-- Utilisation de la classe align-items-center pour aligner verticalement le contenu -->
                <div class="about-img mx-2">
                    <img src="./site images/Esport - Fait avec PosterMyWall.jpg" alt="about-img" class="img-fluid h-100">
                </div>
                <div class="about-img">
                    <img src="./site images/logp.png" alt="about-img" class="img-fluid h-50">
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5">
            <div class="custom-border">
                <p class="text-blue mt-3">
                    "FSTT Gaming s'engage à créer une communauté inclusive et dynamique autour de la passion du gaming au sein de la Faculté des Sciences et Techniques de Tanger. Notre mission est de promouvoir l'esprit de compétition, la collaboration et le divertissement à travers des activités de gaming variées. Nous visons à offrir un environnement convivial où les étudiants peuvent se réunir, partager leurs intérêts communs et développer leurs compétences en gaming. En encourageant l'inclusion et le respect mutuel, nous aspirons à créer des opportunités d'apprentissage, de socialisation et de croissance personnelle pour tous nos membres. Ensemble, nous aspirons à repousser les limites du gaming et à célébrer notre passion commune pour cette forme de divertissement moderne."
                </p>
            </div>
        </div>
    </div>
</section>



  <!--contact us -->
  <footer class="custom-footer" style="margin-top:150px;">
    <div class="container">
        <div class="row" style="width: 1500px; text-align: center;">

            <div class="col-lg-6 ">
                <h5 class="text-light " style="color:  #0d6efd;"> More Info</h5>
                <p class="text-light"><i class="fa fa-location"></i> FSTT Tanger </i></p>
                <p class="text-light"><i class="fa fa-phone"></i> 0554789632</i></p>
                <p class="text-light"><i class="fa fa-envelope"></i> fsttgaming@gmail.com</i></i></p>
                
            </div>
            <div class="col-lg-3">
                <h5 class="text-light " >Restez connectés</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i> instagram</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> twitter</a></li>
                    
                </ul>
            </div>
            

            

        </div>
    </div>



</footer>










<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
