
  
    let AirshotClientApi = require("../airshot.api.class.js");

    /* Create an instance of the Airshot API */
    airshot = new AirshotClientApi();

    /*======================================================
    // DOWNLOAD PERFORMANCE EXAMPLE
    /=====================================================*/

    /**
     * Download performance from a broadcasts will retrive
     * all uploads. We must supply a Broadcast_ID which can be 
     * retrived from the broadcast->list endpoint. We can optional
     * also provide a sheet_ID to retrive a specific upload.
     * 
     * Accepted paramaters:
     * broadcast_ID {int} required, a unqiue ID of a broadcast, can be retrived from broadcast->list endpoint
     * sheet_ID    {int} optional, a unique ID returned when uploading data.
     * 
     * A success returns the following:
     * broadcast_ID {int}, the broadcast this data was download from.
     * uploads    {array}, an array of uploads with an sheet_ID as the key.
     * 
     * Row data will be assigned a data hash key which you can use to edit
     * a specific row.
     * 
     * You can also edit and entire data set and upload the whole
     * data again to the sheet_ID.
     * 
     * Tip:
     * You can get the upload ID by hovering over the upload icon
     * under performance.
     */
    
    let sheet_ID = 1;

    async function downloadPerformance(){

        let response = await airshot.process('performance','download','post',{
            broadcast_ID : 45,
        });


        if (response.status == 'success'){

            Object.keys(response.data.uploads).forEach(u => {

                console.log('Upload ID = ' + u);
                console.log(response.data.uploads[u]);
                
            })

        }

    }

    downloadPerformance();



    /*======================================================
    // OVERWRITE ENTIRE UPLOAD
    /=====================================================*/

    /**
     * If we need to replace the upload with completely new
     * data. We can do this by repeating the upload example.
     * except this time we suppliy an sheet_ID. This 
     * will clear all data in the upload and replace it 
     * with new data. The data must still follow a common
     * structure.
     */


    async function overwritePerformance(){


        /* Create a data object */
        data = [];

        /* Create the headers */
        data[0] = ['Date','Name','E-mail','Sales','Rating'];


        /* Create some rows of data */
        data[1] = ['2019-03-01','John Smith','johnsmith@example.com',10000,5];
        data[2] = ['2019-03-01','Sally Doe','sallydoe@example.com',5000,3];
        data[3] = ['2019-03-02','Sally Doe','sallydoe@example.com',7500,2];
        data[4] = ['2019-03-02','Mark Jack','markjack@example.com',9000,1];

        let response = await airshot.process('performance','upload','post',{
            broadcast_ID : 1,
            kpiIndicator : 'Sales',
            data         : JSON.stringify(data),
            sheet_ID    : sheet_ID, // Must be included to overwrite
            name         : 'API Upload 1 (Overwrite)',
        });

        console.log(response);

    }

    //overwritePerformance();

    

    /*======================================================
    // DELETE AN UPLOAD
    /=====================================================*/


    async function deletePerformance(){

        let response = await airshot.process('performance','remove','post',{
            sheet_ID : sheet_ID
        });

        console.log(response);

    }

    //deletePerformance();


    

    
    
