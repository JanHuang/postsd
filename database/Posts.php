
<?php

use FastD\Model\Migration;

class Posts extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
    {
        $table = $this->table('posts');
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('title', 'string', ['limit' => 200])
            ->addColumn('type', 'string', ['limit' => 100])
            ->addColumn('content', 'text')
            ->addColumn('is_activated', 'integer', ['limit' => 1])
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime')
        ;
        if (!$table->exists()) {
            $table->create();
        }
    }
}