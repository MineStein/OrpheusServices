<?php
function isHome() {
    global $pageTitle;
    if ($pageTitle == 'Highly Skilled Professionals') {
        return true;
    }
    else {
        return false;
    }
}
function isPanel() {
    global $pageTitle;
    if ($pageTitle == 'Control Panel') {
        echo '../';
    }
}
?>
<!DOCTYPE html>

<!--
Orpheus Services Website
ORIGINAL DEVELOPER - 1AM Development (Michael C) @ 1AMDEV.NET
NEW DESIGN - Tyler Grissom @ tyler-g.net
-->

<html lang="en">
    
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="Orpheus Services; Offering All Types of Services">
        <meta name="keywords" content="orpheus, services, minecraft, configs, builds, stuff">
        <meta name="author" content="Michael - 1:AM Development">
        
        <title>Orpheus Services [<?php echo $pageTitle; ?>]</title>
        
        <link rel="icon" href="<?php isPanel(); ?>assets/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php isPanel(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php isPanel(); ?>assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php isPanel(); ?>assets/css/responsive.css">

        <style>

            @keyframes bob {
                0% {
                    transform: scale(1.0);
                }
                60% {
                    transform: translate(0, -5px);
                }
                100% {
                    transform: scale(1) translate(0, 0);
                }
            }

            body {
                overflow: hidden;
            }

            main {
                margin-top: 50px;
                overflow-y: scroll;
                position: relative;
            }

            .navbar {
                background: -webkit-linear-gradient(to right, #29CEE0, #1282B1);
                background: linear-gradient(to right, #29CEE0, #1282B1);
            }

            .navbar-brand {
                border: 0 none !important;
            }

            p {
                font-size: 1.4em;
            }

            .header-large {
                font-size: 2.5em !important;
                font-weight: normal !important;
            }

            .header-large > small {
                font-size: 0.5em !important;
                color: dimgrey !important;
            }

            .header-small {
                font-size: 1.8em !important;
            }

            .pricing {
                height: 350px;
            }

            .pricing:hover {
                animation: bob 0.5s;
            }

            .aboutFeature {
                height: 350px;
            }

            .aboutFeature:hover {
                animation: bob 0.5s;
            }

            .price {
                font-weight: bold !important;
            }

            .price > span {
                font-weight: normal !important;
            }

            .pricing p:first-child {
                font-size: 30px;
                font-weight: 600;
                color: #28C1D4;
            }

            .pricing p {
                font-size: 22px;
                font-weight: normal;
            }

            .pricing p:last-child {
                font-size: 22px;
                font-weight: normal;
            }

        </style>

    </head>
    
    <body>

        <main>

        <div id="header" <?php if (!isHome()) { echo 'class="pageHeader"'; } ?>>
            <div id="nav">
                <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php isPanel(); ?>index"><img src="<?php isPanel(); ?>assets/images/branding/whiteLogo.png" alt="Orpheus" draggable="false"><span>Orpheus Services</span></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li<?php if (isHome()) { echo ' class="active"'; } ?>><a href="<?php isPanel(); ?>index">Home</a></li>
                                <li><a href="<?php if (isHome()) { echo '#'; } else { echo 'index#pricing'; } ?>" onclick="scrollToElement('pricing')">Pricing</a></li>
                                <li<?php if ($pageTitle == 'Portfolio') { echo ' class="active"'; } ?>><a href="<?php isPanel(); ?>portfolio">Portfolio</a></li>
                                <li<?php if ($pageTitle == 'Contact') { echo ' class="active"'; } ?>><a href="<?php isPanel(); ?>contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            if (isHome()) {
                ?>
                <div id="homeJumbo">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <p>Quality as high as the mountains</p>
                                <p>Orpheus Services is a professional and reputable service team who strives to create a smooth and effortless experience for customers around the world.
								We offer the highest quality experience with our services ranging from graphical design and development work all the way to Minecraft builds and setups.
								Our specialists are hand picked by the management team and are all professionals in their area of expertise having yet to receive a negative review for their services.</p>
                            </div>
                            <div class="col-md-4">
                                <img src="assets/images/design/mountains.png" alt="mountains" draggable="false">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <?php
        }
        else {
            ?>
            </div>
            <div id="pageJumbo">
                <div class="container">
                    <p><?php echo $pageTitle; ?></p>
                </div>
            </div>
            <?php
        }
        ?>
        