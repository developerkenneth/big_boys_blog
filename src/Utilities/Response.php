<?php

namespace App\Utilities;


class Response
{
    public $statusCode = 200;

    /**
     * @param int $statusCode :
     * @return object ;
     */
    public function setStatusCode(int $statusCode = 200)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function json($data)
    {
        header("Content-Type:application/json");
        // setting response code 
        http_response_code($this->statusCode);
        echo json_encode($data);
    }
}
