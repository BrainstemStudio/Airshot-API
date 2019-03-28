<?php
    include('../airshot.api.class.php');

    /* Create an instance of the Airshot API */
    $airshot = new AirshotClientApi();

    /*======================================================
    // INSERT ROW EXAMPLE
    /=====================================================*/

    /**
     * If we need to insert a row to a specific upload. We
     * can do this by suppling an upload_ID and data as 
     * json string. Whenever processing data it match
     * match a common structure to a previous upload. In
     * inserts we cannot append columns like we can with uploads.
     * 
     * A success returns the following:
     * dataHash {string}, the data hash of the row which we can use to edit.
     * 
     * Tip:
     * You can get the upload ID by hovering over the upload icon
     * under performance.
     * 
     */

    $editRow = $airshot->process('performance','insertrow','post',array(
         'upload_ID' => 1,
         'data'      => json_encode(array(
             'name'   => 'James Doe',
             'e-mail' => 'jamesdoe@example.com',
             'sales'  => 5000,
             'date'   => '2019-03-01'
         ))
     ));


    /*======================================================
    // EDIT ROW EXAMPLE
    /=====================================================*/
    
    /**
     * If we need to edit a specific row in our data we need
     * to have stored the data hash locally (see upload example).
     * For this example we just used the previously inserted row
     * hash.
     * 
     * Just like our upload example we must supply data as 
     * a json string, however we need to explicitly assign
     * the columns to the values. We do not need to provide
     * all columns just the ones we want to edit. In this
     * example we are going to modifiy "Sales" and "Date".
     * 
     * 
     * A success returns the following:
     * {bool}, true of successful.
     * 
     * Note:
     * The column names must match what we originally uploaded with
     * and columns are NOT case senstive.
     * 
     * 
     */


     $rowHash = $editRow['data']['dataHash'];
     $editRow = $airshot->process('performance','editrow','post',array(
         'hash' => $rowHash,
         'data' => json_encode(array(
             'sales' => 29000,
             'date'  => '2019-03-15'
         ))
     ));



    /*======================================================
    // DELTE ROW EXAMPLE
    /=====================================================*/

    /**
     * If we need to delete a row to a specific upload. We
     * can do this by suppling a data hash. For the example
     * we use the above rowhash.
     */

    $deleteRow = $airshot->process('performance','deleterow','post',array(
        'hash' => $rowHash,
    ));


    

?>