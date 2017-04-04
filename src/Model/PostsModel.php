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
        $post['created'] = date('Y-m-d H:i:s');
        $post['updated'] = $post['created'];
        return $this->db->insert(static::TABLE, $post);
    }

    public function findPosts($page = 1)
    {
        return $this->db->select(static::TABLE, '*');
    }

    public function findPost($id)
    {
        return $this->db->get(static::TABLE, '*', [
            'id' => $id
        ]);
    }

    public function patchPost($id, array $post)
    {
        $post['updated'] = date('Y-m-d H:i:s');
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
}