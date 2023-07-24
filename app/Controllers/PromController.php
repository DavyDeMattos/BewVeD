<?php

namespace App\Controllers;

use App\Models\Prom;


class PromController extends CoreController
{
    /**
     * Function to get all proms
     *
     * @return void
     */
    public function listAction()
    {
        $promList = Prom::findAll();
        //dump($promList);

        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show('prom/list', [
            'promList' => $promList,
        ]);
    }

    /**
     * Function called by form to add a prom
     */
    public function createAction()
    {
        // dump($_POST);
        // exit;
        $label = filter_input(INPUT_POST, 'label');

        $newProm = new Prom();
        
        // We use datas from form to set prom's Firstname
        $newProm->setLabel($label);

        $newProm->save();

        $this->redirect('prom-list');

    }

    /**
     * Function in charge of Méthode qui permet de traiter les infos envoyées par le formulaire d'édition
     *
     * @param int $id
     * @return void
     */
    public function updateAction($id) {

        // On récupère les infos de la promotion depuis $_POST
        $label = filter_input(INPUT_POST, 'label');

        // We check datas
        if($label === "" || $label === null) {
            echo "Le nom de la marque est obligatoire";
            exit;
        }

        // Get prom to edit
        $promToEdit = Prom::find($id);

        $promToEdit->setLabel($label);
   
        $promToEdit->save();
        
        $this->redirect('prom-list');

    }
    /**
     * Function in charge of to delete a prom
     *
     * @param int $id
     * @return void
     */
    public function deleteAction($id)
    {
        // dump($_POST);
        // exit;
        $promToDelete = Prom::find($id); 

        $promToDelete->delete();

        // TODO Continuer en faisant les jointures avec les entités learner

        // Une fois la voiture insérée en BDD, on redirige vers la page liste des voitures
        $this->redirect('prom-list');

    }
}                                           
