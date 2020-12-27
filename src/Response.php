<?php

namespace App;

class Response
{
    public function toResponse(int $responseCode)
    {
        http_response_code($responseCode);
    }
}