
<?php

use FastD\Model\Migration;
use Phinx\Db\Table;

class PostsRelation extends Migration
{
    /**
     * @return Table
     */
    public function setUp()
    {
        $table = $this->table('posts_relation');

        $table
            ->addColumn('posts_id', 'integer')
            ->addColumn('user_id', 'string', ['limit' => 32])
            ->addColumn('type', 'string')
        ;

        return $table;
    }
    
    /**
     * The table preinstall dataset.
     *
     * @return mixed
     */
    public function dataSet(Table $table)
    {
        
    }
}