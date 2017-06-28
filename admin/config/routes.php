<?php

route()->group('/api', function () {
    route()->get('/posts', 'Admin\\Controller\\PostsController@findPosts');
    route()->get('/posts/{id}', 'Admin\\Controller\\PostsController@findPost');
    route()->post('/posts', 'Admin\\Controller\\PostsController@createPost');
    route()->patch('/posts/{id}', 'Admin\\Controller\\PostsController@patchPost');
    route()->delete('/posts/{id}', 'Admin\\Controller\\PostsController@deletePost');

    //  Extensions APIs
    route()->get('/users/{id}/posts', 'Admin\\Controller\\UserPostsController@findUserPosts');

    route()->get('/users/{id}/{relate}', 'Admin\\Controller\\UserPostsController@findUserRelate');
    route()->post('/users/{id}/{relate}', 'Admin\\Controller\\UserPostsController@createUserRelate');
    route()->delete('/users/{id}/{relate}/{rid}', 'Admin\\Controller\\UserPostsController@removeUserRelate');
});
