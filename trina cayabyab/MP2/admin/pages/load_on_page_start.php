<?php
  //in order
  $csses = [
    "bootstrap/dist/css/bootstrap.min.css", //bootstrap core
    "plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css", //menu
    "plugins/bower_components/pnotify/pnotify.custom.min.css", //toast css
    "css/animate.css", //animate
    "css/style.css", //custom css
  ];

  foreach($csses as $css){
    echo '<link href="'.$css.'" rel="stylesheet">
    ';
  }

?>

    <link href="css/colors/megna.css" id="theme" rel="stylesheet">