<main>
  <h2>Liste des Compétences</h2>
  <div class="content">
    <a href="<?= $router->generate('skill-add') ?>"
      ><div class="buttonadd">
        Ajouter une compétence<i class="fa-sharp fa-solid fa-plus"></i></div
    ></a>
  </div>

  <div class="content">
  
    <table>
      <tr>
        <th colspan="1">ID</th>
        <th colspan="1">Label</th>
        <th colspan="1">Groupe</th>
        <th colspan="2">Action</th>
      </tr>
      <!-- Ici début boucle pour afficher liste des compétences -->
      <?php foreach ($skillList as $currentSkill) : ?>
      <tr>
        <td colspan="1">
          <!-- <a href="#"> -->
          <?= $currentSkill->getId(); ?>
          <!-- </a> -->
        </td>
        <th colspan="1">
          <!-- <a href="#"> -->
          <?= $currentSkill->getLabel(); ?>
          <!-- </a> -->
        </th>
        <th colspan="1"><?= $currentSkill->code; ?></th>
        <td>
          <a href="<?= $router->generate('skill-delete') . $currentSkill->getId(); ?>">
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
