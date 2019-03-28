
  
    let AirshotClientApi = require("../airshot.api.class.js");

    /* Create an instance of the Airshot API */
    airshot = new AirshotClientApi();

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
    
    let broadcast_ID = 1;

    /**
     * Focus analytics broadcast_ID is required.
     */

    async function getFocusAnalytics(){

        let response = await airshot.process('analytics','focus','post',{
            broadcast_ID : 1
        });

        console.log(response);

    }

    getFocusAnalytics();


    /**
     * Insight analytics broadcast_ID is required.
     */

    async function getInsightAnalytics(){

        let response = await airshot.process('analytics','insight','post',{
            broadcast_ID : 1
        });

        console.log(response);

    }

    getInsightAnalytics();

    /**
     * Analysis analytics broadcast_ID is required.
     */

    async function getAnalysisAnalytics(){

        let response = await airshot.process('analytics','analysis','post',{
            broadcast_ID : 1
        });

        console.log(response);

    }

    getAnalysisAnalytics();

    /**
     * Participants analytics broadcast_ID & user_ID is required.
     */

    async function getParticipantsAnalytics(){

        let response = await airshot.process('analytics','dashboard','post',{
            broadcast_ID : 1,
            user_ID      : 1
        });

        console.log(response);

    }

    getParticipantsAnalytics();

    

    
    
