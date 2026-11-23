<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BlogsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('blogs');
        $table->addColumn('title', 'string', ['limit' => 500])
            ->addColumn('author', 'string', ['limit' => 255])
            ->addColumn('body', 'text', ['limit' => 2500])
            ->addColumn('slug', 'string', ['limit' => 500])
            ->addColumn('description', 'string', ['limit' => 255])
            ->addColumn('status', 'enum', ['values' => ['draft', 'published']])
            ->addTimestamps()
            ->addIndex('slug', ['unique' => true])
            ->create();
    }
}
