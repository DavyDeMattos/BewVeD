<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Prom extends CoreModel
{
    //==============================
    // Propriétés
    //==============================

    /**
     * @var string
     */
    private $label;

    //==============================
    // Méthodes 
    //==============================

    /**
     * Method to get datas from BDD with an id
     *
     * @param int $promId Prom's id
     * @return Prom
     */
    public static function find($promId)
    {
        // connection to BDD
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `prom` WHERE `id` =' . $promId;
        $pdoStatement = $pdo->query($sql);

        // self::class permet d'afficher le FQCN (nom complet) de la classe dans laquelle on se situe
        $prom = $pdoStatement->fetchObject(self::class);

        return $prom;
    }

    /**
     * MEthod to get every datas from table prom 
     *
     * @return Prom[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `prom`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * Method to add prom's information to table 'prom'
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `prom` (`label` )
        VALUES (:label )
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':label', $this->label);

        $insertedRows = $query->execute();

        if ($insertedRows) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * Method to update one row on prom table
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();
        $sql = "
            UPDATE `prom`
            SET
                label = :label,
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':label', $this->label, PDO::PARAM_STR);
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);

        $updatedRows = $query->execute();
        return ($updatedRows);
    }


    /**
     * Method to delete prom on BDD
     *
     * @return void
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `prom`
        WHERE `id` = :id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $pdoStatement->execute();
        
    }


    //==============================
    // Getters / Setters
    //==============================  


    /**
     * Get the value of label
     *
     * @return  string
     */ 
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @param  string  $label
     *
     * @return  self
     */ 
    public function setLabel(string $label)
    {
        $this->label = $label;

        return $this;
    }
}

