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
              <!-- Ajouter différentes promotions -->
              <option value="1">CDA-20230701</option>
              <option value="2">DWWM-20230701</option>
              <option value="3">NULL-20230701</option>
          </select>
          <select required id="gender" name="gender" aria-label="Default select example">
              <option selected value="" >Choisissez le genre</option>
              <option value="m">Homme</option>
              <option value="f">Femme</option>
          </select>
          <label for="cars">Compétences de l'apprenant:</label>
          <select name="cars" id="cars" multiple>
            <!-- Boucle sur les différentes compétences -->
            <option value="1">Bootstrap</option>
            <option value="2">CSS</option>
            <option value="3">React Js</option>
            <option value="4">Python</option>
          </select>
        </div>
        <button type="submit" class="btn btn-secondary add-car">Soumettre</button>
    </form>
</div>