## 用户关系扩展 API

在用户登录情况，会默认以用户id作为关联中心，通过用户id进行用户文章的操作处理。

### 增加资讯

GET /api/users/:user_id/posts

```
GET /api/users/1/posts

HTTP/1.1 200 OK

{
  "data": [
    {
      "id": "1",
      "user_id": "1",
      "title": "demo",
      "tag": "posts",
      "type": "posts",
      "is_activated": "1",
      "created_at": "2017-04-04 23:37:33",
      "updated_at": "2017-04-04 23:37:33",
      "is_available": "0"
    }
  ],
  "limit": 15,
  "offset": 0,
  "total": 1
}
```

### 用户关系

GET /api/users/:user_id/:relate

此处 `relate` 用以区分关系类型，根据自身业务定制，可能是收藏(collections), 可能是点赞(likes)，可能是其他(other) 等等......

在创建关系信息的时候进行关联，获取的时候根据关联信息获取即可。

```
GET /api/users/1/collects

HTTP/1.1 200 OK

{
  "data": [
    {
      "id": "1",
      "user_id": "1",
      "title": "demo",
      "tag": "posts",
      "type": "posts",
      "is_activated": "1",
      "created_at": "2017-04-04 23:37:33",
      "updated_at": "2017-04-04 23:37:33",
      "is_available": "0"
    }
  ],
  "total": 1,
  "limit": 15,
  "offset": 0
}
```

### 创建关系

POST /api/users/:id/:relate

```
POST /api/users/1/likes

HTTP/1.1 201 Created

{
    "id":"3",
    "posts_id":"1",
    "user_id":"1",
    "type":"demo",
    "is_available":"0",
    "created_at":"0000-00-00 00:00:00",
    "updated_at":"0000-00-00 00:00:00"
}
```
