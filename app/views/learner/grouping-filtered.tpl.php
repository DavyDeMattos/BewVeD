<main>
  <h2>Mes Groupes Filtré</h2>
  <h2><?= $prom->GetLabel(); ?></h2>
  <h3 class="content"><?= count($learnerList) ?> Apprenants</h3>

  <nav class="filter content">
    <form action="" method="post">
      <label for="name">Nombre d'étudiant par groupe</label>
      <input type="number" name="nbByGroup" id="nbByGroupField" value="1">
      <label for="name">Genre</label>
      <input type="checkbox" name="gender" id="genderCheckbox" value=true <?php $gender ? "checked" : "" ?>>
      <label for="name">Age</label>
      <input type="checkbox" name="age" id="ageCheckbox" value=true <?php $age ? "checked" : "" ?>>
      <label for="name">Compétences</label>
      <input type="checkbox" name="skills" id="skillsCheckbox" value=true <?php $skills ? "checked" : "" ?>>
      <div class="form-button">
        <input type="submit" value="Filter">
      </div>
    </form>
 
  </nav>
  <div class="content"><?php include __DIR__ . 'filter.tpl.php'; ?></div>
  <?php $groupNumber = 1 ;?>
  <?php foreach ($learnerList as $learner) :?>
  <!-- Boucle FOR en fonction du nombre de groupes -->
  <div class="content">
    Group n° <?= $groupNumber ?>
    <?php $groupNumber += 1 ;?>
    <table>
      <tr>
        <th colspan="1">nb</th>
        <th colspan="1">Promotion</th>
        <th colspan="1">Prénom</th>
        <th colspan="1">Nom</th>
        <th colspan="1">Genre</th>
        <th colspan="1">Age</th>
        <th colspan="2">skillsGroup</th>
      </tr>
      <?php foreach ($learner as $group) :?>

      <tr>
        <td colspan="1"><?= $group->getId() ?></td>
        <!-- {% set numberInGroup = numberInGroup + 1 %} -->
        <td colspan="1"><?= $prom->getLabel() ?></td>
        <th colspan="1">
          <a href="#"><?= $group->getFirstname() ?></a>
        </th>
        <th colspan="1"><?= $group->getLastname() ?></th>
        <td colspan="1"><?= $group->getGender() ?></td>
        <td colspan="1"><?= $group->getAge() ?></td>
        <td colspan="2">
          <!-- Boucle FOR pour lister les compétences de chaque apprenant -->
          <!-- Optionnel -->
          <span>Compétences de l'apprenant</span>
          <hr />
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
    <?php endforeach; ?>
</main>

