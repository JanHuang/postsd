<?php

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

/**
 * Class UserPostsController
 * @package Controller
 */
class UserPostsController
{
    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function findUserRelate(ServerRequest $request)
    {
        $userId = $request->getAttribute('id');
        $relate = $request->getAttribute('relate');
        $query = $request->getQueryParams();
        $page = isset($query['p']) ? (int) $query['p'] : 1;
        $limit = isset($query['limit']) ? (int) $query['limit'] : 15;

        $posts = model('PostsShip')->findUsersPostsRelation($userId, $relate, $page, $limit);
        return json($posts);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\Response
     */
    public function removeUserRelate(ServerRequest $request)
    {
        model('PostsShip')->delete($request->getAttribute('rid'));

        return json([
            'status' => 'ok'
        ]);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\Response
     */
    public function findUserPosts(ServerRequest $request)
    {
        $query = $request->getQueryParams();
        $page = isset($query['p']) ? (int) $query['p'] : 1;
        $limit = isset($query['limit']) ? (int) $query['limit'] : 15;

        $posts = model('posts')->findUserPosts($request->getAttribute('id'), $page, $limit);

        return json($posts);
    }
}