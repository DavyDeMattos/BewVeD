<div class="container">
    <h2>Nouvel apprenant</h2>
    <form class="row align-items-start" action="" method="POST">
        <div class="mb-3 col-md-6">
            <label for="lastname" class="form-label">Nom</label>
            <input required class="form-control" id="lastname" name="lastname" placeholder="Indiquer le nom de l'apprenant">
        </div>
        <div class="mb-3 col-md-6">
            <label for="firstname" class="form-label">Prénom</label>
            <input required class="form-control" id="firstname" name="firstname" placeholder="Indiquer le prénom de l'apprenant"></input>
        </div>
        <div class="d-flex">
          <select required id="prom" name="prom_id" aria-label="Default select example">
              <option selected value="" >Choisissez la promotion</option>
              <?php foreach ($promList as $currentProm) :?>
                <option value="<?= $currentProm->getId(); ?>"><?= $currentProm->getLabel(); ?></option>
              <?php endforeach; ?>
          </select>
          <select required id="gender" name="gender" aria-label="Default select example">
              <option selected value="" >Choisissez le genre</option>
              <option value="m">Homme</option>
              <option value="f">Femme</option>
          </select>
          <label for="skills">Compétences de l'apprenant:</label>
          <!-- name="skills[]" en mettant le [], transforme en tableau -->
          <select required name="skills[]" id="skills" multiple size="3">
            <?php foreach ($skillList as $currentSkill) :?>
                <option 
                    value="<?= $currentSkill->getId(); ?>" 
                    skillGroup="<?= $currentSkill->getSkill_group_id(); ?>"
                ><?= $currentSkill->getLabel(); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-secondary add-car">Soumettre</button>
    </form>
</div>