
<?php

use FastD\Model\Migration;

class Posts extends Migration
{
    /**
     * Set up database table schema
     */
    public function setUp()
    {
        $table = $this->table('posts');
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('title', 'string', ['limit' => 200])
            ->addColumn('tag', 'string', ['limit' => 100])
            ->addColumn('type', 'string', ['limit' => 100])
            ->addColumn('is_activated', 'integer', ['limit' => 1])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
        ;
        return $table;
    }

    /**
     * @param \Phinx\Db\Table $table
     * @return mixed
     */
    public function dataSet(\Phinx\Db\Table $table)
    {
        // TODO: Implement dataSet() method.
    }
}