<?php

namespace App\Http\Constants;
    class Response{
        public static function jsonResponse($message, $body, $httpCode){
            return response()->json([
                "message" => $message,
                "body" => $body
            ],$httpCode);
        } 
    }
?>