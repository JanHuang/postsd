<?php

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

class TagPostsController
{
    public function select(ServerRequest $request)
    {
        $posts = model('posts')->findTagPosts($request->getAttribute('tag'));

        return json($posts);
    }
}