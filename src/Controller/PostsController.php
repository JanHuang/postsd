<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Controller;


use FastD\Http\ServerRequest;

class PostsController
{
    public function findPosts(ServerRequest $request)
    {
        return json([
            'msg' => 'hello dobee',
        ]);
    }

    public function findPost(ServerRequest $request)
    {}

    public function createPost()
    {}

    public function patchPost()
    {}

    public function deletePost()
    {}
}