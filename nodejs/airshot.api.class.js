'use strict';

const fetch  = require("node-fetch");


    

module.exports = 
    class AirshotClientApi {


        /*======================================================
        // CONSTRUCTOR
        /=====================================================*/

        /**
         * Set the appID, appKey and the apiBase
         */

        constructor() {


            this.api = {
                id   : 'AP33-FGPV-63ON-5973',
                key  : '1de580e2f6f719969f7f07524d72c297.4939418664edab84d5d13fd3aa39849b',
                base : 'https://staging.airshot.io/api/v1/'
            };

        }

        /*======================================================
        // PROCESS TO API
        /=====================================================*/

        /**
         * @method
         * Make a post or get request to the API.
         */
        
        async process(endpoint, method, type = 'get', params = {}) {

            let options = {};
            let url     = `${this.api.base}${endpoint}/${method}/`;

            let auth    = Buffer.from(this.api.id+':'+this.api.key).toString('base64')



            options.headers = {
                'Authorization'             : 'Basic ' + auth,
                'Content-Type'              : 'application/json; charset=utf-8',
                'Upgrade-Insecure-Requests' : '1'
            }

            if (type.toLowerCase() == 'post'){

                options.method = 'POST';
                options.body   = JSON.stringify(params);

            }

            else{

                url += '?'
                let pLength = Object.keys(params).length;

                Object.keys(params).forEach((k,i) => {

                    if (i + 1 < pLength){
                        url += `${encodeURIComponent(k)}=${encodeURIComponent(params[k])}&`;
                    }
                    else{
                        url += `${encodeURIComponent(k)}=${encodeURIComponent(params[k])}`;
                    }

                })

            }


            return new Promise((resolve,reject) => {

                fetch(url, options)
                    .then(response => response.json())
                    .then(json => {

                        if (json.status != 'success'){
                            reject(json.message);
                        }
                        else{
                            resolve(json)
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        reject(error);
                    });



            });
           
            
        }
    }

;
    