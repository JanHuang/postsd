<?php

namespace Controller;


use FastD\Http\ServerRequest;

/**
 * Class UserPostsController
 * @package Controller
 */
class UserPostsController
{
    public function findUserCollectsPosts(ServerRequest $request)
    {
        $userId = $request->getAttribute('id');
        $likePosts = model('PostsShip')->findUsersPostsRelation($userId, 'collects');
        return json($likePosts);
    }

    public function removeUserCollectsPosts()
    {

    }

    public function findUserLikesPosts(ServerRequest $request)
    {
        $userId = $request->getAttribute('id');
        $likePosts = model('PostsShip')->findUsersPostsRelation($userId, 'likes');
        return json($likePosts);
    }

    public function removeUserLikesPosts(ServerRequest $request)
    {

    }

    public function findUserPosts(ServerRequest $request)
    {
        $posts = model('posts')->findUserPosts($request->getAttribute('id'));

        return json($posts);
    }
}