<?php

use humhub\components\Migration;

class uninstall extends Migration{
    public function up(){
        $this->safeDropTable('quicknotes_note');
    }

    public function down(){
        echo "uninstall does not support migration down <br>";
        return false;
    }
}