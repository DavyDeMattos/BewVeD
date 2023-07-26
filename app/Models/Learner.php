<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Learner extends CoreModel
{
    //==============================
    // Propriétés
    //==============================

    /**
     * @var string
     */
    private $lastname;
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var int
     */
    private $age;
    /**
     * @var string
     */
    private $gender;
    /**
     * @var int
     */
    private $prom_id;

    //==============================
    // Méthodes 
    //==============================

    /**
     * Method to get datas from BDD with an id
     *
     * @param int $learnerId Learner's id
     * @return Learner
     */
    public static function find($learnerId)
    {
        // connection to BDD
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `learner` WHERE `id` =' . $learnerId;
        $pdoStatement = $pdo->query($sql);

        // self::class permet d'afficher le FQCN (nom complet) de la classe dans laquelle on se situe
        $learner = $pdoStatement->fetchObject(self::class);

        return $learner;
    }

    /**
     * Method to get every datas from table learner 
     *
     * @return Learner[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        // $sql = 'SELECT * FROM `learner`';
        $sql = 
        'SELECT `learner`.`id`, `learner`.`lastname`, `learner`.`firstname`, `learner`.`age`, `learner`.`gender`,`learner`.`prom_id`, `prom`.`label` FROM `learner`
        JOIN `prom`
        ON `prom_id` = `prom`.`id`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * Method to get every learner from one prom 
     *
     * @return Learner[]
     */
    public static function getLeanerProm($prom_id)
    {
        $pdo = Database::getPDO();
        // $sql = 'SELECT * FROM `learner`';
        $sql = 
        'SELECT * FROM `learner`
         WHERE `prom_id` =' . $prom_id;
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }
    /**
     * Method to add learner's information to table 'learner'
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `learner` (`lastname`, `firstname`, `age`, `gender`, `prom_id` )
        VALUES (:lastname, :firstname, :age, :gender, :prom_id)
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':lastname', $this->lastname);
        $query->bindValue(':firstname', $this->firstname);
        $query->bindValue(':age', $this->age);
        $query->bindValue(':gender', $this->gender);
        $query->bindValue(':prom_id', $this->prom_id);

        $insertedRows = $query->execute();

        if ($insertedRows) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * Method to update one row on learner table
     * Object has to contain every propriety except for those who has default value (ex: updated_at)
     *
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();
        $sql = "
            UPDATE `learner`
            SET
                lastname = :lastname,
                firstname = :firstname,
                age = :age,
                gender = :gender,
                prom_id = :prom_id,
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $query->bindValue(':age', $this->age, PDO::PARAM_STR);
        $query->bindValue(':gender', $this->gender, PDO::PARAM_STR);
        $query->bindValue(':prom_id', $this->prom_id, PDO::PARAM_INT);
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);

        $updatedRows = $query->execute();
        return ($updatedRows);
    }


    /**
     * Method to delete learner on BDD
     *
     * @return void
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `learner`
        WHERE `id` = :id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $pdoStatement->execute();
        
    }

    /**
     * Method to order learner on BDD
     *
     * @return Learner[]
     */
    public static function orderBy($filter)
    {
        var_dump("coucou");
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `learner`
        ORDER BY" . $filter;
        // var_dump($sql);
        $pdoStatement = $pdo->query($sql);
        // $pdoStatement->bindValue(':filter', $this->id, PDO::PARAM_INT);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        // $results = $pdoStatement->execute();
        // var_dump($results);
        // exit();
        return $results;
        
    }

    //==============================
    // Getters / Setters
    //==============================  


    /**
     * Get the value of lastname
     *
     * @return  string
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param  string  $lastname
     *
     * @return  self
     */ 
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     *
     * @return  string
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param  string  $firstname
     *
     * @return  self
     */ 
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of age
     *
     * @return  int
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @param  int  $age
     *
     * @return  self
     */ 
    public function setAge(int $age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of gender
     *
     * @return  string
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @param  string  $gender
     *
     * @return  self
     */ 
    public function setGender(string $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of prom_id
     *
     * @return  int
     */ 
    public function getProm_id()
    {
        return $this->prom_id;
    }

    /**
     * Set the value of prom_id
     *
     * @param  int  $prom_id
     *
     * @return  self
     */ 
    public function setProm_id(int $prom_id)
    {
        $this->prom_id = $prom_id;

        return $this;
    }
}

