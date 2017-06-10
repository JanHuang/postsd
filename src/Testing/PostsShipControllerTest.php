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
        echo $response;
    }

    public function testFindUsersLikePosts()
    {
        $request = $this->request('GET', '/api/users/1/likes');
        $response = $this->handleRequest($request);
        echo $response;
    }

    public function findUsersPosts()
    {
        $request = $this->request('GET', '/api/users/1');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 200);
    }
}
