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
        if (isset($query['p'])) {
            $page = $query['p'];
        }

        $posts = model('posts')->findPosts($page);

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