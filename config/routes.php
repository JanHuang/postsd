<?php

route()->group('/api', function () {
    route()->get('/posts', 'PostsController@findPosts');
    route()->post('/posts', 'PostsController@createPost');
    route()->get('/posts/{id}', 'PostsController@findPost');
    route()->patch('/posts/{id}', 'PostsController@patchPost');
    route()->delete('/posts/{id}', 'PostsController@deletePost');
    route()->get('/posts/user/{user}', 'UserPostsController@select');
    route()->get('/posts/tag/{tag}', 'TagPostsController@select');
});
