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
use FastD\TestCase;

class PostsControllerTest extends TestCase
{
    public function testSelectPostsList()
    {
        $request = $this->request('GET', '/api/posts');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
    }

    public function testFindPosts()
    {
        $request = $this->request('GET', '/api/posts/1');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
    }

    public function testNotFoundPosts()
    {
        $request = $this->request('GET', '/api/posts/100');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 404);
    }

    public function testHasUserPosts()
    {
        $request = $this->request('GET', '/api/posts/1', [
            'x-user-id' => 1
        ]);
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
        $json = json_decode((string) $response->getBody(), true);
        $this->assertEquals(1, $json['is_liked']);
        $this->assertEquals(1, $json['is_collected']);
    }

    public function testTagsPosts()
    {
        $request = $this->request('GET', '/api/posts');
        $response = $this->handleRequest($request, ['tag' => 'posts']);
        $this->equalsStatus($response, 200);
        $request = $this->request('GET', '/api/posts');
        $response = $this->handleRequest($request, ['tag' => 'empty']);
        $this->equalsJson($response, ['data' => [], 'limit' => 15, 'offset' => 0, 'total' => 0, ]);
    }

    public function testUserPosts()
    {
        $request = $this->request('GET', '/api/users/1/posts');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
        $request = $this->request('GET', '/api/users/2/posts');
        $response = $this->handleRequest($request);
        $this->equalsJson($response, ['data' => [], 'limit' => 15, 'offset' => 0, 'total' => 0, ]);
    }

    public function testCreatePosts()
    {
        $request = $this->request('POST', '/api/posts');
        $response = $this->handleRequest($request, [
            'id' => 2,
        ]);
        $this->equalsStatus($response, 201);
    }

    public function testCreatePostsContent()
    {
        $request = $this->request('POST', '/api/posts');
        $response = $this->handleRequest($request, [
            'id' => 2,
            'content' => [
                'hello world2',
                'abc',
                "http://img.hb.aicdn.com/532e242b7abb7aaf8b49b635e0e2070e98d20f393c023-kH7HCQ_fw658"
            ]
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
}
