<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Model;


use FastD\Model\Model;

class PostsModel extends Model
{
    const TABLE = 'posts';

    /**
     * Select posts list
     *
     * @param int $page
     * @param int $limit
     * @param int $userId
     * @param string $type
     * @param string $tag
     * @return array
     */
    public function findPosts($page = 1, $limit = 15, $userId = null, $type = 'posts', $tag = null, $relation)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else {
            if ($limit >= 25) {
                $limit = 25;
            }
        }
        $offset = ($page - 1) * $limit;

        $where = [
            'LIMIT' => [$offset, $limit],
        ];
        if (null !== $userId) {
            $where['AND']['user_id'] = $userId;
        }

        if (null !== $type) {
            $where['AND']['type'] = $type;
        }
        if (null !== $tag) {
            $where['AND']['tag'] = $tag;
        }

        $data = $this->db->select(static::TABLE, '*', $where);

        return [
            'data' => $data,
            'limit' => $limit,
            'offset' => $offset,
            'total' => $this->db->count(static::TABLE, $where),
        ];
    }

    /**
     * Find posts detail
     *
     * @param $id
     * @param null $userId
     * @return bool|mixed
     */
    public function findPost($id, $userId = null)
    {
        $post = $this->db->get(static::TABLE, [
            'id',
            'user_id',
            'title',
            'tag',
            'type',
            'is_activated',
            'created_at',
        ], [
            'id' => $id,
        ]);

        if (false === $post) {
            return false;
        }

        $post['is_liked'] = 0;
        $post['is_collected'] = 0;

        $post['content'] = $this->db->select('posts_content', ['id', 'posts_id', 'content'], [
            'posts_id' => $id,
        ]);

        if ( ! empty($userId)) {
            $relations = $this->db->select('posts_relation', ['type'], [
                'AND' => [
                    'user_id' => $userId,
                    'posts_id' => $id,
                ],
            ]);
            foreach ($relations as $relation) {
                switch ($relation['type']) {
                    case 'likes':
                        $post['is_liked'] = 1;
                        break;
                    case 'collects':
                        $post['is_collected'] = 1;
                        break;
                }
            }
        }

        return $post;
    }

    /**
     * Create posts
     *
     * @param array $post
     * @return bool|mixed
     */
    public function createPost(array $post)
    {
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['updated_at'] = $post['created_at'];

        $contentList = [];
        if (isset($post['content'])) {
            $contentList = $post['content'];
            unset($post['content']);
        }
        if ($this->db->insert(static::TABLE, $post)) {
            $postsId = $this->db->id();
            foreach ($contentList as $content) {
                $this->db->insert('posts_content', [
                    'posts_id' => $postsId,
                    'content' => $content,
                ]);
            }

            return $this->findPost($postsId);
        }

        return false;
    }

    /**
     * Patch posts
     *
     * @param $id
     * @param array $post
     * @return bool|mixed
     */
    public function patchPost($id, array $post)
    {
        $post['updated_at'] = date('Y-m-d H:i:s');
        $this->db->update(static::TABLE, $post, [
            'id' => $id,
        ]);

        return $this->findPost($id);
    }

    /**
     * Delete posts
     *
     * @param $id
     * @return bool|int
     */
    public function deletePost($id)
    {
        return $this->db->update(static::TABLE, ['is_activated' => 0], [
            'id' => $id,
        ]);
    }

    /**
     * select user posts list
     *
     * @param $user
     * @return array
     */
    public function findUserPosts($user, $page = 1, $limit = 15)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else {
            if ($limit >= 25) {
                $limit = 25;
            }
        }
        $offset = ($page - 1) * $limit;

        $data = $this->db->select(static::TABLE, '*', [
            'user_id' => $user,
            'LIMIT' => [$offset, $limit],
        ]);

        return [
            'data' => $data,
            'limit' => $limit,
            'offset' => $offset,
            'total' => $this->db->count(static::TABLE, ['user_id' => $user,]),
        ];
    }

    /**
     * Select tag posts list
     *
     * @param $tag
     * @return array
     */
    public function findTagPosts($tag)
    {
        return $this->db->select(static::TABLE, '*', [
            'tag' => $tag,
        ]);
    }
}