<?php

require_once("database/database.php");

class Quests{
    public function __construct() {
        $this->db = new Database();
        $this->quests = $this->db->get_quests_list();
    }
}

?>