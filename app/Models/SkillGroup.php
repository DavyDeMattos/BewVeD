<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class SkillGroup extends CoreModel
{
    //==============================
    // Propriétés
    //==============================

    /**
     * @var string
     */
    private $code;


    //==============================
    // Méthodes 
    //==============================

    /**
     * Method to get datas from BDD with an id
     *
     * @param int $skill_groupId Skill_group's id
     * @return SkillGroup
     */
    public static function find($skill_groupId)
    {
        // connection to BDD
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `skill_group` WHERE `id` =' . $skill_groupId;
        $pdoStatement = $pdo->query($sql);

        // self::class permet d'afficher le FQCN (nom complet) de la classe dans laquelle on se situe
        $skill_group = $pdoStatement->fetchObject(self::class);

        return $skill_group;
    }

    /**
     * MEthod to get every datas from table skill_group 
     *
     * @return SkillGroup[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `skill_group`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * Method to add skill_group's information to table 'skill_group'
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `skill_group` (`code` )
        VALUES (:code)
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':code', $this->code);

        $insertedRows = $query->execute();

        if ($insertedRows) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * Method to update one row on skill_group table
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();
        $sql = "
            UPDATE `skill_group`
            SET
                code = :code,
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':code', $this->code, PDO::PARAM_STR);

        $updatedRows = $query->execute();
        return ($updatedRows);
    }


    /**
     * Method to delete skill_group on BDD
     *
     * @return void
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `skill_group`
        WHERE `id` = :id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $pdoStatement->execute();
        
    }

    //==============================
    // Getters / Setters
    //==============================  


    /**
     * Get the value of code
     *
     * @return  string
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param  string  $code
     *
     * @return  self
     */ 
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }
}

