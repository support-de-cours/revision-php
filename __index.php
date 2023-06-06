<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exemple PHP</h1>

    <?php
    $name = "John";
    ?>

    <div>Username : <?= $name ?></div>
    <div>Username : <?php echo $name ?></div>


    <hr>

    <?php 
    // Tableau numérique
    $fruits = [
        /* 0 */ "Pomme", 
        /* 1 */ "Poire", 
        /* 2 */ "Banane"
    ];
    ?>

    <ul>
        <li><?= $fruits[0] ?></li>
        <li><?= $fruits[1] ?></li>
        <li><?= $fruits[2] ?></li>
    </ul>

    <ul>
        <?php foreach($fruits as $key => $value) { ?>
            <li><?= $key ?> - <?= $value ?></li>
        <?php } ?>
    </ul>
    <ul>
        <?php foreach($fruits as $value) { ?>
            <li><?= $value ?></li>
        <?php } ?>
    </ul>


    <ul>
        <?php foreach($fruits as $key => $value): ?>
            <li><?= $key ?> - <?= $value ?></li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach($fruits as $value): ?>
            <li><?= $value ?></li>
        <?php endforeach; ?>
    </ul>


        <?php 
        // Tableau numerique 
        $user_1 = [
            "John",
            "DOE"
        ];
        ?>
        <pre><?php print_r($user_1) ?></pre>


        <?php 
        // Tableau associatif 
        $user_2 = [
            'firstname' => "John",
            'lastname' => "DOE"
        ];
        ?>
        <pre><?php print_r($user_2) ?></pre>

        <hr>
        <pre><?php print_r(array(
            "chaine de caractère",
            true,
            false,
            42,
            21.5,
            [1,2,3],
            (object) [
                'firstname' => "John",
                'lastname' => "DOE"
            ],
            new stdClass,

        )) ?></pre>

        <hr>

        <?php 
        // Array
        $user_arr = [
            'firstname' => "John",
            'lastname' => "DOE"
        ];
        ?>
        <ul>
            <li><?= $user_arr['firstname'] ?></li>
            <li><?= $user_arr['lastname'] ?></li>
        </ul>

        <?php 
        // Array
        $user_obj = (object) [
            'firstname' => "John",
            'lastname' => "DOE"
        ];
        ?>
        <ul>
            <li><?= $user_obj->firstname ?></li>
            <li><?= $user_obj->lastname ?></li>
        </ul>
    

        <hr>

        <?php 
        $myArray = [
            (object) [
                'key' => 1,
                'value' => "something"
            ]
        ];

        array_push($myArray, (object) [
            'key' => 2,
            'value' => "something"
        ]);

        array_push($myArray, (object) [
            'key' => end($myArray)->key+1,
            'value' => "something"
        ]);


        addToArray($myArray, [
            'key' => end($myArray)->key+1,
            'value' => "something "
        ]);

        function addToArray(array &$haystack, array $value)
        {
            $haystack[] = (object) $value;
        }

        ?>

        <pre><?php print_r($myArray) ?></pre>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
</body>
</html>