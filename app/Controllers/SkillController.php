<?php

namespace App\Controllers;

use App\Models\Skill;


class SkillController extends CoreController
{
    /**
     * Function to get all skills
     *
     * @return void
     */
    public function listAction()
    {
        $skillList = Skill::findAll();
        //dump($skillList);

        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show('skill/list', [
            'skillList' => $skillList,
        ]);
    }
    /**
     * Function to get all skills and skill_groups
     *
     * @return void
     */
    public function listActionWithGroup()
    {
        $skillList = Skill::findAllAssociations();
        $this->show('skill/list', [
            'skillList' => $skillList,
        ]);
    }
    /**
     * Function called by form to add a skill
     */
    public function createAction()
    {
        // dump($_POST);
        // exit;
        $label = filter_input(INPUT_POST, 'label');

        $newSkill = new Skill();
        
        // We use datas from form to set skill's Firstname
        $newSkill->setLabel($label);

        $newSkill->save();

        $this->redirect('skill-list');

    }

    /**
     * Function in charge of Méthode qui permet de traiter les infos envoyées par le formulaire d'édition
     *
     * @param int $id
     * @return void
     */
    public function updateAction($id) {

        // On récupère les infos de la skillotion depuis $_POST
        $label = filter_input(INPUT_POST, 'label');

        // We check datas
        if($label === "" || $label === null) {
            echo "Le nom de la marque est obligatoire";
            exit;
        }

        // Get skill to edit
        $skillToEdit = Skill::find($id);

        $skillToEdit->setLabel($label);
   
        $skillToEdit->save();
        
        $this->redirect('skill-list');

    }
    /**
     * Function in charge of to delete a skill
     *
     * @param int $id
     * @return void
     */
    public function deleteAction($id)
    {
        // dump($_POST);
        // exit;
        $skillToDelete = Skill::find($id); 

        $skillToDelete->delete();

        // TODO Continuer en faisant les jointures avec les entités learner

        // Une fois la voiture insérée en BDD, on redirige vers la page liste des voitures
        $this->redirect('skill-list');

    }
}                                           
