<!doctype html>
<!--
	Template:	 Unika - Responsive One Page HTML5 Template
	Author:		 imransdesign.com
	URL:		 http://imransdesign.com/
    Designed By: https://www.behance.net/poljakova
	Version:	1.0	
-->
<html lang="en-US">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Aos</title>
		<meta name="description" content="Unika - Responsive One Page HTML5 Template">
		<meta name="keywords" content="HTML5, Bootsrtrap, One Page, Responsive, Template, Portfolio" />
		<meta name="author" content="imransdesign.com">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Google Fonts  -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'> <!-- Body font -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'> <!-- Navbar font -->

		<!-- Libs and Plugins CSS -->
		<link rel="stylesheet" href="./vues/inc/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="./vues/inc/animations/css/animate.min.css">
		<link rel="stylesheet" href="./vues/inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
		<link rel="stylesheet" href="./vues/inc/owl-carousel/css/owl.carousel.css">
		<link rel="stylesheet" href="./vues/inc/owl-carousel/css/owl.theme.css">

		<!-- Theme CSS -->
        <link rel="stylesheet" href="./vues/css/reset.css">
		<link rel="stylesheet" href="./vues/css/style.css">
		<link rel="stylesheet" href="./vues/css/mobile.css">

		<!-- Skin CSS -->
		<!--<link rel="stylesheet" href="css/skin/cool-gray.css">-->
        <link rel="stylesheet" href="./vues/css/skin/ice-blue.css">
        <!-- <link rel="stylesheet" href="css/skin/summer-orange.css"> -->
        <!-- <link rel="stylesheet" href="css/skin/fresh-lime.css"> -->
        <!-- <link rel="stylesheet" href="css/skin/night-purple.css"> -->

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

    <body data-spy="scroll" data-target="#main-navbar">
        <div class="page-loader"></div>  <!-- Display loading image while page loads -->
    	<div class="body">
        
            <!--========== BEGIN HEADER ==========-->
            <header id="header" class="header-main">

                <!-- Begin Navbar -->
                <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation"> <!-- Classes: navbar-default, navbar-inverse, navbar-fixed-top, navbar-fixed-bottom, navbar-transparent. Note: If you use non-transparent navbar, set "height: 98px;" to #header -->

                  <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand page-scroll" href="index.php">Admin Online Services</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="page-scroll" href="body">Accueil</a></li>
                         <!--   <li><a class="page-scroll" href="#about-section">A propos</a></li>-->
                            <li><a class="page-scroll" href="#services-section">Services</a></li>
                         <!--   <li><a class="page-scroll" href="#portfolio-section">Works</a></li>-->
                            <li><a class="page-scroll" href="#team-section">L'équipe</a></li>                            
                            <li><a class="page-scroll" href="#prices-section">Offres</a></li>
							
				<!- Formulaire d'inscription ->			
							<li><a class="page-scroll" href="#modal-1" data-toggle="modal">inscription</a></li>
							<div class="modal" id="modal-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title">Inscription</h3>
										</div>
										<div class="modal-body">
											<form method="POST" id="inscription" action="index.php?p=index">
                                            <div class="row">
                                                <div class="col-md-6">
												        <input type="text" class="form-control" placeholder="Votre nom d'utilisateur" name="nomUtilisateur" />
												        <br />
												        <input type="email" class="form-control" placeholder="Votre mail" name="mail" />
												        <br />
												        <input type="email" class="form-control" placeholder="Votre confirmation de mail" name="confMail" />
												        <br />
												        <input type="password" class="form-control" placeholder="Votre mot de passe" name="motDePasse" />
												        <br />
												        <input type="password" class="form-control" placeholder="Votre confirmation de  mot de passe" name="confMotDePasse" />
												        <br />
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary">Fermer</button>
                                                        <button type="submit" class="btn btn-success" value="confInscription" name="confInscription">Valider</button>
                                        </div>
											</form>
											<?php
												if(isset($erreur)){
													echo $erreur;
												}
											?>
										</div>
									</div>
								</div>
							</div>
				<!- Formulaire de connexion ->			
							<li><a class="page-scroll" href="#modal-2" data-toggle="modal">connexion</a></li>
							<div class="modal" id="modal-2">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h3 class="modal-title">Connexion</h3>
										</div>
										<div class="modal-body">
											<form method="POST" id="connexion" action="index.php?p=index">
											<div class="row">
                                                <div class="col-md-6">
												    <input type="text" class="form-control" placeholder="Votre nom d'utilisateur" name="nomUtilisateur" />
												    <br />
												    <input type="password" class="form-control" placeholder="Votre mot de passe" name="motDePasse" />
												    <br />
                                                </div>
                                            </div>
                                                <div class="modal-footer">
												    <button type="button" data-dismiss="modal" class="btn btn-primary">Fermer</button>
                                                    <button type="submit" class="btn btn-success" value="confConnexion" name="confConnexion">Se connecter</button>
                                                </div>
											</form>
                                            <?php
                                                if(isset($erreur)){
                                                    echo $erreur;
                                                }
                                            ?>
										</div>
									</div>
								</div>
							</div> 
							
							
                            <!--<li><a class="page-scroll" href="#">Connexion</a></li>-->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container -->
                </nav>
                <!-- End Navbar -->
				

            </header>
            <!-- ========= END HEADER =========-->
                        
            
        	<!-- Begin text carousel intro section -->
			<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(./vues/img/AOS-psl.png); background-size: 80% auto;";>
				
				<!--<div class="container">
					<div class="caption text-center text-white" data-stellar-ratio="0.7">

						<div id="owl-intro-text" class="owl-carousel">
							<div class="item">
								<h1>We have Awesome things</h1>
								<p>Let's make the web beautiful together</p>
                                <div class="extra-space-l"></div>
								<a class="btn btn-blank" href="https://creativemarket.com/Themetorium" target="_blank" role="button">View More!</a>
							</div>
							<div class="item">
								<h1>Join with us</h1>
								<p>To the greatest Journey</p>
								<div class="extra-space-l"></div>
								<a class="btn btn-blank" href="https://creativemarket.com/Themetorium" target="_blank" role="button">View More!</a>
							</div>
							<div class="item">
								<h1>I'm Unika</h1>
								<p>One Page Responsive Theme</p>
								<div class="extra-space-l"></div>
								<a class="btn btn-blank" href="https://creativemarket.com/Themetorium" target="_blank" role="button">View More!</a>
							</div>
						</div>

					</div> <!-- /.caption -->
				<!--</div> <!-- /.container -->

			</section>
			<!-- End text carousel intro section -->
                
                
                
                
            <!-- Begin about section -->
			<!--<section id="about-section" class="page bg-style1">
                <!-- Begin page header-->
            <!--    <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                            <h2>About</h2>
                            <div class="devider"></div>
                            <p class="subtitle">little information</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->

                <!-- Begin rotate box-1 -->
             <!--   <div class="rotate-box-1-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0">
                                    <span class="rotate-box-icon"><i class="fa fa-users"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>Who We Are?</h4>
                                        <p>Lorem ipsum dolor sit amet set, consectetur utes anet adipisicing elit, sed do eiusmod tempor incidist.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0.2s">
                                    <span class="rotate-box-icon"><i class="fa fa-diamond"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>What We Do?</h4>
                                        <p>Lorem ipsum dolor sit amet set, consectetur utes anet adipisicing elit, sed do eiusmod tempor incidist.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0.4s">
                                    <span class="rotate-box-icon"><i class="fa fa-heart"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>Why We Do It?</h4>
                                        <p>Lorem ipsum dolor sit amet set, consectetur utes anet adipisicing elit, sed do eiusmod tempor incidist.</p>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0.6s">
                                    <span class="rotate-box-icon"><i class="fa fa-clock-o"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>Since When?</h4>
                                        <p>Lorem ipsum dolor sit amet set, consectetur utes anet adipisicing elit, sed do eiusmod tempor incidist.</p>
                                    </div>
                                </a>
                            </div>
                            
                        </div> <!-- /.row -->
               <!--     </div> <!-- /.container -->
              <!--  </div>
                <!-- End rotate box-1 -->
                
              <!--  <div class="extra-space-l"></div>
                
                <!-- Begin page header--> 
              <!--  <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                            <h4>Our Skills</h4>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                
                <!-- Begin Our Skills -->
              <!--  <div class="our-skills">
                	<div class="container">
                    	<div class="row">
                        
                        	<div class="col-sm-6">
                                <div class="skill-bar wow slideInLeft" data-wow-delay="0.2s">
                                    <div class="progress-lebel">
                                        <h6>Photoshop & Illustrator</h6>
                                    </div>
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="skill-bar wow slideInRight" data-wow-delay="0.2s">
                                    <div class="progress-lebel">
                                        <h6>WordPress</h6>
                                    </div>
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="skill-bar wow slideInLeft" data-wow-delay="0.4s">
                                    <div class="progress-lebel">
                                        <h6>Html & Css</h6>
                                    </div>
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="skill-bar wow slideInRight" data-wow-delay="0.4s">
                                    <div class="progress-lebel">
                                        <h6>Javascript</h6>
                                    </div>
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- /.row -->
                <!--    </div> <!-- /.container -->
           <!--     </div>
                <!-- End Our Skill -->
       <!--   </section>
          <!-- End about section -->

              
              
              
          <!-- Begin cta -->
         <!-- <section id="cta-section">
          	<div class="cta">
            	<div class="container">
                	<div class="row">
                    
                    	<div class="col-md-9">
                        	<h1>Download Our Pdf</h1>
                            <p>Inspired by nature, follow technology, appreciate the classics. You can build modern & professional websites with Unika. The possibilities are just endless.</p>
                        </div>
                        
                        <div class="col-md-3">
                        	<div class="cta-btn wow bounceInRight" data-wow-delay="0.4s">
                        <a class="btn btn-default btn-lg" href="http://www.imransdesign.com/" target="_blank" role="button">Download</a>
                        	</div>
                        </div>
                        
                    </div> <!-- /.row -->
         <!--       </div> <!-- /.container -->
       <!--     </div>
          </section>
          <!-- End cta -->

              
              
              
            <!-- Begin Services -->
            <section id="services-section" class="page text-center">
                <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Services</h2>
                            <div class="devider"></div>
                            <p class="subtitle">Hébergement</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
            
                <!-- Begin roatet box-2 -->
                <div class="rotate-box-2-wrapper">
                    <div class="container" style="margin-left: 21%">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0">
                                    <span class="rotate-box-icon"><i class="fa fa-globe"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>Noms de domaines</h4>
                                        <p style="text-align: justify">Créez votre domaine et hébergez le. Nous vous donnons la possibilité d'importer votre domaine. Vous pourrez y associer tous nos autres services. Rassemblez tous vos services en un afin d'administrer plus aisément, avec un control total sur votre parc informatique.</p>
                                    </div>
                                </a>
                            </div>
            
                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0.2s">
                                    <span class="rotate-box-icon"><i class="fa fa-envelope-o"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>Boites mail</h4>
                                        <p style="text-align: justify">Créez votre boîte mail et hébergez-la chez vous. Vous pouvez également l'héberger dans votre propre domaine préalablement crée. Profitez d'un service fiable et sécurisé, avec un filtre anti-spam.</p>
                                    </div>
                                </a>
                            </div>
            
                            <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0.4s">
                                    <span class="rotate-box-icon"><i class="fa fa-file-code-o"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>Sites web</h4>
                                        <p style="text-align: justify">Créez un nom de domaine et faites y correspondre ce que vous voulez : un site web. Sentez-vous libre, vous pouvez l'associer dans AOS ou à votre domaine.</p>
                                    </div>
                                </a>
                            </div>
                            
                         <!--   <div class="col-md-3 col-sm-6">
                                <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0.6s">
                                    <span class="rotate-box-icon"><i class="fa fa-pencil"></i></span>
                                    <div class="rotate-box-info">
                                        <h4>Coding Pen</h4>
                                        <p>Lorem ipsum dolor sit amet set, consectetur utes anet adipisicing elit, sed do eiusmod tempor incidist.</p>
                                    </div>
                                </a>
                            </div>-->
                            
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                    
                    <div class="container">
                        <!-- Cta Button -->
                        <div class="extra-space-l"></div>
                        <!--<div class="text-center">
                    		<a class="btn btn-default btn-lg-xl" href="http://www.imransdesign.com/" target="_blank" role="button">Large Button</a>
                        </div>-->
                    </div> <!-- /.container -->                       
                </div>
                <!-- End rotate-box-2 -->
            </section>
            <!-- End Services -->
              
              
              
              
            <!-- Begin testimonials -->
          <!--  <section id="testimonial-section">
                <div id="testimonial-trigger" class="testimonial text-white parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/testimonial-bg.jpg);">
                    <div class="cover"></div>
                    <!-- Begin page header-->
           <!--         <div class="page-header-wrapper">
                        <div class="container">
                            <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                                <h2>Reviews</h2>
                                <div class="devider"></div>
                                <p class="subtitle">What people say about us</p>
                            </div>
                        </div>
                    </div>
                    <!-- End page header-->
            <!--        <div class="container">
                        <div class="testimonial-inner center-block text-center">
                            <div id="owl-testimonial" class="owl-carousel">
                                <div class="item">
                                    <blockquote>
                                        <p>"This was my first experience with that team and outperformed my expectation! They know there stuff and I highly recommend them! A+++".</p>
                                        <footer><cite title="Source Title">Daryl Hodgeman</cite></footer>
                                    </blockquote>
                                </div>
                                <div class="item">
                                    <blockquote>
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua."</p>
                                        <footer><cite title="Source Title">John Doe</cite></footer>
                                    </blockquote>
                                </div>
                                <div class="item">
                                    <blockquote>
                                        <p>"Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit".</p>
                                        <footer><cite title="Source Title">John Doe</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End testimonials -->
                

                
                
            <!-- Begin Portfolio -->
            <!--<section id="portfolio-section" class="page bg-style1">
            	<div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio">
                                <!-- Begin page header-->
           <!--                     <div class="page-header-wrapper">
                                    <div class="container">
                                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                                            <h2>Our Works</h2>
                                            <div class="devider"></div>
                                            <p class="subtitle">What we are proud of</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End page header-->
            <!--                    <div class="portfoloi_content_area" >
                                    <div class="portfolio_menu" id="filters">
                                        <ul>
                                            <li class="active_prot_menu"><a href="#porfolio_menu" data-filter="*">all</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".websites">websites</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".webDesign" >web design</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".appsDevelopment">apps development</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".GraphicDesign">graphic design</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".responsive">responsive</a></li>
                                        </ul>
                                    </div>
                                    <div class="portfolio_content">
                                        <div class="row"  id="portfolio">
                                            <div class="col-xs-12 col-sm-4 appsDevelopment">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p1.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Skull Awesome</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 GraphicDesign">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p2.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Photo Frame</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 responsive">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p3.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Hand Shots</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 webDesign websites">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p4.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Night Abstract</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 appsDevelopment websites">
                                                <div class="portfolio_single_content">
                                                    <img src="img//portfolio/p5.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Joy of Independence</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 GraphicDesign">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p6.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Night Crawlers</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 responsive">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p7.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Last Motel</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 GraphicDesign">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p8.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Dirk Road</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 websites">
                                                <div class="portfolio_single_content">
                                                    <img src="img/portfolio/p9.jpg" alt="title"/>
                                                    <div>
                                                        <a href="#">Old is Gold</a>
                                                        <span>Subtitle</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End portfolio -->
            
                
                
                
            <!-- Begin counter up -->
<!--            <section id="counter-section">                					
				<div id="counter-up-trigger" class="counter-up text-white parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/counter-bg.jpg);">
					<div class="cover"></div>
                    <!-- Begin page header-->
<!--                    <div class="page-header-wrapper">
                        <div class="container">
                            <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                                <h2>Some Fun Facts</h2>
                                <div class="devider"></div>
                                <p class="subtitle">Before anyone is not told</p>
                            </div>
                        </div>
                    </div>
                    <!-- End page header-->
<!--					<div class="container">

						<div class="row">

							<div class="fact text-center col-md-3 col-sm-6">
								<div class="fact-inner">
									<i class="fa fa-users fa-3x"></i>
                                    <div class="extra-space-l"></div>
									<span class="counter">6666</span>
									<p class="lead">Clients Worked With</p>
								</div>
							</div>

							<div class="fact text-center col-md-3 col-sm-6">
								<div class="fact-inner">
									<i class="fa fa-leaf fa-3x"></i>
                                    <div class="extra-space-l"></div>
									<span class="counter">800</span>
									<p class="lead">Completed Projects</p>
								</div>
							</div>

							<div class="fact text-center col-md-3 col-sm-6">
								<div class="fact-inner">
									<i class="fa fa-trophy fa-3x"></i>
                                    <div class="extra-space-l"></div>
									<span class="counter">55</span>
									<p class="lead">Winning Awards</p>
								</div>
							</div>

							<div class="fact last text-center col-md-3 col-sm-6">
								<div class="fact-inner">
									<i class="fa fa-coffee fa-3x"></i>
                                    <div class="extra-space-l"></div>
									<span class="counter">1100</span>
									<p class="lead">Cups of coffee drinking</p>
								</div>
							</div>

						</div> <!-- /.row -->
<!--					</div> <!-- /.container -->
<!--				</div>
            </section>
			<!-- End counter up -->
                
                
                
                
            <!-- Begin team-->
            <section id="team-section" class="page">
                <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>L'équipe</h2>
                            <div class="devider"></div>
                            <p class="subtitle">AOS</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                <div class="container" style="margin-left: 18%">
                    <div class="row">
                        <div class="team-items">
                            <div class="col-md-2">
                                <div class="team-container wow bounceIn" data-wow-delay="0.2s">
                                    <div class="team-item">
                                        <div class="team-triangle">
                                            <div class="content">
                                                <img src="./vues/img/team/rodolphe.jpg" alt="title"/>
                                                <div class="team-hover text-center">
                                                    <i class="fa fa-male"></i>
                                                    <p>Rodolphe Wachter</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="team-container wow bounceIn" data-wow-delay="0.3s">
                                    <div class="team-item">
                                        <div class="team-triangle">
                                            <div class="content">
                                                <img src="./vues/img/team/dimitri.jpg" alt="title"/>
                                                <div class="team-hover text-center">
                                                    <i class="fa fa-male"></i>
                                                    <p>Dimitri Tchapmi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="team-container wow bounceIn" data-wow-delay="0.4s">
                                    <div class="team-item">
                                        <div class="team-triangle">
                                            <div class="content">
                                                <img src="./vues/img/team/ed.jpg" alt="title"/>
                                                <div class="team-hover text-center">
                                                    <i class="fa fa-male"></i>
                                                    <p>Edouard Ling</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
    
    <!--                        <div class="col-md-2">
                                <div class="team-container wow bounceIn" data-wow-delay="0.5s">
                                    <div class="team-item">
                                        <div class="team-triangle">
                                            <div class="content">
                                                <img src="img/team/1.jpg" alt="title"/>
                                                <div class="team-hover text-center">
                                                    <i class="fa fa-male"></i>
                                                    <p>John Doe</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="team-container wow bounceIn" data-wow-delay="0.6s">
                                    <div class="team-item">
                                        <div class="team-triangle">
                                            <div class="content">
                                                <img src="img/team/1.jpg" alt="title"/>
                                                <div class="team-hover text-center">
                                                    <i class="fa fa-male"></i>
                                                    <p>John Doe</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="team-container wow bounceIn" data-wow-delay="0.7s">
                                    <div class="team-item">
                                        <div class="team-triangle">
                                            <div class="content">
                                                <img src="img/team/1.jpg" alt="title"/>
                                                <div class="team-hover text-center">
                                                    <i class="fa fa-male"></i>
                                                    <p>John Doe</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="team-container wow bounceIn" data-wow-delay="0.8s">
                                    <div class="team-item">
                                        <div class="team-triangle">
                                            <div class="content">
                                                <img src="img/team/1.jpg" alt="title"/>
                                                <div class="team-hover text-center">
                                                    <i class="fa fa-female"></i>
                                                    <p>Jane Doe</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>-->
                        </div>  
                    </div>
                </div>

            </section>
            <!-- End team-->
                
                
                
                
            <!-- Begin partners -->
           <!-- <section id="partners-section">
                <!-- Begin page header-->
            <!--    <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Our Partners</h2>
                            <div class="devider"></div>
                            <p class="subtitle">Those who trust us</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
             <!--   <div class="container">
                    <div id="owl-partners" class="owl-carousel">
                        <img src="img/partners/1.png" alt="img">
                        <img src="img/partners/2.png" alt="img">
                        <img src="img/partners/3.png" alt="img">
                        <img src="img/partners/4.png" alt="img">
                        <img src="img/partners/5.png" alt="img">
                        <img src="img/partners/6.png" alt="img">
                        <img src="img/partners/7.png" alt="img">
                    </div>
                </div>
            </section>
            <!-- End partners -->
                
                
                
                
            <!-- Begin prices section -->
			<section id="prices-section" class="page">

                <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Offre de services</h2>
                            <div class="devider"></div>
                            <p class="subtitle">Comme vous en rêviez</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->

				<div class="extra-space-l"></div>

				<!-- Begin prices -->
				<div class="prices">
					<div class="container" style="margin-left: 21%">
						<div class="row">
							
							<div class="price-box col-sm-6 col-md-3 wow flipInY" data-wow-delay="0.3s">
								<div class="panel panel-default">
									<div class="panel-heading text-center">
										<i class="fa fa-globe fa-2x"></i>
										<h3>DNS</h3>
									</div>
									<div class="panel-body text-center">
										<p class="lead"><strong>Gratuit</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item">Gérer ses noms de domaine</li>
										<li class="list-group-item">Importation de votre nom de domaine</li>
										<li class="list-group-item">Création de domaine dans aos.itinet.fr</li>
										<li class="list-group-item">Réserver 2 noms de domaines dans aos.itinet.fr</li>
									</ul>
									<!--<div class="panel-footer text-center">
										<a class="btn btn-default" href="#">Order Now!</a>
									</div>-->
								</div>										
							</div>

							<div class="price-box col-sm-6 col-md-3 wow flipInY" data-wow-delay="0.5s">
								<div class="panel panel-default">
									<div class="panel-heading text-center">
										<i class="fa fa-envelope-o fa-2x"></i>
										<h3>MAIL</h3>
									</div>
									<div class="panel-body text-center">
										<p class="lead"><strong>Gratuit</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item">Gérer sa boite mail</li>
										<li class="list-group-item">Créer une boite mail sur aos.itinet.fr</li>
										<li class="list-group-item">Création de boite mail dans votre domaine</li>
										<li class="list-group-item">400Mo de stockage</li>
									</ul>
									<!--<div class="panel-footer text-center">
										<a class="btn btn-default" href="#">Order Now!</a>
									</div>-->
								</div>										
							</div>
							
							<!--<div class="price-box col-sm-6 price-box-featured col-md-3 wow flipInY" data-wow-delay="0.7s">
								<div class="panel panel-default">
									<div class="panel-heading text-center">
										<i class="fa fa-star fa-2x"></i>
										<h3>Professional</h3>
									</div>
									<div class="panel-body text-center">
										<p class="lead"><strong>$149</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item">Personal Use</li>
										<li class="list-group-item">20 Projects</li>
										<li class="list-group-item">20 GB Disk</li>
										<li class="list-group-item">Custom Domain</li>
										<li class="list-group-item">24/7 Support</li>
									</ul>
									<div class="panel-footer text-center">
										<a class="btn btn-default" href="#">Order Now!</a>
									</div>
									<div class="price-box-ribbon"><strong>Popular</strong></div>
								</div>										
							</div>-->
							
							<div class="price-box col-sm-6 col-md-3 wow flipInY" data-wow-delay="0.9s">
								<div class="panel panel-default">
									<div class="panel-heading text-center">
										<i class="fa fa-file-code-o fa-2x"></i>
										<h3>WEB</h3>
									</div>
									<div class="panel-body text-center">
										<p class="lead"><strong>Gratuit</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item">Gérer ses sites internet</li>
										<li class="list-group-item">Création de sites web</li>
										<li class="list-group-item">Créer 2 Sites web dans aos.itinet.fr</li>
										<li class="list-group-item">Connexion SFTP</li>
										<li class="list-group-item">Création de bases de données</li>
										<li class="list-group-item">250Mo de stockage</li>
									</ul>
									<!--<div class="panel-footer text-center">
										<a class="btn btn-default" href="#">Order Now!</a>
									</div>-->
								</div>										
							</div>
							
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div>
				<!-- End prices -->
				<div class="extra-space-l"></div>
			</section>
			<!-- End prices section -->
                
                
                
                
            <!-- Begin social section -->
			<!--<section id="social-section">
            
                 <!-- Begin page header-->
                <!--<div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Join Us</h2>
                            <div class="devider"></div>
                            <p class="subtitle">Follow us on social networks</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                
                <!--<div class="container">
                	<ul class="social-list">
                		<li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.3s"><span class="rotate-box-icon"><i class="fa fa-facebook"></i></span></a></li>
                		<li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.4s"><span class="rotate-box-icon"><i class="fa fa-twitter"></i></span></a></li>
                		<li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.5s"><span class="rotate-box-icon"><i class="fa fa-google-plus"></i></span></a></li>
                		<li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.6s"><span class="rotate-box-icon"><i class="fa fa-pinterest-p"></i></span></a></li>
                		<li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.7s"><span class="rotate-box-icon"><i class="fa fa-tumblr"></i></span></a></li>
                		<li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.8s"><span class="rotate-box-icon"><i class="fa fa-dribbble"></i></span></a></li>                      
                    </ul>
                </div>
                
            </section>-->
            <!-- End social section -->
                
                
                
                
            <!-- Begin contact section -->
<!--			<section id="contact-section" class="page text-white parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/map-bg.jpg);">
            <div class="cover"></div>
            
                 <!-- Begin page header-->
<!--                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Contacts</h2>
                            <div class="devider"></div>
                            <p class="subtitle">All to contact us</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                
<!--                <div class="contact wow bounceInRight" data-wow-delay="0.4s">
                    <div class="container">
                    	<div class="row">
                        
                            <div class="col-sm-6">
                                <div class="contact-info">
                                    <h4>Our Address</h4>
                                    <ul class="contact-address">
			                            <li><i class="fa fa-map-marker fa-lg"></i>&nbsp; 100 Limpbiscayne Blvd. (North) 17st Floor ,<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; New World Tower New York ,<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; New York, USA, 33148</li>
			                            <li><i class="fa fa-phone"></i>&nbsp; 1 -234 -456 -7890</li>
			                            <li><i class="fa fa-print"></i>&nbsp; 1 -234 -456 -7890</li>
			                            <li><i class="fa fa-envelope"></i> info@yourdomain.com</li>
			                            <li><i class="fa fa-skype"></i> Unika-Design</li>
			                        </ul>
                                </div>
                            </div>
                        
                        	<div class="col-sm-6">
                                <div class="contact-form">
                                	<h4>Write to us</h4>
                                    <form role="form">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" placeholder="Your Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control input-lg" placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" placeholder="Subject" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control input-lg" rows="5" placeholder="Message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn wow bounceInRight" data-wow-delay="0.8s">Send</button>
                                    </form>
                                </div>	
                            </div>
                                                                                
                        </div> <!-- /.row -->
<!--                    </div> <!-- /.container -->
 <!--               </div>
            </section>
            <!-- End contact section -->
                
                

                
            <!-- Begin footer -->
            <footer class="text-off-white">
            
                <!--<div class="footer-top">
                	<div class="container">
                    <!--	<div class="row wow bounceInLeft" data-wow-delay="0.4s">

                            <div class="col-sm-6 col-md-4">
                            	<h4>Useful Links</h4>
                                <ul class="imp-links">
                                	<li><a href="">About</a></li>
                                	<li><a href="">Services</a></li>
                                	<li><a href="">Press</a></li>
                                	<li><a href="">Copyright</a></li>
                                	<li><a href="">Advertise</a></li>
                                	<li><a href="">Legal</a></li>
                                </ul>
                            </div>
                        
                        	<div class="col-sm-6 col-md-4">
                                <h4>Subscribe</h4>
                            	<div id="footer_signup">
                                    <div id="email">
                                        <form id="subscribe" method="POST">
                                            <input type="text" placeholder="Enter email address" name="email" id="address" data-validate="validate(required, email)"/>
                                            <button type="submit">Submit</button>
                                            <span id="result" class="section-description"></span>
                                        </form> 
                                    </div>
                                </div> 
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <h4>Recent Tweets</h4>
                                <div class="single-tweet">
                                    <div class="tweet-content"><span>@Unika</span> Excepteur sint occaecat cupidatat non proident</div>
                                    <div class="tweet-date">1 Hour ago</div>
                                </div>
                                <div class="single-tweet">
                                    <div class="tweet-content"><span>@Unika</span> Excepteur sint occaecat cupidatat non proident uku shumaru</div>
                                    <div class="tweet-date">1 Hour ago</div>
                                </div>
                            </div>
                            
                        </div> <!-- /.row -->
                    <!--</div> <!-- /.container -->
                <!--</div>-->
                
                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                        <p class="copyright" style="color: e7e7e7">Copyright &copy; 2015 - Designed By <a href="http://www.aos.itinet.fr" class="theme-author">Admin Online Services</a> &amp; Developed by <a href="http://www.aos.itinet.fr" class="theme-author">AOS</a></p>
                    </div>
                </div>

            </footer>
            <!-- End footer -->

            <a href="#" class="scrolltotop"><i class="fa fa-arrow-up"></i></a> <!-- Scroll to top button -->
                                              
        </div><!-- body ends -->
        
        
        
        
        <!-- Plugins JS -->
		<script src="./vues/inc/jquery/jquery-1.11.1.min.js"></script> 
		<script src="./vues/inc/bootstrap/js/bootstrap.min.js"></script>
		<script src="./vues/inc/owl-carousel/js/owl.carousel.min.js"></script>
		<script src="./vues/inc/stellar/js/jquery.stellar.min.js"></script>
		<script src="./vues/inc/animations/js/wow.min.js"></script>
        <script src="./vues/inc/waypoints.min.js"></script>
		<script src="./vues/inc/isotope.pkgd.min.js"></script>
		<script src="./vues/inc/classie.js"></script>
		<script src="./vues/inc/jquery.easing.min.js"></script>
		<script src="./vues/inc/jquery.counterup.min.js"></script>
		<script src="./vues/inc/smoothscroll.js"></script>
        <script src="./vues/js/inscription.js"></script>
        <script src="./vues/js/connexion.js"></script>
        <script src="./vues/js/jquery.validate.min.js"></script>


		<!-- Theme JS -->
		<script src="./vues/js/theme.js"></script>

    </body> 
        
            
</html>
