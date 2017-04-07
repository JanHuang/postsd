<?php

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

class UserPostsController
{
    public function select(ServerRequest $request)
    {
        $posts = model('posts')->findUserPosts($request->getAttribute('user'));

        return json($posts);
    }
}