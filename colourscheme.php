<?php
$colorSchemes = array(
    'light' => array (
        'bgColor' => '#004C6D',
        'navColor' => '#004C6D',
        'secondaryColor' => '#006a97',
        'mainColor' => '#00628c',
        'displayColor' => '#006a97',
        'searchColor' => '#015274'
    ),
    'dark' => array (
        'bgColor' => 'DimGray',
        'navColor' => 'DimGray',
        'secondaryColor' => 'black',
        'mainColor' => 'black',
        'displayColor' => '#606060',
        'searchColor' => 'DimGray'
    )
);

if (isset($_POST['color'])){
    $_SESSION['scheme'] = $_POST['color'];
}
if (isset($_SESSION['scheme'])){
    $currentScheme = $colorSchemes[$_SESSION['scheme']];
}
?>