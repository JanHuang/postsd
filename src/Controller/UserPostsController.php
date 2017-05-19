<?php

namespace Controller;


use FastD\Http\ServerRequest;

/**
 * Class UserPostsController
 * @package Controller
 */
class UserPostsController
{
    /**
     * @param ServerRequest $request
     * @return \FastD\Http\Response
     */
    public function findUserCollectsPosts(ServerRequest $request)
    {
        $userId = $request->getAttribute('id');
        $likePosts = model('PostsShip')->findUsersPostsRelation($userId, 'collects');
        return json($likePosts);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\Response
     */
    public function removeUserCollectsPosts(ServerRequest $request)
    {

    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\Response
     */
    public function findUserLikesPosts(ServerRequest $request)
    {
        $userId = $request->getAttribute('id');
        $likePosts = model('PostsShip')->findUsersPostsRelation($userId, 'likes');
        return json($likePosts);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\Response
     */
    public function removeUserLikesPosts(ServerRequest $request)
    {

    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\Response
     */
    public function findUserPosts(ServerRequest $request)
    {
        $posts = model('posts')->findUserPosts($request->getAttribute('id'));

        return json($posts);
    }
}