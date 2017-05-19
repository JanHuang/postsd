<?php

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

/**
 * Class TagPostsController
 * @package Controller
 */
class TagPostsController
{
    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function select(ServerRequest $request)
    {
        $posts = model('posts')->findTagPosts($request->getAttribute('tag'));

        return json($posts);
    }
}