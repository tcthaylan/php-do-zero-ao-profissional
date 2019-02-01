<?php

$dsn    = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try {

    $conn = new PDO($dsn, $dbuser, $dbpass);

    //PDO::prepare — Prepares a statement for execution and returns a statement object
    $stmt = $conn->prepare("SELECT * FROM posts");

    //PDOStatement::execute — Executes a prepared statement, return a bool
    $stmt->execute();

    //PDOStatement::fetchAll — Returns an array containing all of the result set rows
    //PDO::FETCH_ASSOC - filtra o array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        
        foreach ($row as $key => $value) {
            
            echo $key.": ".$value."<br>";
        }

        echo "====================================================================<br>";
    }

} catch (PDOException $e) {

    echo "Error: ".$e->getMessage();
}

?>
<?php

// vamos partir do pressuposto que temos um objeto PDO instanciado e devidamente configurado e iremos trabalhar com a mesma consulta dos exemplos anteriores
$query = "SELECT * FROM tabela WHERE username = ?";
 
// o método PDO::prepare() retorna um objeto da classe PDOStatement ou FALSE se ocorreu algum erro (neste caso use $pdo->errorInfo() para descobrir o que deu errado)
$stmt = $pdo->prepare($query);
 
// agora que temos o statement preparado, precisamos "bindar" a variável
$username = "fulano";
 
// utilizamos o método PDOStatement::bindValue() que aceita como parâmetros a posição do ? que a variável irá substituir (a primeira é 1) e a própria variável
$stmt->bindValue(1, $username);
 
// executamos o statement
$ok = $stmt->execute();
 
// agora podemos pegar os resultados (partimos do pressuposto que não houve erro)
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>