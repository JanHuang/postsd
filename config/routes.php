<?php

route()->group('/api', function () {
    route()->get('/posts', 'PostsController@findPosts');
    route()->get('/posts/{id}', 'PostsController@findPost');
    route()->post('/posts', 'PostsController@createPost');
    route()->patch('/posts/{id}', 'PostsController@patchPost');
    route()->delete('/posts/{id}', 'PostsController@deletePost');
    route()->get('/posts/newest', 'NewestController@findNewest');
    route()->get('/posts/tags/{tag}', 'TagPostsController@select');
    route()->get('/posts/users/{id}', 'UserPostsController@findUserPosts');
    route()->get('/posts/users/{id}/likes', 'UserPostsController@findUserLikesPosts');
    route()->delete('/posts/users/{id}/likes', 'UserPostsController@findUserLikesPosts');
    route()->get('/posts/users/{id}/collects', 'UserPostsController@findUserCollectsPosts');
    route()->delete('/posts/users/{id}/collects', 'UserPostsController@findUserCollectsPosts');
});
