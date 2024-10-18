<?php
    include '../../table.php';

    $realestate_path = "../real_estate.json";
    $realestate_content = file_get_contents($realestate_path);
    $realestate_json = json_decode($realestate_content, true);

    echo createTableJSON($realestate_json["realestate"]);
?>