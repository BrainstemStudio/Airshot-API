<?php

    ini_set('display_errors', 1);
	error_reporting(E_ALL);
  
    class AirshotClientApi{


        /*======================================================
        // PROPERTIES
        /=====================================================*/

        /**
         * Set the appID, appKey and the apiBase
         */

        private $appID     = 'AP33-FGPV-63ON-5973';
        private $appKey    = '1de580e2f6f719969f7f07524d72c297.4939418664edab84d5d13fd3aa39849b';
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

            $response = curl_exec($ch); 
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

            curl_close($ch); 

            return json_decode($response,1);


        }

        

    }

?>