<?php
  
    include('../airshot.api.class.php');

    /*======================================================
    // LIST BROADCASTS
    /=====================================================*/

    /**
     * Gets a list of broadcasts. This will return a list of 
     * broadcasts that are Planned, In Progress OR Completed.
     * This will also give us a unqiue IDs for each broadcast
     * to use with analytics and performance.
     * 
     * Tip: You can also get the broadcast_ID manually in 
     * broadcast manager by hovering over the icon.
     *
     */
    
    $airshot = new AirshotClientApi();
    var_dump($airshot->process('broadcasts','list'));

?>