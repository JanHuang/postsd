<?php

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

class PostsShipController
{
    public function create(ServerRequest $request)
    {
        $relation = model('postsShip')->create($request->getParsedBody());

        return json($relation, Response::HTTP_CREATED);
    }

    public function patch(ServerRequest $request)
    {
        parse_str($request->getBody(), $data);

        $relation = model('postsShip')->patch($request->getAttribute('id'), $data);

        return json($relation);
    }

    public function delete(ServerRequest $request)
    {
        model('postsShip')->delete($request->getAttribute('id'));

        return json([], Response::HTTP_NO_CONTENT);
    }

    public function find(ServerRequest $request)
    {
        $relation = model('postsShip')->find($request->getAttribute('id'));

        return json($relation);
    }

    public function select(ServerRequest $request)
    {
        $relations = model('postsShip')->select();

        return json($relations);
    }
}