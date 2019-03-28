<?php
  
    include('../airshot.api.class.php');

    /*======================================================
    // LIST USERS
    /=====================================================*/

    /**
     * Gets a list of users in a specific broadcasts. This will 
     * return a list of users that have confirmed their invite
     * on broadcast. A valid broadcast_ID is required.
     */
    
    $airshot = new AirshotClientApi();
    var_dump($airshot->process('broadcasts','participants','post',array(
        'broadcast_ID' => '1'
    )));

?>