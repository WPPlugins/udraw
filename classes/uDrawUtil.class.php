<?php

if (!class_exists('uDrawUtil')) {
    
    class uDrawUtil {
        function __construct() {
        }
        
        function get_web_contents($url, $postData="") {
            if ($postData != "") {
                if (function_exists('curl_version')) {
                    return $this->curl_get_response($url, $postData);
                } else {
                    return $this->fopen_post_request($url, $postData);
                }
            }
            
            if (function_exists('curl_version')) {
                return $this->curl_get_response($url, $postData);
            } else if (ini_get('allow_url_fopen')) {
                if (strlen($postData) > 0) {
                    return file_get_contents($url.'?'.$postData);
                } else {
                    return file_get_contents($url);
                }
            } else {
                return false;
            }
        }
        
        function is_dir_empty($dir) {
            if (!is_readable($dir)) return NULL; 
            $handle = opendir($dir);
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    return FALSE;
                }
            }
            return TRUE;
        }
        
        function download_file($url, $path) {
            //Remove any spaces that may be present
            $url = preg_replace('/\s/', '%20', $url);
            $newfname = $path;
            
            if(!ini_get('allow_url_fopen')) {
                $file = fopen('php://temp', 'w+');
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FILE, $file);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_exec($ch);
                curl_close($ch);

                rewind($file);
            } else {
                $file = fopen ($url, "rb");
            }
            
            if ($file) {
                $newf = fopen ($newfname, "wb");

                if ($newf)
                    while(!feof($file)) {
                        fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
                    }
            }
            if (isset($file) || isset($newf)) {
                if ($file) {
                    fclose($file);
                }

                if ($newf) {
                    fclose($newf);
                }       
            }
        }
        
        function download_file_with_pointer($url, $fp) {
            if(!ini_get('allow_url_fopen')) {
                $file = fopen('php://temp', 'w+');
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FILE, $file);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_exec($ch);
                curl_close($ch);

                rewind($file);
            } else {
                $file = fopen ($url, "rb");
            }
            
            if ($file) {
                while(!feof($file)) {
                    fwrite($fp, fread($file, 1024 * 8 ), 1024 * 8 );
                }
                
                fclose($file);
            }

            return $fp;
        }
        
        function empty_target_folder ($folder_dir) {
            $files = glob($folder_dir.'/*'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
            }
        }
        
        function create_zip_file ($data_array = '', $destination = '', $overwrite = false) {
            //$data_array will contain the array of objects containing the url and intented name of the file to be zipped
            if(file_exists($destination) && !$overwrite) { return false; }
            //Create array to hold pdf files in
            $file_array = array();
            for ($i = 0; $i < count($data_array); $i++) {
                //if current entry in data array has pdf entry and the pdf exists, push into file array
                $data = (object)$data_array[$i];
                if (isset($data->directory) && file_exists($data->directory)) {
                    array_push($file_array, $data);
                }
            }
            if(count($file_array) > 0) {
                //create the archive
                touch($destination);
                $zip = new ZipArchive();
                if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                    return false;
                }
                //add the files
                foreach($file_array as $file) {
                    $zip->addFile($file->directory,$file->name);
                }
                //close the zip -- done!
                $zip->close();
                
                //check to make sure the file exists
                return file_exists($destination);
            } else {
                return false;
            }
        }
        
        private function fsock_get_web_response($protocol, $host, $port, $request) {
            $response = "";
            
            // create and configure the client socket
            $fp = @fsockopen($protocol . $hostname, $port, $errno, $errstr, 30);
            if ($fp) {
                // send request headers
                fwrite($fp, "GET ". $request . " HTTP/1.1\r\n");
                fwrite($fp, "Host: " . $hostname . "\r\n");
                //fwrite($fp, $additional_headers); // Accept, User-Agent, Referer, etc.
                fwrite($fp, "Connection: close\r\n");
                
                // read response
                while (!feof($fp)) {
                    $response .= fgets($fp, 128);
                }
                
                // close the socket
                fclose($fp);
            }
            
            return $response;
        }
        
        private function fsock_post_web_response($protocol, $host, $port, $request, $data) {
            $response = "";
            $fp = @fsockopen($protocol . $host, $port, $errno, $errstr, 30);
            if ($fp) {
                $msg  = 'POST ' . $request .' HTTP/1.1' . "\r\n";
                $msg .= 'Content-Type: application/x-www-form-urlencoded' . "\r\n";
                $msg .= 'Content-Length: ' . strlen($data) . "\r\n";
                $msg .= 'Host: ' . $host . "\r\n";
                $msg .= 'Connection: close' . "\r\n\r\n";
                $msg .= $data;
                if ( fwrite($fp, $msg) ) {
                    while ( !feof($fp) ) {
                        $response .= fgets($fp, 1024);
                    }
                }
                fclose($fp);

            } else {
                $response = false;
            }
            
            return $response;
        }
        
        private function fopen_post_request($url, $postData="") {
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postData
                )
            );
            $context  = stream_context_create($opts);
            $response = file_get_contents($url, false, $context);
            return $response;
        }
        
        private function curl_get_response($url, $postData="") {
            try {
                $ch = curl_init();
                if (FALSE === $ch)
                    throw new Exception('failed to initialize');
                
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_HEADER, 0);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                if (strlen($postData) > 0) {
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                }
                
                $response = curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                if (FALSE === $response || '' === $response)
                    throw new Exception(curl_error($ch), curl_errno($ch));
                
                curl_close($ch);
                return $response;
            }
            catch (Exception $e) {
                error_log(sprintf(
                    'Curl failed with error #%d: %s',
                    $e->getCode(), $e->getMessage()),
                    E_USER_ERROR);
                return false;
                
            }
        }
    }
   
}

?>