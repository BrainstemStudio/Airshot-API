
  
    let AirshotClientApi = require("../airshot.api.class.js");

    /* Create an instance of the Airshot API */
    airshot = new AirshotClientApi();

    /*======================================================
    // NOTES
    /=====================================================*/

    /**
     * The api calls are done with a promise so that 
     * async / await methods can be used instead of
     * complicated callbacks. Additionally you can
     * extract the airshot.api.class.js to use in a 
     * web app. JUST REMEMBER to lock down your IP
     * with domain restrictions.
     */

    


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

    
    async function broadcastList(){


        let response = await airshot.process('broadcasts','list');

        console.log(response);

    }

    broadcastList();


    

    
    
