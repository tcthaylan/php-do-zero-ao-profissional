<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Projeto Ordenação de Resultados</title>
  </head>
  <body>

  <?php 
  
  require_once("config.php");
  
  if (isset($_GET["ordem"]) && !empty($_GET["ordem"])) {

    $ordem = addslashes($_GET["ordem"]);

    $stmt = $conn->prepare("SELECT * FROM usuarios ORDER BY $ordem");

    $stmt->execute();

  } else {

    $ordem = '';
    
    $stmt = $conn->prepare("SELECT * FROM usuarios");

    $stmt->execute();
  }

  ?>


  <div class="container">
    
    <div class="row justify-content-center">
      <div class="col-6">
        <h1>Ordenação de Resultados</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <form method="GET">
          <div class="form-group">
            <label><strong>Ordenar:</strong></label>
            <select class="form-control" name="ordem" onchange="this.form.submit()">
              <option value="null">Selecione</option>
              <option value="id" <?php echo($ordem == "id")?"selected='selected'":''; ?>>Id</option>
              <option value="nome" <?php echo($ordem == "nome")?"selected='selected'":''; ?>>Nome</option>
              <option value="idade" <?php echo($ordem == "idade")?"selected='selected'":''; ?>>Idade</option>
            </select>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#id</th>
            <th scope="col">Nome</th>
            <th scope="col">Idade</th>
          </tr>
        </thead>
        <tbody>
            
          <?php

          if ($stmt->rowCount() > 0) {
              
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $usuario) {
              
              echo "<tr>";
                
              echo "<td>".$usuario["id"]."</td>";
              echo "<td>".$usuario["nome"]."</td>";
              echo "<td>".$usuario["idade"]."</td>";
  
              echo "</tr>";
            }
          }

          ?>

        </tbody>
      </table>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
