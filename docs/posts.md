### 增加资讯

POST /api/posts

```
POST /api/posts

{
    "title": "foo"
}

HTTP/1.1 201 Created

{
    "id": 1,
    "user_id": 1,
    "title": "foo",
    "tag": "posts",
    "type": "posts",
    "is_activated": 1,
    "created_at": "2017-04-04 23:37:33",
    "updated_at": "2017-04-04 23:37:33",
    "is_available": 0
}
```

### 修改资讯

PATCH /api/posts/{id}

```
PATCH /api/posts/{1}

{
    "title": "foo"
}

HTTP/1.1 200 OK

{
    "id": 1,
    "user_id": 1,
    "title": "foo",
    "tag": "posts",
    "type": "posts",
    "is_activated": 1,
    "created_at": "2017-04-04 23:37:33",
    "updated_at": "2017-04-04 23:37:33",
    "is_available": 0
}
```

### 资讯列表

GET /api/posts

```
GET /api/posts

HTTP/1.1 200 OK

[
    {
        "id": 1,
        "user_id": 1,
        "title": "demo",
        "tag": "posts",
        "type": "posts",
        "is_activated": 1,
        "created_at": "2017-04-04 23:37:33",
        "updated_at": "2017-04-04 23:37:33",
        "is_available": 0
    }
]
```

### 获取详情

GET /api/posts/{id}

```
GET /api/posts/1

HTTP/1.1 200 OK

{
    "id": 1,
    "user_id": 1,
    "title": "demo",
    "tag": "posts",
    "type": "posts",
    "is_activated": 1,
    "created_at": "2017-04-04 23:37:33",
    "updated_at": "2017-04-04 23:37:33",
    "is_available": 0
}
```

### 删除资讯

DELETE /api/posts/{id}

```
DELETE /api/posts/1

HTTP/1.1 204 No Content
```
