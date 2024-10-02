<?php
session_start();
// error_reporting(E_ALL);
error_reporting(0);

require('./functions.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pontus Björkdahl - Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/small-desktops.css">
    <link rel="stylesheet" href="css/tablets.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="aside">
            <aside>
                <a href="#home">
                    <img class="logo" src="img/pontus-logo-red.svg" alt="Pontus Logo">
                </a>
                <nav class="nav">
                    <ul>
                        <li>
                            <a href="#home" class="active" aria-label="Home">
                                <div class="icon">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </div>
                                <span>Hem</span>
                            </a>
                        </li>
                        <li>
                            <a href="#about" aria-label="About">
                                <div class="icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <span>Om mig</span>
                            </a>
                        </li>
                        <li>
                            <a href="#portfolio" aria-label="Portfolio">
                                <div class="icon">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </div>
                                <span>Portfolio</span>
                            </a>
                        </li>
                        <li>
                            <a href="#learning" aria-label="Learning">
                                <div class="icon">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </div>
                                <span>Fokus</span>
                            </a>
                        </li>
                        <li>
                            <a href="#contact" aria-label="Contact">
                                <div class="icon">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                                <span>Kontakt</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
        </div>
        <div class="color-btn-container">
            <button id="orange-btn" class="color-btns"></button>
            <button id="red-btn" class="color-btns"></button>
        </div>
        <button class="menu">
            <i class="fa fa-bars fa-lg"></i>
            <i class="fa fa-times hide"></i>
        </button>
        <div class="border-hr">
            <hr class="active-color border-orange hide">
            <hr class="active-color border-red">
        </div>
        <main class="main-content">
            <section id="home">
                <div class="section-container">
                    <div class="home-text">
                        <h1>Pontus Björkdahl</h1>
                        <!-- <h2>Junior <span class="developer">Webbutvecklare</span></h2> -->
                        <h2>Webbutvecklare</h2>
                        <form id="CV-form" method="get"  target=”_blank” action="pdf/pontus-bjorkdahl-CV.pdf">
                            <button type="submit" class="CV-btn"><h3>Läs mitt CV</h3></button>
                         </form>
                    </div>
                    <div class="picture">
                        <img id="profile-picture" src="img/photo.webp" alt="Porträttbild Pontus">
                    </div>
                </div>
            </section>
            <hr>
            <section id="about">
                <div class="about-text">
                    <h2 class="highlight">Om mig</h2>
                    <p>Nyfiken och driven junior Webbutvecklare som tog examen 2023 och har sedan
                        dess arbetat på företaget jag gjorde min LIA på. Under de senaste året har jag haft 
                        möjlighet att tillämpa mina färdigheter och arbeta med riktiga projekt. 
                        Jag är mycket motiverad att fortsätta lära mig och växa inom webbutveckling och programmering som helhet.</p>
                </div>
                <div class="about-menu">
                    <div class="education">
                        <h2 class="about-links">Utbildning</h2>
                        <div class="education-content about-content">
                            <h3>Webbutvecklare - Changemaker Educations</h3>
                            <p>Kunskaper jag har fått genom utbildningen:</p>
                            <ul>
                                <li>Goda kunskaper inom Webbprogrammering</li>
                                <li>Webbserverprogrammering</li>
                                <li>Mobilapplikationsutveckling</li>
                                <li>E-handelslösningar och systemstöd</li>
                                <li>UX, Design och Layout</li>
                                <li>Projektmetodik för Webb och IT</li>
                            </ul>
                        </div>
                    </div>
                    <div class="skills">
                        <h2 class="about-links">Kompetenser</h2>
                        <div class="skills-content about-content">
                            <ul>
                                <li>HTML <div class="stack HTML"></div></li>
                                <li>React <div class="stack react"></div></li>
                                <li>JavaScript <div class="stack javascript"></div></li>
                                <li>WordPress <div class="stack wordpress"></div></li>
                                <li>PHP <div class="stack PHP"></div></li>
                                <li>CSS <div class="stack CSS"></div></li>
                                <li>SQL <div class="stack SQL"></div></li>
                                <li>Figma <div class="stack figma"></div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <hr>
            <section id="portfolio">
                <h2 class="highlight">Portfolio</h2>
                <p>På min nuvarande arbetsplats har jag en varierad uppsättning av arbetsuppgifter. 
                    Jag utvecklar, underhåller och implementerar funktioner på företagets e-handelsplattform. 
                    Kodspråken är främst PHP, HTML, CSS och JavaScript, jag arbetar både med frontend och backend. 
                    Dessutom ingår kundsupport i mina ansvarsområden, där jag kodar specifika anpassningar efter kundernas behov. 
                    En av mina huvudsakliga ansvarsområden har också varit att designa och implementera designer på webbshoppar åt våra kunder. 
                </p> 
                <br>
                <div class="work-imgs">
                    <h3>Projekt</h3>
                    <p>Den här portfoliosidan har jag byggt själv. Kika gärna på koden på min Github: </p>
                    <p>Nedan finner ni några av projekten jag har arbetat med på min nuvarande arbetsplats, där jag bland annat har skapat designen och implementerat den. Samt skapat funktioner för att styra innehåll i adminpanelen samt AJAX-sökfunktionalitet med mera.</p>
                    <br>
                    <?php
                    $work_projects_dir = './img/work-projects/';
                    image_modal($work_projects_dir);
                    ?>
                </div>
                <br>
                <br>
                
                <div class="school-imgs">
                    <h3>Skolprojekt</h3>
                    <p>Skolprojekt jag arbetade med under min utbildning.</p>
                    <br>
                    <?php 
                    $school_projects_dir = './img/school-projects/';
                    image_modal($school_projects_dir, true);
                    ?>
                </div>
            </section>
            <hr>
            <section id="learning">
                <h2 class="highlight">Nuvarande fokus</h2>
                <p>En av mina största styrkor är att jag har en hunger att ständigt lära mig mer. </br>
                    En del av min fritid ägnar jag åt att lära mig nya tekniker. Här är kurser jag går just nu:</p>
                <?php
                $courses_dir = './img/learning/';
                image_modal($courses_dir, true, false);
                ?>
            </section>
            <hr>
            <section id="contact">
                <h2 class="highlight">Kontakt</h2>
                    <div id="form-container">
                        <div class="contacts">
                            <h2>Kontakta mig</h2>
                            <a href="mailto:contact@pontusbjorkdahl.se"><i class="fa fa-envelope" aria-hidden="true"></i>contact@pontusbjorkdahl.se</a><br>
                            <a href="tel:0707989006"><i class="fa fa-phone" aria-hidden="true"></i>070 798 90 06</a>
                            <form id="CV-form" method="get"  target=”_blank” action="/pdf/pontus-bjorkdahl-CV.pdf">
                                <button type="submit" class="CV-btn CV-form-btn">Läs mitt CV</button>
                             </form>
                        </div>
                        <hr id="form-hr">
                        <form id="contact-form" method="post" id="form">
                            <label for="name">Namn*</label><br>
                            <input type="text"name="name" id="name"required><br>

                            <label for="text">E-post*</label><br>
                            <input type="email" name="email" id="email"required><br>
        
                            <label for="subject">Ämne*</label><br>
                            <input type="text" name="subject" id="subject" required><br>
            
                            <label for="message">Meddelande</label><br>
                            <textarea name="message" id="message"></textarea><br>
            
                            <div class="container-btn">
                                <input id="submitBtn" type="submit" value="SKICKA">
                            </div>

                            <p id="succesMessage" class="hide">Meddelande skickat!<i class="fa fa-paper-plane" aria-hidden="true"></i></p>
                        </form>
                    </div>
            </section>
            <?php 
            include('./chatgpt/chatgpt_module.php');
            ?>
        </main>    
    </div>
    <script src="js/main.js"></script>
    <script src="js/ajaxEmail.js"></script>
</body>
</html>