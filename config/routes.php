<?php

route()->group('/api', function () {
    route()->get('/posts', 'PostsController@findPosts');
    route()->post('/posts', 'PostsController@createPost');
    route()->get('/posts/{id}', 'PostsController@findPost');
    route()->patch('/posts/{id}', 'PostsController@patchPost');
    route()->delete('/posts/{id}', 'PostsController@deletePost');
    route()->get('/posts/tags/{tag}', 'TagPostsController@select');
    route()->get('/posts/users/{id}', 'UserPostsController@findUserPosts');
    route()->get('/posts/users/{id}/likes', 'UserPostsController@findUserLikesPosts');
    route()->get('/posts/users/{id}/collects', 'UserPostsController@findUserCollectsPosts');
    route()->post('/posts/relates', 'PostsShipController@create');
    route()->delete('/posts/relates/{id}', 'PostsShipController@delete');
});
