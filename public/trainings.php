<?php
require '../config/bootstrap.php';

use App\Models\Training;

$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo 'GET';
        $training = new Training();
        break;
    case 'POST':
        echo 'POST';
        $training = new Training(name: $_POST['training']['name']);
        if ($training->save()) {
            echo 'Treinamento adicionado com sucesso!';
        } else {
            echo 'Não foi possível adicionar o treinamento!';
        }
        break;
    case 'DELETE':
        echo 'DELETE';
        break;
}

$trainings = Training::all();
?>

<!Doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
.form-group {
  margin-bottom: 5px;
}

.invalid-feedback {
  color: red;
  display: block;
}

.is-invalid {
  border: 1px solid red;
}

.form-inline {
  display: inline-block;
  margin-right: 10px;
}

.display-inline {
  display: flex;
  align-items: baseline;
  gap: 3px;
}

ul li {
  padding: 5px;
}
</style>

<body>
  <h1>Lista de Treinamentos</h1>

  <ul>
    <?php foreach ($trainings as $index => $training_) : ?>
    <li>
      <form action="trainings.php" method="POST" class="form-inline">
        <input type='hidden' name="_method" value='DELETE'>
        <input type="hidden" name="training[id]" value="<?= $index ?>">
        <input type="submit" value="Remover">
      </form>
      <span><?= $training_->getName(); ?></span>
    </li>
    <?php endforeach ?>
  </ul>

  <form action="trainings.php" method="POST" class="display-inline">

    <div class="form-group">
      <label for="training_name">Treinamento:</label>
      <input id="training_name" type="text" name="training[name]"
        class="<?= $training->errors('name') ? 'is-invalid' : '' ?>">
      <span class="invalid-feedback"><?= $training->errors('name') ?></span>
    </div>

    <input type="submit" value="Adicionar">
  </form>
</body>







</html>