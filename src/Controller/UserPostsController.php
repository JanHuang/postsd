<?php

namespace Controller;


use FastD\Http\ServerRequest;

class UserPostsController
{
    public function findUserCollectsPosts(ServerRequest $request)
    {
        $userId = $request->getAttribute('id');
        $likePosts = model('PostsShip')->findUsersPostsRelation($userId, 'likes');
        return json($likePosts);
    }

    public function findUserLikesPosts(ServerRequest $request)
    {
        return json([
            'foo' => 'bar'
        ]);
    }

    public function findUserPosts(ServerRequest $request)
    {
        $posts = model('posts')->findUserPosts($request->getAttribute('id'));

        return json($posts);
    }
}