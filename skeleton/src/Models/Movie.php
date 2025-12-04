<?php

namespace Models;

use Exception;
use PDO;

class Movie extends Database
{
    private $id;
    private $title;
    private $type;
    private $genre;
    private $rating;
    private $is_watched;

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($value)
    {
        if (empty($value)) throw new Exception('Le titre doit etre rempli');
        if (strlen($value) > 255) throw new Exception('Le titre ne doit pas exceder 255 caractère');
        return $this->title = htmlspecialchars($value);
    }
    public function getType()
    {
        return $this->type;
    }
    public function setType($value)
    {
        if ($value != "film" || $value != "serie") throw new Exception('La valeur du type est invalide');
        return $this->type = htmlspecialchars($value);
    }
    public function getRating()
    {
        return $this->rating;
    }
    public function setRating($value)
    {
        if ($value < 1 || $value > 5 || $value != NULL) throw new Exception('Le rating est invalide');
        return $this->rating = htmlspecialchars($value);
    }
    public function getAll()
    {
        $queryExecute = $this->db->prepare("SELECT * FROM `movies`ORDER BY `movies`.`created_at` DESC");
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_ASSOC);
    }
    public function newMovie()
    {
        $queryExecute = $this->db->prepare("INSERT INTO `movies`(`title`, `type`, `rating`) 
			VALUES (:title, :type, :rating)");

        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':type', $this->type, PDO::PARAM_STR);
        $queryExecute->bindValue(':rating', $this->rating, PDO::PARAM_STR);

        return $queryExecute->execute();
    }
}
