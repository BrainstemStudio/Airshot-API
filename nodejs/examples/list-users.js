
  
    let AirshotClientApi = require("../airshot.api.class.js");

    
    /* Create an instance of the Airshot API */
    airshot = new AirshotClientApi();

    /*======================================================
    // LIST USERS
    /=====================================================*/

    /**
     * Gets a list of users in a specific broadcasts. This will 
     * return a list of users that have confirmed their invite
     * on broadcast. A valid broadcast_ID is required.
     */

    async function userList(){

        let response = await airshot.process('broadcasts','participants','post',{
            broadcast_ID : 1
        });

        console.log(response);

    }
    
    userList();


    
    
