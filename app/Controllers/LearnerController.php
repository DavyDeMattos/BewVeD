<?php

namespace App\Controllers;

use AltoRouter;
use App\Models\Learner;
use App\Models\LearnerSkill;
use App\Models\Prom;
use App\Models\Skill;
use App\Utils\Database;

class LearnerController extends CoreController
{
   /**
     * Function to get all learners
     *
     * @return void
     */
    public function listAction()
    {
        $learnerList = Learner::findAll();
        //dump($learnerList);

        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show('learner/list', [
            'learnerList' => $learnerList,
        ]);
    }

    /**
     * Function to get learner in one prom
     *
     * @return void
     */
    public function groupList($id)
    {
        $learnerList = Learner::getLeanerProm($id);
        $prom = Prom::find($id);
        //dump($learnerList);

        // List de 
        $this->show('learner/grouping', [
            'learnerList' => $learnerList,
            'prom' => $prom,
        ]);
    } 

    /**
     * Function to generate groups in one prom
     *
     * @return void
     */
    public function generate($prom_id)
    {
        // dump($_POST);
        // exit;
        $prom = Prom::find($prom_id);


        $nbByGroup = intval(floor(filter_input(INPUT_POST, 'nbByGroup')));
        $gender = filter_input(INPUT_POST, 'gender');
        // strtoupper = put letter to uppercase
        $age = filter_input(INPUT_POST, 'age');
        $skills = filter_input(INPUT_POST, 'skills');

        // check if checkbox are checked
        $length = $nbByGroup;
        $isMixite = ($gender=="true") ? true : false;
        $isAge = ($age=="true") ? true : false;
        $isSkills = ($skills=="true") ? true : false;
        //search all learner
        $learners = $students = Learner::getLeanerProm($prom_id);
        // dump($learners);
        if (count($students)<=10){
        $router = new AltoRouter();
          return $router->generate('prom-grouping');
        }
        // dump($length, $gender, $age, $skills);
        // dump($length, $isMixite, $isAge, $isSkills);
        // dump($students);
        if ($isMixite) {
            
                $total = count($students);
                $studentByGroup = $length; //3
                $nbGroup = floor($total / $studentByGroup);
                $maleStudents = [];
                $femaleStudents = [];

                // tri des éleves en fonction de leurs genre
                foreach ($students as $student) {
                $sexe = $student->getGender();
                if ($sexe === "m") {
                    $maleStudents[]=$student; 
                } elseif ($sexe === "f") {
                    $femaleStudents[]=$student; 
                }
                }

                // mélange de ces tableaux pour les associer aléatoirement
                shuffle($maleStudents);
                shuffle($femaleStudents);

                // var_dump($maleStudents);

                // -------------------------------------------------
                $groups = [];
                $extraStudents = [];
                // dump($nbGroup);
                // Assigner une personne du genre par groupe
                // Pas assez de fille pour chaque groupe
                if ($nbGroup>count($femaleStudents)){
                for ($i=0; $i < $femaleStudents; $i++) { 
                    $groups[$i][] = array_pop($femaleStudents);
                    $groups[$i][1] = array_pop($maleStudents);
                }
                // Pas assez de garçon pour chaque groupe
                }else if ($nbGroup>count($maleStudents)){
                for ($i=0; $i < $maleStudents; $i++) { 
                    $groups[$i][] = array_pop($femaleStudents);
                    $groups[$i][1] = array_pop($maleStudents);
                }
                // Assez de fille et de garçon pour chaque groupe
                }else if ($nbGroup<=count($femaleStudents) && ($nbGroup<=count($maleStudents))){
                for ($i=0; $i < $nbGroup; $i++) { 
                    $groups[$i][] = array_pop($femaleStudents);
                    $groups[$i][1] = array_pop($maleStudents);
                }
                }
                // Extra student pour compléter les groupes plus tard
                $maxFemales = count($femaleStudents);
                if ($femaleStudents != null){
                for ($i=0; $i < $maxFemales; $i++) { 
                    $student = array_pop($femaleStudents);
                    $extraStudents[] = $student;
                }
                } 
                $maxMales = count($maleStudents);
                if($maleStudents!= null){
                for ($i=0; $i < $maxMales; $i++) {
                    $student = array_pop($maleStudents);
                    $extraStudents[] = $student;
                }
                }

                // dump($groups);
                // dump($extraStudents);

                // mettre le reste des élèves
                // shuffle($extraStudents);
                $maxExtraStudent = count($extraStudents);
                $i = 0;
                $j = 3;
                while ($extraStudents != null) {
                $groups[$i][$j] = array_pop($extraStudents);
                if ($i == ($nbGroup-1)){
                    $i = -1;
                    $j++;
                }
                $i++;
                }
            

            /*
                $groups = array_chunk($learners,  (int)(count($learners) / $length) + 1);
                $learnerInGroup = [];
                $groupsLearners = [];
                for ($i = 0; $i < count($groups[0]); $i++) { // group[0] length
                    foreach ($groups as  $key => $group) {
                        if (isset($group[$i])) {
                            $learnerInGroup[$key] = $group[$i];
                        }
                    }
                    array_push($groupsLearners, $learnerInGroup);
                }
                $groups = $groupsLearners;
            */
        }
        if ($isAge) {
            $groups = array_chunk($learners,  (int)(count($learners) / $length));
            $learnersinGroup = [];
            for ($i = 0; $i < count($groups[0]); $i++) { // group[0] length
                foreach ($groups as  $key => $value) {
                    if (isset($value[$i])) {
                        array_push($learnersinGroup, $value[$i]);
                    }
                }
            }
            $groups = array_chunk($learnersinGroup,  $length);
        }
        $learnerList = $groups;

        return $this->show('learner/grouping-filtered', [
            'prom' => $prom,
            'count' => count($learners),
            // 'group' => $group,
            'learnerList' => $learnerList, // students filtered
        ]);
        //dump($learnerList);

    } 

    /**
     * Function to get all learners
     *
     * @return void
     */
    public function showForm()
    {
        // TODO ajouter variables pour la dynamisation de compétences et promotions
        $promList = Prom::findAll();
        $skillList = Skill::findAll();
        // $this->show('learner/form');
        $this->show('learner/form', [
            'promList' => $promList,
            'skillList' => $skillList,
        ]);
    }


    /**
     * Function called by form to add a learner
     */
    public function createAction()
    {
        // dump($_POST);
        // exit;
        $lastname = filter_input(INPUT_POST, 'lastname');
        $firstname = filter_input(INPUT_POST, 'firstname');
        // floatval = string to float
        // ! A changer ?
        $age = intval(floatval(filter_input(INPUT_POST, 'age')));
        $gender = filter_input(INPUT_POST, 'gender');
        $prom_id = intval(filter_input(INPUT_POST, 'prom_id'));
        // $skills = filter_input(INPUT_POST, 'skills');
        $skills = $_POST["skills"];

        $newLearner = new Learner();
        // dump($skills);
        
        // We use datas from form to set learner's Firstname
        $newLearner->setLastname($lastname);
        $newLearner->setFirstname($firstname);
        $newLearner->setAge($age);
        $newLearner->setGender($gender);
        $newLearner->setProm_id($prom_id);     

        // sauvegarde de l'apprenant dans la table learner
        $newLearner->save();

        // To get the last ID created in the database
        $pdo = Database::getPDO();
        $lastId = $pdo->lastInsertId();
        // dump($id);

        $newLearnerSkill = new LearnerSkill();
        // dump($skills);
        foreach ($skills as $skill) {
            // dump("coucou");
            // dump($skill);
            $newLearnerSkill->setLearner_id($lastId);
            $newLearnerSkill->setSkill_id($skill);
            $newLearnerSkill->insert();
        }

        // Une fois la voiture insérée en BDD, on redirige vers la page liste des voitures
        $this->redirect('learner-list');

    }

    /**
     * Function in charge of Méthode qui permet de traiter les infos envoyées par le formulaire d'édition
     *
     * @param int $id
     * @return void
     */
    public function updateAction($id) {

        // On récupère les infos  de la voiture depuis $_POST
        $lastname = filter_input(INPUT_POST, 'lastname');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $age = filter_input(INPUT_POST, 'age');
        $gender = filter_input(INPUT_POST, 'gender');
        $prom_id = filter_input(INPUT_POST, 'prom_id', FILTER_VALIDATE_INT);


        // We check datas
        if($lastname === "" || $lastname === null) {
            echo "Le nom de la marque est obligatoire";
            exit;
        }
        if($firstname === "" || $firstname === null) {
            echo "Le nom du modèle est obligatoire";
            exit;
        }
        if($age === "" || $age === null) {
            echo "Le nom de la plaque est obligatoire";
            exit;
        }
        if($prom_id === "" || $prom_id === null) {
            echo "Le prix est obligatoire";
            exit;
        }

        // Get learner to edit
        $learnerToEdit = Learner::find($id);

        $learnerToEdit->setLastname($lastname);
        $learnerToEdit->setFirstname($firstname);
        $learnerToEdit->setAge($age);
        $learnerToEdit->setGender($gender);
        $learnerToEdit->setProm_id($prom_id);
   
        $learnerToEdit->save();

        // TODO Continuer en faisant les jointures avec les entités skill et skill_group
        
        $this->redirect('learner-list');

    }
    /**
     * Function in charge of to delete a learner
     *
     * @param int $id
     * @return void
     */
    public function deleteAction($id)
    {
        // dump($_POST);
        // exit;
        $learnerToDelete = Learner::find($id); 

        $learnerToDelete->delete();

        // TODO Continuer en faisant les jointures avec les entités skill et skill_group

        // Une fois la voiture insérée en BDD, on redirige vers la page liste des voitures
        $this->redirect('learner-list');

    }
}                                           
