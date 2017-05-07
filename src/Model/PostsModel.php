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

    public function createPost(array $post)
    {
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['updated_at'] = $post['created_at'];
        if ($this->db->insert(static::TABLE, $post)) {
            return $this->findPost($this->db->id());
        }
        return false;
    }

    public function findPosts($page = 1)
    {
        $offset = ($page - 1) * 15;

        $where = [
            'LIMIT' => [$offset, 15]
        ];

        return $this->db->select(static::TABLE, '*', $where);
    }

    public function findPost($id)
    {
        return $this->db->get(static::TABLE, '*', [
            'id' => $id
        ]);
    }

    public function patchPost($id, array $post)
    {
        $post['updated_at'] = date('Y-m-d H:i:s');
        $this->db->update(static::TABLE, $post, [
            'id' => $id
        ]);
        return $this->findPost($id);
    }

    public function deletePost($id)
    {
        return $this->db->update(static::TABLE, ['is_activated' => 0], [
            'id' => $id
        ]);
    }

    public function findUserPosts($user)
    {
        return $this->db->select(static::TABLE, '*', [
            'user_id' => $user
        ]);
    }

    public function findTagPosts($tag)
    {
        return $this->db->select(static::TABLE, '*', [
            'tag' => $tag
        ]);
    }
}