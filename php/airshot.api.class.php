<?php

  
    class AirshotClientApi{


        /*======================================================
        // PROPERTIES
        /=====================================================*/

        /**
         * Set the appID, appKey and the apiBase
         */

        private $appID     = '<API ACCOUNT ID>';
        private $appKey    = '<API ACCOUNT KEY>';
        private $apiBase   = 'https://staging.airshot.io/api/v1/';

        

        /*======================================================
        // PROCESS TO API
        /=====================================================*/

        /**
         * @method
         * Make a post or get request to the API.
         */

        public function process(string $endpont, string $method, string $type = 'get', array $params = array()){


            
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_USERPWD , $this->appID.':'.$this->appKey); 
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Language: en',
                'Content-Type: application/json',
                'Upgrade-Insecure-Requests: 1'
            )); 

            if ($type == 'get'):

                curl_setopt($ch, CURLOPT_URL, $this->apiBase.$endpont.'/'.$method.'?'.http_build_query($params)); 

            else:

                curl_setopt($ch, CURLOPT_URL, $this->apiBase.$endpont.'/'.$method);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params)); 

            endif;

            
            curl_setopt($ch, CURLOPT_TIMEOUT, 360); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

            $body     = curl_exec($ch); 
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

            curl_close($ch); 

            $response = json_decode($body,1);

            
            /* Check for errors */
            if ($response['status'] == 'error'):

                print "An error occurred on ".$this->apiBase.$endpont.'/'.$method.".<br />";
                print $response['message'];
                exit();

            endif;

            return json_decode($response,1);


        }

        

    }

?>