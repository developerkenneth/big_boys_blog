<?php

namespace App\Controller\Api;

use App\Models\Blog;
use App\Utilities\Response;

class ApiBlogController
{
    // it shows all the resources
    public function index()
    {

        $response = new Response();
        $blog = new Blog;
        $blogs = $blog->all('blogs');
        $response->setStatusCode(200)->json($blogs);
        return;
    }

    // shows a single resource
    public function show() {}

    //  show the create form a new resource
    public function store()
    {
        $response = new Response();

        // receiving json encoded datas 

        $raw_data  = file_get_contents("php://input");
        $datas = json_decode($raw_data, true);
        var_dump($datas);

        // stopped here
    }

    // update a single resource
    public function update() {}
}
