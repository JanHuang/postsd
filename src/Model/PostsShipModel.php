<?php

namespace Model;


use FastD\Model\Model;

/**
 * Undocumented class
 */
class PostsShipModel extends Model
{
    const TABLE = 'posts_relation';
    const LIMIT = '15';

    /**
     * Undocumented function
     *
     * @param [type] $userId
     * @param [type] $type
     * @param integer $page
     * @param integer $limit
     * @return void
     */
    public function findUsersPostsRelation($userId, $type = null, $page = 1, $limit = 15)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else if ($limit >= 25) {
            $limit = 25;
        }
        $offset = ($page - 1) * 15;

        $where = [
            'AND' => [
                'user_id' => $userId,
            ]
        ];

        if (!empty($type)) {
            $where['AND']['type'] = $type;
        }

        $total = $this->db->count(static::TABLE, [
            'AND' => [
                'user_id' => $userId,
                'type' => $type
            ]
        ]);

        $sql = <<<SQL
SELECT 
  posts.*
FROM 
  posts_relation 
  LEFT JOIN 
  posts 
  ON posts.id = posts_relation.posts_id 
WHERE 
  posts_relation.user_id = {$userId}
  AND
  posts_relation.type = '{$type}'
ORDER BY posts.created_at DESC 
LIMIT {$offset}, {$limit};
SQL;

        $data = $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        return [
            'data' => $data,
            'total' => $total,
            'limit' => $limit,
            'offset' => $offset
        ];
    }

    /**
     * Undocumented function
     *
     * @param integer $page
     * @return void
     */
    public function select($page = 1)
    {
        $offset = ($page - 1) * static::LIMIT;
        return $this->db->select(static::TABLE, '*', [
            'LIMIT' => [$offset, static::LIMIT],
            'ORDER' => ['created_at' => 'DESC'],
        ]);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function find($id)
    {
        return $this->db->get(static::TABLE, '*', [
            'OR' => [
                'id' => $id,
            ]
        ]);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @param array $data
     * @return void
     */
    public function patch($id, array $data)
    {
        $this->db->update(static::TABLE, $data, [
            'OR' => [
                'id' => $id,
            ]
        ]);

        return $this->find($this->db->id());
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        if (false !== ($row = $this->db->get(static::TABLE, 'id', [
            'AND' => $data
        ]))) {
            return $this->find($row['id']);
        }
        
        $this->db->insert(static::TABLE, $data);

        return $this->find($this->db->id());
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        return $this->db->delete(static::TABLE, [
            'id' => $id
        ]);
    }
}