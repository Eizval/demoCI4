<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keys extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TABLE `keys`
        (
           id INT(11) UNSIGNED AUTO_INCREMENT,
           token VARCHAR(255),
           comments TEXT,
           created_at DATETIME,
           updated_at DATETIME,
           deleted_at DATETIME,
           PRIMARY KEY (id)
        );
        ");
    }

    public function down()
    {
        //
    }
}