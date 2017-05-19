<?php

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

/**
 * Class PostsShipController
 * @package Controller
 */
class PostsShipController
{
    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function create(ServerRequest $request)
    {
        $relation = model('postsShip')->create($request->getParsedBody());

        return json($relation, Response::HTTP_CREATED);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function patch(ServerRequest $request)
    {
        parse_str($request->getBody(), $data);

        $relation = model('postsShip')->patch($request->getAttribute('id'), $data);

        return json($relation);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function delete(ServerRequest $request)
    {
        model('postsShip')->delete($request->getAttribute('id'));

        return json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function find(ServerRequest $request)
    {
        $relation = model('postsShip')->find($request->getAttribute('id'));

        return json($relation);
    }

    /**
     * @param ServerRequest $request
     * @return Response
     */
    public function select(ServerRequest $request)
    {
        $relations = model('postsShip')->select();

        return json($relations);
    }
}