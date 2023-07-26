<main>
  <h2>Liste des Apprenants</h2>
  <div class="content">
    <a href="<?= $router->generate('learner-create') ?>"
      ><div class="buttonadd">
        Ajouter un apprenant<i class="fa-sharp fa-solid fa-plus"></i></div
    ></a>
  </div>

  <div class="content">
  
    <table>
      <tr>
        <th colspan="1">Promotion</th>
        <th colspan="1">Prénom</th>
        <th colspan="1">Nom</th>
        <th colspan="2">Action</th>
      </tr>
      <!-- Ici début boucle pour afficher liste des apprenants -->
      <?php foreach ($learnerList as $currentLearner) : ?>
      <tr>
        <td colspan="1">
          <a href="<?= $router->generate('prom-list') . "/" . $currentLearner->getProm_id(); ?>">
          <?= $currentLearner->label; ?>
          </a>
        </td>
        <th colspan="1">
          <a href="#">
          <?= $currentLearner->getLastname(); ?>
          </a>
        </th>
        <th colspan="1"><?= $currentLearner->getFirstname(); ?></th>
        <td>
          <a href="#">
            <div class="delete"><i class="fa-sharp fa-solid fa-trash">X</i></div
          ></a>
        </td>
        <td>
          <div class="edit"><i class="fa-sharp fa-solid fa-pen">O</i></div>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</main>
