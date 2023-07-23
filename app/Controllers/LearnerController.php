<?php

namespace App\Controllers;

use App\Models\Learner;

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
        $age = floatval(filter_input(INPUT_POST, 'age'));
        $gender = filter_input(INPUT_POST, 'gender');
        $prom_id = floatval(filter_input(INPUT_POST, 'prom_id'));

        $newLearner = new Learner();
        
        // We use datas from form to set learner's Firstname
        $newLearner->setLastname($lastname);
        $newLearner->setFirstname($firstname);
        $newLearner->setAge($age);
        $newLearner->setGender($gender);
        $newLearner->setProm_id($prom_id);     

        $newLearner->save();

        // TODO Continuer en faisant les jointures avec les entités skill et skill_group

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
