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

        private $appID     = 'EV11-IQWZ-84BA-8805';
        private $appKey    = '867a07c27c3f61ac9f175360d884b216.118b0fdf8f4492392291d269ffc37954';
        private $apiBase   = 'http://localhost/api/v1/';


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