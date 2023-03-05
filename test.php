<?php
$colorSchemes = array(
    'light' => array(
        'bgColor' => '#004C6D',
        'navColor' => '#004C6D',
        'secondaryColor' => '#006a97',
        'mainColor' => '#00628c',
        'displayColor' => '#006a97',
        'searchColor' => '#015274'
    ),
    'dark' => array(
        'bgColor' => 'black',
        'navColor' => 'black',
        'secondaryColor' => 'black',
        'mainColor' => 'black',
        'displayColor' => 'black',
        'searchColor' => '#888888'
    )
);

$selectedScheme = $_POST['color'] ?? 'dark';
$currentScheme = $colorSchemes[$selectedScheme];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colors</title>
</head>

<body>
    <style>
        :root {
<?php foreach ($currentScheme as $prop => $value) { ?>
            --<?= $prop ?>: <?= $value ?>;
<?php } ?>
        }
    </style>
    <form action="" method="POST">
        <label for="color">Select a color scheme:</label>
        <select name="color">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select>
        <button>Apply</button>
    </form>

<?php foreach ($currentScheme as $prop => $value) { ?>
    <p style='color: var(--<?= $prop ?>);'><?= $prop ?> = <?= $value ?></p>
<?php } ?>
</body>

</html>