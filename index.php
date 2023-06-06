<?php 
// Config
// --


require_once "config.php";

// DB Connection
// --

try {
    $database_dsn = 'mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_schema.';charset='.$db_charset;
    $pdo = new PDO($database_dsn, $db_user, $db_pass);
} 
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
    die;
}

// Form treatment
// --

$firstname = null;
$lastname = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $error = false;
    $data = $_POST;

    $firstname = isset($data['firstname']) ? trim($data['firstname']) : $firstname;
    $lastname = isset($data['lastname']) ? trim($data['lastname']) : $lastname;

    // Check from
    if (strlen($firstname) <= 0)
    {
        $error = true;
    }

    if (strlen($lastname) <= 0)
    {
        $error = true;
    }


    if (!$error)
    {
        $sql = "INSERT INTO users (`firstname`, `lastname`) VALUES (:firstname, :lastname)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

        // if ($id = $pdo->lastInsertId())
        // {
        // }
        // header("Location: ".$_SERVER['HTTP_HOST']);
        // exit;
    }
    else
    {
        echo "Affiche les erreur";
    
    }

    // print_r($data);
}

// Retrieve DB Data
// --

$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Form</h2>

    <form method="POST">
        <div>
            <label for="firstname_field">Firstname</label>
            <input type="text" id="firstname_field" name="firstname" value="<?= $firstname ?>">
        </div>
        <div>
            <label for="lastname_field">Lastname</label>
            <input type="text" id="lastname_field" name="lastname" value="<?= $lastname ?>">
        </div>
        <button type="reset">cancel</button>
        <button type="submit">submit</button>
    </form>

    <hr>
    <h2>Results</h2>

    <div>
        Total users : <?= count($users) ?>
    </div>
    <ul>
    <?php foreach($users as $user): ?>
        <li><?= $user->id ?> - <?= $user->firstname ?> <?= $user->lastname ?></li>
    <?php endforeach; ?>
    </ul>

</body>
</html>