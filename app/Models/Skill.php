<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Skill extends CoreModel
{
    //==============================
    // Propriétés
    //==============================

    /**
     * @var int
     */
    private $skill_group_id;
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
     * @param int $skillId Skill's id
     * @return Skill
     */
    public static function find($skillId)
    {
        // connection to BDD
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `skill` WHERE `id` =' . $skillId;
        $pdoStatement = $pdo->query($sql);

        // self::class permet d'afficher le FQCN (nom complet) de la classe dans laquelle on se situe
        $skill = $pdoStatement->fetchObject(self::class);

        return $skill;
    }

    /**
     * MEthod to get every datas from table skill 
     *
     * @return Skill[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `skill`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * Method to add skill's information to table 'skill'
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `skill` (`skill_group_id`, `label` )
        VALUES (:skill_group_id, :label)
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':skill_group_id', $this->skill_group_id);
        $query->bindValue(':label', $this->label);

        $insertedRows = $query->execute();

        if ($insertedRows) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * Method to update one row on skill table
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();
        $sql = "
            UPDATE `skill`
            SET
                skill_group_id = :skill_group_id,
                label = :label,
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':skill_group_id', $this->skill_group_id, PDO::PARAM_STR);
        $query->bindValue(':label', $this->label, PDO::PARAM_STR);

        $updatedRows = $query->execute();
        return ($updatedRows);
    }


    /**
     * Method to delete skill on BDD
     *
     * @return void
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `skill`
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


    /**
     * Get the value of skill_group_id
     *
     * @return  int
     */ 
    public function getSkill_group_id()
    {
        return $this->skill_group_id;
    }

    /**
     * Set the value of skill_group_id
     *
     * @param  int  $skill_group_id
     *
     * @return  self
     */ 
    public function setSkill_group_id(int $skill_group_id)
    {
        $this->skill_group_id = $skill_group_id;

        return $this;
    }
}

