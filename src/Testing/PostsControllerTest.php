<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use FastD\Http\Response;
use FastD\Test\TestCase;

class PostsControllerTest extends TestCase
{
    public function testPostsList()
    {
        $request = $this->request('GET', '/api/posts');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
    }

    public function testCreatePosts()
    {
        $request = $this->request('POST', '/api/posts');
        $response = $this->handleRequest($request, [
            'id' => 2,
        ]);
        $this->equalsStatus($response, 201);
    }

    public function testPatchPosts()
    {
        $request = $this->request('PATCH', '/api/posts/1');
        $response = $this->handleRequest($request, [
            'user_id' => '2'
        ]);
        $this->equalsStatus($response, 200);
    }

    public function testDeletePosts()
    {
        $request = $this->request('DELETE', '/api/posts/1');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, Response::HTTP_NO_CONTENT);
    }

    public function testTagsPosts()
    {
        $request = $this->request('GET', '/api/posts/tag/posts');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
    }

    public function testUserPosts()
    {
        $request = $this->request('GET', '/api/posts/user/1');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
    }
}
