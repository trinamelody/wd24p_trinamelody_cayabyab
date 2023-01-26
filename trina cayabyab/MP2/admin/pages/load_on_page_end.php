<?php
  //in order
  $scripts = [
    "plugins/bower_components/jquery/dist/jquery.min.js", 
    "plugins/bower_components/axios/axios.js", //axios xhttp js
    "bootstrap/dist/js/bootstrap.min.js", //bootstrap core js
    "plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js", //menu plugin js
    "js/jquery.slimscroll.js", //slimscroll js
    "js/waves.js", //waveeffect js
    "js/custom.min.js", //custom theme js
    "plugins/bower_components/styleswitcher/jQuery.style.switcher.js", //style switcher js
    "js/formhelper.js", //form helpers
    "plugins/bower_components/pnotify/pnotify.custom.min.js", //toast
    "plugins/bower_components/blockUI/jquery.blockUI.js", //blockUI
    "plugins/bower_components/moment/moment.js", //moment
  ];

  foreach($scripts as $script){
    echo '<script src="'.$script.'"></script>
    ';
  }

?>