<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <script type="text/javascript">
            //<![CDATA[
            // comes first of all
            var app = '<?php echo url_for('default'); ?>';
            //]]>
        </script>        
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="main">

            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <h1><a href="<?php echo url_for('homepage') ?>">Anker<span class="logo_colour">Services</span></a></h1>
                        <h2>Oberfläche für Administration</h2>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential('admin')): ?>
                            <?php $url = $_SERVER['REQUEST_URI'] ?>
                            <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                            <li <?php if (strpos($url, 'benutzerverwaltung')) echo 'class="selected"' ?>><?php echo link_to('User', 'benutzerverwaltung') ?></li>
                            <li <?php if (strpos($url, 'profile')) echo 'class="selected"' ?>><?php echo link_to('Profile', 'profile') ?></li>
                            <li <?php if (strpos($url, 'favoriten')) echo 'class="selected"' ?>><?php echo link_to('Favoriten', 'profil_merkliste') ?></li>
                            <li <?php if (strpos($url, 'adressen')) echo 'class="selected"' ?>><?php echo link_to('Adr.', 'adressen') ?></li>
                            <li <?php if (strpos($url, 'dokumente')) echo 'class="selected"' ?>><?php echo link_to('Dok.', 'dokumente') ?></li>
                            <li <?php if (strpos($url, 'lebenslauf')) echo 'class="selected"' ?>><?php echo link_to('Lebensl.', 'lebenslauf') ?></li>
                            <li <?php if (strpos($url, 'kompetenzen')) echo 'class="selected"' ?>><?php echo link_to('Komp.', 'kompetenzen') ?></li>
                            <li <?php if (strpos($url, 'kompetenzkategorien')) echo 'class="selected"' ?>><?php echo link_to('Kkat.', 'kompetenzkategorien') ?></li>
                            <li <?php if (strpos($url, 'anfragen')) echo 'class="selected"' ?>><?php echo link_to('Anfragen', 'anfragen') ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div id="site_content">
                <div class="sidebar">
                    <!-- insert your sidebar items here -->
                    <?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential('admin')): ?>
                        <h3>Übersicht</h3>
                        <p>Eingeloggt als <strong><?php echo $sf_user->getName() ?></strong><br>Sitzungsende in <strong>14:53</strong></br><?php echo link_to('Ausloggen', 'sf_guard_signout') ?></p>
                        <h3>Newsarchiv</h3>
                        <h4>Stundenliste Sep. 2011</h4>
                        <h5>21. Januar 2011</h5>
                        <p>Hallo Zusammen,<br>die Zeit vergeht schnell und ich muss wiedermal die Stunden abrechnen.</br><a href="#">Read more</a></p>
                    <?php endif; ?>	
                        <h3>Quicklinks</h3>
                        <ul>
                            <li><a href="/frontend_employee_dev.php">frontend_employee_dev</a></li>
                            <li><a href="/frontend_company_dev.php">frontend_company_dev</a></li>
                            <li><a href="/backend_dev.php">backend_dev</a></li>
                        </ul>

                </div>
                <div id="content">
                    <!-- insert the page content here -->
                    <?php if ($sf_user->hasFlash('notice')): ?>
                        <div class="flash_notice">
                            <?php echo $sf_user->getFlash('notice') ?>
                        </div>
                    <?php endif ?>
                    <?php if ($sf_user->hasFlash('error')): ?>
                        <div class="flash_error">
                            <?php echo $sf_user->getFlash('error') ?>
                        </div>
                    <?php endif ?>
                    <?php /*if ($sf_user->isAuthenticated()): ?>
                        <h1>Willkommen <?php echo $sf_user->getName() ?>!</h1>
                    <?php endif;*/ ?>
                    <?php echo $sf_content ?>
                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                Copyright &copy; colour_blue | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
            </div>
        </div>
    </body>
</html>
