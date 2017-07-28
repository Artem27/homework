<?php

class DataCategory extends BDConnect {

    public function cityDisplay() {

        $result = $this->getConnect()->query("SELECT * FROM `city`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function stationDisplay() {

        $result = $this->getConnect()->query("SELECT * FROM `stations`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function categoryDisplay() {

        $result = $this->getConnect()->query("SELECT * FROM `category`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}




