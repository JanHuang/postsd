<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

/**
 * Class PostsController
 * @package Controller
 */
class PostsController
{
    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function findPosts(ServerRequest $request)
    {
        $query = $request->getQueryParams();
        $page = 1;
        $limit = 15;
        $userId = null;
        $type = null;
        $tag = null;
        $relation = null;
        if (isset($query['p'])) {
            $page = $query['p'];
        }
        if (isset($query['limit'])) {
            $limit = (int) $query['limit'];
        }
        if (isset($query['user_id'])) {
            $userId = (int) $query['user_id'];
        }
        if (isset($query['type'])) {
            $type = $query['type'];
        }
        if (isset($query['tag'])) {
            $tag = $query['tag'];
        }
        if (isset($query['relation'])) {
            $relation = $query['relation'];
        }

        $posts = model('posts')->findPosts($page, $limit, $userId, $type, $tag, $relation);

        return json($posts);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function findPost(ServerRequest $request)
    {
        $userId = $request->getHeaderLine('x-user-id');

        $post = model('posts')->findPost($request->getAttribute('id'), $userId);

        if (false === $post) {
            abort(404, sprintf('Posts %s is not found', $request->getAttribute('id')));
        }

        return json($post);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function createPost(ServerRequest $request)
    {
        $post = model('posts')->createPost($request->getParsedBody());

        return json($post, Response::HTTP_CREATED);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function patchPost(ServerRequest $request)
    {
        parse_str($request->getBody(), $data);

        $post = model('posts')->patchPost($request->getAttribute('id'), $data);

        return json($post);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function deletePost(ServerRequest $request)
    {
        model('posts')->deletePost($request->getAttribute('id'));

        return json([], Response::HTTP_NO_CONTENT);
    }
}