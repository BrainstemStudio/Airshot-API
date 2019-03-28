<?php
    include('../airshot.api.class.php');

     

    /*======================================================
    // UPLOAD PERFORMANCE EXAMPLE
    /=====================================================*/

    /**
     * This example illustrates how to upload performance data to
     * airshot. Data upload must be sent as a json string and 
     * be less than 1000 "rows" including the header. Subsequent
     * data uploads must also follow a common structure. To 
     * read more about data uploads on Airshot please see our guides
     * https://airshot.io/help/
     */


    /* Create an instance of the Airshot API */
    $airshot = new AirshotClientApi();


    /**
     * Prepare performance data. This example builds the data 
     * statically, but depending on our case we might use
     * a database instead.
     * 
     * The data structure must be in an array of "rows" with
     * the first row being the "columns
     */

    /* Create a data object */
    $data = array();

    /* Create the headers */
    $data[0] = array('Date','Name','E-mail','Sales');


    /* Create some rows of data */
    $data[1] = array('2019-03-01','John Smith','johnsmith@example.com',10000);
    $data[2] = array('2019-03-01','Sally Doe','sallydoe@example.com',5000);
    $data[3] = array('2019-03-02','Sally Doe','sallydoe@example.com',7500);
    $data[4] = array('2019-03-02','Mark Jack','markjack@example.com',9000);

    
    
    /**
     * When we upload the data to the Broadcast. We must supply
     * a Broadcast_ID which can be retrived from the broadcast->list endpoint.
     * We must also supply an "kpiIndicator" which tells Airshot which "column"
     * in our data it must analyse for performance rankings.
     * 
     * broadcast_ID {int} (required)
     * kpiIndicator {string} (required)
     * data         {json} (required)
     * name         {string} (optional, defaults to todays date)
     * 
     */

    /* Upload Data */

    /**
     * NOTE: Data uploads are relatively quick on small data but on larger
     * sets where there are 10 "columns" and 1000 "rows" it can take up to
     * 20 - 30 seconds to process. The reasons for this is that Airshot
     * checks e-mails to assign data to existing users as well as looks
     * up locations to assigned to data to GPS positions.
     */

    $newUpload = $airshot->process('performance','upload','post',array(
        'broadcast_ID' => 1,
        'kpiIndicator' => 'Sales',
        'data'         => json_encode($data),
        'name'         => 'API Upload 1',
    ));


    /* Check for errors */
    if ($newUpload['status'] == 'error'):

        print "An Error Occurred.";
        print $newUpload['message'];
        exit();

    endif;
        

    /**
     * If we planning on editing this data later we can store the row hashes that
     * Airshot returns when the upload was successful. We can then store these
     * hashes with our localdatabse and use the performance->edit enpoint to 
     * modify the specific row. If we are planning on deleting or overwritting
     * the entire upload, we should also store the upload_ID.
     * 
     * A success returns the following:
     * broadcast_ID {int}, the broadcast this data was uploaded to.
     * upload_ID    {int}, the unique ID that this upload was store as.
     * dataPoints   {array}, an array of data hashes that are unique to each "row" we uploaded.
     */

    
     /**
      * Optionally store upload_ID for deletion an overwrite calls.
      */


     $upload_ID  = $newUpload['data']['upload_ID'];


     /**
      * Optional Store the row hashes to edit specific rows later.
      */

     $dataPoints = $newUpload['data']['dataPoints'];


     foreach($dataPoints as $row => $hash){

        /* Ignore "Row 0" as this is just the header */
        if ($row == 'Row 0'){
            continue;
        }

        /* Store the hash locally */
        

     }

    



    

?>