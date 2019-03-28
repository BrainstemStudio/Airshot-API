<?php
  
    include('../airshot.api.class.php');

    /*======================================================
    // ANALYTICS FULL EXAMPLES
    /=====================================================*/

    /**
     * The analytical API allows us to pull graph data from
     * various aspects of a Broadcast. The following analytics
     * are available:
     * 
     * Focus: Analytics added to the focus section.
     * Insight: Analytics added to the insight section.
     * Analysis: Analytics added to the insight analysis section.
     * Dashboard: Analytics added to a participants dashboard (user_ID required).
     * 
     * 
     * Helpful hints:
     * The data pull from these analytics is already structured into graph
     * plots. This makes it easy if you wish to create your own graphs
     * using a library of your choice.
     * 
     * Most analytics will return a "graph" object that contains an 
     * array of labels and an array of series.
     * 
     * The response will also contain a hash change, this hash
     * will only update when something has infact changed. This
     * is useful if you want to update your graphs only when something
     * has changed.
     * 
     */

    

    /* Create an instance of the Airshot API */
    $airshot = new AirshotClientApi();

    
    /**
     * Focus analytics broadcast_ID is required.
     */

    $focus = $airshot->process('analytics','focus','post',array(
        'broadcast_ID' => '1'
    ));

    //var_dump($focus);

    /**
     * Insight analytics broadcast_ID is required.
     */

    $insight = $airshot->process('analytics','insight','post',array(
        'broadcast_ID' => '1'
    ));

    //var_dump($insight);


    /**
     * Insight analytics broadcast_ID is required.
     */

    $analysis = $airshot->process('analytics','analysis','post',array(
        'broadcast_ID' => '1'
    ));

    //var_dump($analysis);


    /**
     * Participants dashboard broadcast_ID and user_ID is required.
     */

    $participantDashboard = $airshot->process('analytics','dashboard','post',array(
        'broadcast_ID' => '1',
        'user_ID'      => '1'
    ));

    var_dump($participantDashboard);
?>