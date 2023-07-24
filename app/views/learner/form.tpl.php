<div class="container">
    <h2>Nouvel apprenant</h2>
    <form class="row align-items-start" action="" method="POST">
        <div class="mb-3 col-md-6">
            <label for="Lastname" class="form-label">Nom</label>
            <input required class="form-control" id="Lastname" name="Lastname" placeholder="Indiquer le nom de l'apprenant">
        </div>
        <div class="mb-3 col-md-6">
            <label for="Firstname" class="form-label">Prénom</label>
            <input required class="form-control" id="Firstname" name="Firstname" placeholder="Indiquer le prénom de l'apprenant"></input>
        </div>
        <div class="d-flex">
          <select required id="prom" name="prom" aria-label="Default select example">
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
          <select required name="skills" id="skills" multiple>
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