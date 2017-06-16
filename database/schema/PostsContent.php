
<?php

use FastD\Model\Migration;
use Phinx\Db\Table;

class PostsContent extends Migration
{
    /**
     * @return Table
     */
    public function setUp()
    {
        $table = $this->table('posts_content');
        $table
            ->addColumn('posts_id', 'string')
            ->addColumn('img', 'string', ['length' => 255])
            ->addColumn('content', 'text')
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