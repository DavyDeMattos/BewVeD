<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class LearnerSkill
{
    //==============================
    // Propriétés
    //==============================

    /**
     * @var int
     */
    private $learner_id;
    /**
     * @var int
     */
    private $skill_id;

    //==============================
    // Méthodes 
    //==============================

    /**
     * Method to get datas from BDD with an learner_id
     *
     * @param int $learner_skillId Learner_skill's id
     * @return LearnerSkill
     */
    public static function find($learner_skillId)
    {
        // connection to BDD
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `learner_skill` WHERE `learner_id` =' . $learner_skillId;
        $pdoStatement = $pdo->query($sql);

        // self::class permet d'afficher le FQCN (nom complet) de la classe dans laquelle on se situe
        $learner_skill = $pdoStatement->fetchObject(self::class);

        return $learner_skill;
    }

    /**
     * Method to get datas from BDD with an learner_id
     *
     * @param int $skillId Learner skill's id
     * @return LearnerSkill
     */
    public static function findLeanerFromSkill($skillId)
    {
        // connection to BDD
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `learner_skill` WHERE `skill_id` =' . $skillId;
        $pdoStatement = $pdo->query($sql);

        // self::class permet d'afficher le FQCN (nom complet) de la classe dans laquelle on se situe
        $learner_skills = $pdoStatement->fetchObject(self::class);
        dump($learner_skills);
        $learner_skill = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        dump($learner_skill);

        return $learner_skill;
    }
    /**
     * MEthod to get every datas from table learner_skill 
     *
     * @return LearnerSkill[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `learner_skill`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * Method to add learner_skill's information to table 'learner_skill'
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `learner_skill` (`learner_id`, `skill_id` )
        VALUES (:learner_id, :skill_id)
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':learner_id', $this->learner_id);
        $query->bindValue(':skill_id', $this->skill_id);

        $insertedRows = $query->execute();

        if ($insertedRows) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * Method to update one row on learner_skill table
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();
        $sql = "
            UPDATE `learner_skill`
            SET
                skill_id = :skill_id,
            WHERE learner_id = :learner_id
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':learner_id', $this->learner_id, PDO::PARAM_STR);
        $query->bindValue(':skill_id', $this->skill_id, PDO::PARAM_STR);


        $updatedRows = $query->execute();
        return ($updatedRows);
    }


    /**
     * Method to delete learner_skill on BDD
     *
     * @return void
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `learner_skill`
        WHERE `learner_id` = :learner_id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':learner_id', $this->learner_id, PDO::PARAM_INT);

        return $pdoStatement->execute();
        
    }
    /**
     * Method to delete learner_skill on BDD
     *
     * @return void
     */
    public function deleteFromSkill($skill_id)
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `learner_skill`
        WHERE `skill_id` = " . $skill_id;

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':skill_id', $this->skill_id, PDO::PARAM_INT);

        return $pdoStatement->execute();
        
    }

    //==============================
    // Getters / Setters
    //==============================  


    /**
     * Get the value of learner_id
     *
     * @return  int
     */ 
    public function getLearner_id()
    {
        return $this->learner_id;
    }

    /**
     * Set the value of learner_id
     *
     * @param  int  $learner_id
     *
     * @return  self
     */ 
    public function setLearner_id(int $learner_id)
    {
        $this->learner_id = $learner_id;

        return $this;
    }

    /**
     * Get the value of skill_id
     *
     * @return  int
     */ 
    public function getSkill_id()
    {
        return $this->skill_id;
    }

    /**
     * Set the value of skill_id
     *
     * @param  int  $skill_id
     *
     * @return  self
     */ 
    public function setSkill_id(int $skill_id)
    {
        $this->skill_id = $skill_id;

        return $this;
    }
}

