<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  
  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="/css/style.css">
  <!-- end CSS-->
  <?php include_stylesheets() ?>

  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="/js/modernizr-2.0.6.min.js"></script>
  <script type="text/javascript">
  //<![CDATA[
  // comes first of all
  var app = '<?php echo url_for('default'); ?>';
  //]]>
  </script>   
  <!-- move js to bottom -->     
  <?php include_javascripts() ?>
</head>

<body>

  <div id="container">
    <div id="dialog" title="Ihr Sitzung läuft aus!">
        <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>
        Sie werden in <span id="dialog-countdown" style="font-weight:bold"></span> Sekunden automatisch ausgeloggt.
        </p>

        <p>Wollen Sie Ihre Sitzung fortführen?</p>
    </div>

    <header id="header">
      <div id="logo">
          <div id="logo_text">
              <!-- class="logo_colour", allows you to change the colour of the text -->
              <h1><a href="<?php echo url_for('homepage') ?>">Anker<span class="logo_colour">Services</span></a></h1>
              <h2>Oberfläche für Angestellte</h2>
          </div>
      </div>
      <div id="menubar">
          <ul id="menu">
              <?php if ($sf_user->isAuthenticated()): ?>
                  <?php $url = $_SERVER['REQUEST_URI'] ?>
                  <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                  <li class="<?php if ($url == '/frontend_employee.php/') echo "selected" ?>"><a href="<?php echo url_for('homepage') ?>">Home</a></li>
                  <li class="<?php if (strpos($url, 'verfuegbarkeit')) echo "selected" ?>"><a href="<?php echo url_for('verfuegbarkeit/index') ?>">Verfügbarkeit</a></li>
                  <li class="<?php if (strpos($url, 'kompetenzen')) echo "selected" ?>"><a href="<?php echo url_for('kompetenzen/index') ?>">Kompetenzen</a></li>
                  <li class="<?php if (strpos($url, 'lebenslauf')) echo "selected" ?>"><a href="<?php echo url_for('lebenslauf/index') ?>">Lebenslauf</a></li>
                  <li class="<?php if (strpos($url, 'dokumente')) echo "selected" ?>"><a href="<?php echo url_for('dokumente/index') ?>">Dokumente</a></li>
                  <li class="<?php if (strpos($url, 'adressen')) echo "selected" ?>"><a href="<?php echo url_for('adressen/index') ?>">Adressen</a></li>
                  <?php if ($sf_user->getProfile()->getProfilId() != NULL): ?>
                      <li class="<?php if (strpos($url, 'profil')) echo "selected" ?>"><a href="<?php echo url_for('profil/show?profil_id=' . $sf_user->getProfile()->getProfilId()) ?>">Profil</a></li>
                  <?php else: ?>
                      <li class="<?php if (strpos($url, 'profil')) echo "selected" ?>"><a href="<?php echo url_for('profil/new') ?>">Profil</a></li>
                  <?php endif; ?>
              <?php endif; ?>
          </ul>
      </div>
    </header>
    <div id="main" role="main">
        <div id="site_content">
          <div class="sidebar">
              <!-- insert your sidebar items here -->
              <?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential('student')): ?>
                  <h3>Übersicht</h3>
                  <p>Eingeloggt als <strong><?php echo $sf_user->getName() ?></strong>
                    <!-- Sitzungsende in <strong>14:53</strong></br> --><br>
                    <?php echo link_to('Ausloggen', 'sf_guard_signout') ?></p>
                  <!-- <h3>Newsarchiv</h3>
                  <h4>Stundenliste Sep. 2011</h4>
                  <h5>21. Januar 2011</h5>
                  <p>Hallo Zusammen,<br>die Zeit vergeht schnell und ich muss wiedermal die Stunden abrechnen.</br><a href="#">Read more</a></p> -->
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
              <p id="jsnotice">
                Javascript is currently disabled. This site requires Javascript to function correctly.
                Please <a href="http://enable-javascript.com/"> enable Javascript in your browser</a>!
              </p>
              <?php echo $sf_content ?>
          </div>
      </div>
    </div>
    <footer>

    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->


  <!-- scripts concatenated and minified via ant build script-->
  <!-- <script defer src="js/plugins.js"></script>-->
  <!-- <script defer src="js/script.js"></script>-->
  <!-- end scripts-->

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>

