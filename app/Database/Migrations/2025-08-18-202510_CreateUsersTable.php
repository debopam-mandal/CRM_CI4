<?php 
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration {

    public function up(){

        echo "Running CreateUsersTable migration...<br>";
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,   
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,   
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);
    }
    public function down(){
        $this->forge->dropTable('users');
    }

}