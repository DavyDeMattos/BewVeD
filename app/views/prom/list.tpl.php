<main>
  <h2>Liste des promotions</h2>
  <div class="content">
    <a href="#"
      ><div class="buttonadd">
        Ajouter une promotion<i class="fa-sharp fa-solid fa-plus"></i></div
    ></a>
  </div>

  <div class="content">
  
    <table>
      <tr>
        <th colspan="1">ID</th>
        <th colspan="1">Promotion</th>
        <th colspan="2">Action</th>
      </tr>
      <!-- Ici début boucle pour afficher liste des apprenants -->
      <?php foreach ($promList as $currentProm) : ?>
      <tr>
        <th colspan="1"><?= $currentProm->getId(); ?></th>
        <th colspan="1">
          <a href="<?= $router->generate('prom-list') ."/". $currentProm->getId();?>">
          <?= $currentProm->getLabel(); ?>
          </a>
        </th>
        <td>
          <a href="#">
            <div class="delete"><i class="fa-sharp fa-solid fa-trash"></i></div
          ></a>
        </td>
        <td>
          <div class="edit"><i class="fa-sharp fa-solid fa-pen"></i></div>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</main>
