<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsernameToStudents extends Migration
{
    public function up()
    {
        $this->forge->addColumn('students', [
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'unique' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('students', 'username');
    }
}
