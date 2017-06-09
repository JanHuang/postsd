<?php

route()->group('/api', function () {
    route()->get('/posts', 'PostsController@findPosts');
    route()->get('/posts/{id}', 'PostsController@findPost');
    route()->post('/posts', 'PostsController@createPost');
    route()->patch('/posts/{id}', 'PostsController@patchPost');
    route()->delete('/posts/{id}', 'PostsController@deletePost');

    //  Extensions APIs
    route()->get('/users/{id}/posts', 'UserPostsController@findUserPosts');

    route()->get('/users/{id}/{relate}', 'UserPostsController@findUserRelate');
    route()->get('/users/{id}/{relate}/{rid}', 'UserPostsController@findUserLikesPosts');
    route()->post('/users/{id}/{relate}', 'UserPostsController@findUserLikesPosts');
    route()->delete('/users/{id}/{relate}/{rid}', 'UserPostsController@findUserLikesPosts');
});
