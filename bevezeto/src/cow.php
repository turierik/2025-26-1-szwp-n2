<?php
    require_once(__DIR__ . "/../vendor/autoload.php");
    use Cowsayphp\Farm;
    $cow = Farm::create(\Cowsayphp\Farm\Cow::class);
    echo $cow -> say("Én vagyok kistehén.");
?>