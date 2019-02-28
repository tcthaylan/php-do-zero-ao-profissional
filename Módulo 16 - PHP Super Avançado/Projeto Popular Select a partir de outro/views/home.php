<h1>Projeto Popular Select a Partir de Outro</h1>

<select name="modulo" id="modulo">
    <option>Modulo</option>
    <?php foreach ($modulos as $modulo): ?>
        <option value="<?php echo $modulo['id']; ?>"><?php echo $modulo['titulo']; ?></option>
    <?php endforeach;?>
</select>

<select name="aula">
    <option>Aulas</option>
    <?php foreach ($aulas as $key => $value): ?>
        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
    <?php endforeach;?>
</select>