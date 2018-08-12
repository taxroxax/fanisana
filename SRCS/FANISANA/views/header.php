<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 192.69.216.111/themes/preview/ace/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 14 Nov 2013 12:44:19 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>AHEBRONA-Application</title>

    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- basic styles -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link href="assets/images/gallery/AHebrona.png" rel="icon">


    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css"/>
    <![endif]-->

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.full.min.css" />
    <!-- fonts -->

    <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"/>-->

    <!-- ace styles -->

    <link rel="stylesheet" href="assets/css/ace.min.css"/>
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css"/>
    <link rel="stylesheet" href="assets/css/ace-skins.min.css"/>

    <link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" href="assets/css/chosen.css" />
    <link rel="stylesheet" href="assets/css/datepicker.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="assets/css/daterangepicker.css" />
    <link rel="stylesheet" href="assets/css/colorpicker.css" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <?php
    require(dirname(__DIR__).'\controllers\EventCategorieController.php');
    $listEvent = \controllers\EventCategorieController::LoadEventCategorie();
    ?>

</head>
<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="index.php" class="navbar-brand">
                <small>
                    <img width="87%" height="60px" src="assets/images/gallery/Logo.png" />
                </small>
            </a><!-- /.brand -->
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="assets/avatars/aymard.png" alt=" <?php echo "ANOSIZATO HEBRONA"?>"/>
								<span class="user-info">
									<small>Tongasoa,</small>
                                    ANOSIZATO HEBRONA
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="icon-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="icon-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
                                <i class="icon-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.ace-nav -->
        </div>
        <!-- /.navbar-header -->
    </div>
    <!-- /.container -->
</div>
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>
    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>
        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try {
                    ace.settings.check('sidebar', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="nav nav-list">
                <li class="active">
                    <a href="index.php">
                        <i class="icon-home grey"></i>
                        <span class="menu-text"> Zava-misy </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-group green"></i>
                        <span class="menu-text"> FIANAKAVIANA </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="#">
                                <i class="icon-double-angle-right"></i>
                                Hanampy
                            </a>
                        </li>

                        <li>
                            <a href="famille.php">
                                <i class="icon-double-angle-right"></i>
                                Lisitra
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-male"></i>
                        <span class="menu-text"> MPIKAMBANA </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="new_membre.php">
                                <i class="icon-double-angle-right"></i>
                                Hisoratra
                            </a>
                        </li>

                        <li>
                            <a href="membre.php">
                                <i class="icon-double-angle-right"></i>
                                Lisitra
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-bullhorn pink2"></i>
                        <span class="menu-text"> HETSIKA </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">

                        <?php foreach($listEvent as $element): ?>
                        <li>
                            <a href="participate_event.php?id_event=<?php echo $element->getIdEventCateg(); ?>&name_event=<?php echo $element->getLibelleEventCategorie(); ?>">
                                <i class="icon-double-angle-right"></i>
                                <?php echo $element->getLibelleEventCategorie(); ?>
                            </a>
                        </li>
                        <?php endforeach;?>
                        <li>
                            <a href="event.php">
                                <i class="icon-double-angle-right"></i>
                                Lisitra
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="faritra.php">
                        <i class="icon-globe blue"></i>
                        <span class="menu-text"> FARITRA </span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</div>