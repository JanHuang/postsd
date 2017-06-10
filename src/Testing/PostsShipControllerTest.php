<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use FastD\TestCase;

class PostsShipControllerTest extends TestCase
{
    public function testFindUsersCollectPosts()
    {
        $request = $this->request('GET', '/api/users/1/collects');
        $response = $this->handleRequest($request);
        // echo $response;
    }

    public function testFindUsersLikePosts()
    {
        $request = $this->request('GET', '/api/users/1/likes');
        $response = $this->handleRequest($request);
        // echo $response;
    }

    public function testFindUsersPosts()
    {
        $request = $this->request('GET', '/api/users/1/posts');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
    }

    public function testCreateUserShip()
    {
        $request = $this->request('POST', '/api/users/1/demo');
        $response = $this->handleRequest($request, [
            'user_id' => 1,
            'posts_id' => 1,
        ]);
        $this->equalsStatus($response, 201);
        echo $response;
        $request = $this->request('GET', '/api/users/1/demo');
        $response = $this->handleRequest($request);
        $json = json_decode((string) $response->getBody(), true);
        $this->assertCount(1, $json['data']);
    }
}
