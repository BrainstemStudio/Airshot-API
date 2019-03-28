<?php
  
    include('../airshot.api.class.php');

    /**
     * Test that the api account is valid and returns
     * name and api permissions.
     */
    
    $airshot = new AirshotClientApi();
    var_dump($airshot->process('account','validate'));

?>