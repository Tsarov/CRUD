<?php

echo '<form method="post" action="create.php">
    <label for="name">name:</label>
    <input type="text" name="name" placeholder="name">
    <label for="description">description</label>
    <input type="text" name="description" placeholder="desciption">
    <label for="created_at">created_at</label>
    <input type="text" name="created_at" placeholder="created_at" value="'.date( 'Y-m-d H:i:s', time()).'">
    <div >
        <input type="submit" class="btn btn-info" >
    </div>
</form>';

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {
    // insert sgl query

    $dbh = new PDO("pgsql:host=localhost;dbname=postgres", null, null);


    $sql = "INSERT INTO article (id, name, description, created_at) VALUES (:id, :name, :description, :created_at)";

    $pdo_statement = $dbh->prepare($sql);
    $pdo_statement->bindValue(":id", rand(1, 100000));
    $pdo_statement->bindValue(":name", $_POST['name']);
    $pdo_statement->bindValue(":description", $_POST['description']);
    $pdo_statement->bindValue(":created_at", $_POST['created_at']);
    var_dump($pdo_statement->execute());
    var_dump($pdo_statement->errorInfo());
}