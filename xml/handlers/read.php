<?php
    include '../../table.php';

    $dom_xml = new DOMDocument();
    $dom_xml->load('../real_estate.xml');

    $estates = $dom_xml->getElementsByTagName("estate");
    echo createTableXML($estates);
?>