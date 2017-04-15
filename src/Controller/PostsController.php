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

class PostsController
{
    public function findPosts(ServerRequest $request)
    {
        $posts = model('posts')->findPosts();

        return json($posts);
    }

    public function findPost(ServerRequest $request)
    {
        $post = model('posts')->findPost($request->getAttribute('id'));

        return json($post);
    }

    public function createPost(ServerRequest $request)
    {
        $post = model('posts')->createPost($request->getParsedBody());

        return json($post, Response::HTTP_CREATED);
    }

    public function patchPost(ServerRequest $request)
    {
        parse_str($request->getBody(), $data);

        $post = model('posts')->patchPost($request->getAttribute('id'), $data);

        return json($post);
    }

    public function deletePost(ServerRequest $request)
    {
        $post = model('posts')->deletePost($request->getAttribute('id'));

        return json([], Response::HTTP_NO_CONTENT);
    }
}