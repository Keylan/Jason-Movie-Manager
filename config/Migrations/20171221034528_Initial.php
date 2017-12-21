<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('movies')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('title', 'string', [
                'default' => '',
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('format', 'string', [
                'default' => '',
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('length', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('release_year', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('rating', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('movies');
    }
}
