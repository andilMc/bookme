<?php
namespace core\Http;

use function PHPSTORM_META\type;

class HttpRequest{

    public function get(string $url,$data=null, $header=['Content-type: application/x-www-form-urlencoded'])
    {
  

            $curl = curl_init();
             if (is_array($data)) {
                
                $data = ($data==null) ? null :http_build_query($data);

            }


            $getUrl = ($data==null) ? $url : $url."?".$data;
        
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

            if ($data==null) {
                $getUrl = $url;
                curl_setopt($curl, CURLOPT_URL, $getUrl);
            }else {
                    $getUrl = $url."?".$data;
                curl_setopt($curl, CURLOPT_URL, $getUrl);
            }
            curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
            curl_setopt($curl, CURLOPT_TIMEOUT, 5);
            
            $response = curl_exec($curl);
                
            if(curl_error($curl)){
                return null;
            }else{
                curl_close($curl);
                return $response;
            }
            
    }

    public function post(string $url ,$data=null,$header=['Content-type: application/x-www-form-urlencoded'])
    {
            // A sample PHP Script to POST data using cURL 
            if (is_array($data)) {

                $data = ($data==null) ? null :http_build_query($data);

            }

            
            var_dump($data);
            // Prepare new cURL resource
            $curl = curl_init($url);
            
            //for debug only!
     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);
            if ($data!=null) {
                 $post_data = json_encode($data);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
            }
            curl_setopt($curl, CURLOPT_TIMEOUT, 5);
            
            curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
            $result = curl_exec($curl);
            
            if(curl_error($curl)){
                return null;
            }else{
                curl_close($curl);
                return $result;
            }
    }

    public function delete(string $url, $data=null, $header=['Content-type: application/x-www-form-urlencoded'])
    {
         if (is_array($data)) {
                
                $data = ($data==null) ? null :http_build_query($data);

            }

        $curl = curl_init();

        //for debug only!
     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
        curl_setopt($curl, CURLOPT_URL, $url);
    
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        if ($data!=null) {

            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
           
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
     

        $result = curl_exec($curl);
        if(curl_error($curl)){
            return null;
        }else{
            curl_close($curl);
            return $result;
        }
    }

    public function put(string $url, $data=null, $header=['Content-type: application/x-www-form-urlencoded'])
    {
         if (is_array($data)) {
                
                $data = ($data==null) ? null :http_build_query($data);

            }
        
        $curl = curl_init($url);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

          if ($data!=null) {
            
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
           
        }

        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        

        $resp = curl_exec($curl);
        
        if(curl_error($curl)){
            return curl_error($curl);
        }else{
            curl_close($curl);
            return $resp;
        }
    }
}