<div class="content">
    <h2>Nouvelle compétence</h2>
    <form class="form-newlearner" action="" method="POST">
        <div class="form-skill-add">
            <label for="label" class="form-label">Label</label>
            <input required class="form-skill-add--label" id="label" name="label" placeholder="Indiquer le nom de la compétence">
        </div>
        <div class="form-skill-add">
          <label for="skills">Compétences de l'apprenant:</label>
          <select required class="form-skill-add--skill"  id="skillGroup" name="skillGroup" aria-label="Default select example">
              <option selected value="" >Choisissez le groupe</option>
              <?php foreach ($skillGroupList as $currentGroup) :?>
                <option value="<?= $currentGroup->getId(); ?>"><?= $currentGroup->getCode(); ?></option>
              <?php endforeach ?>
          </select>
        </div>
        <button type="submit" class="btn btn-secondary ">Soumettre</button>
    </form>
</div>