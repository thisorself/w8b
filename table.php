<?php
function createTableXML($domElements)
{
    $table = "<table border='1'><thead><tr>";
    foreach ($domElements as $domElement) {
        foreach ($domElement->childNodes as $child) {
            if ($child->nodeType == XML_ELEMENT_NODE) {
                $table .= "<th>" . $child->nodeName . "</th>";
            }
        }
        break;
    }
    $table .= "</tr></thead><tbody>";

    foreach ($domElements as $domElement) {
        $table .= "<tr>";
        foreach ($domElement->childNodes as $child) {
            if ($child->nodeType == XML_ELEMENT_NODE) {
                $table .= "<th>" . $child->nodeValue . "</th>";
            }
        }
        $table .= "</tr>";
    }
    $table .= "</tbody></table>";
    return $table;
}

function createTableJSON($array)
{
    $table = "<table border='1'><thead><tr>";
    foreach ($array as $item) {
        foreach ($item as $key => $value) {
            $table .= "<th>" . $key . "</th>";
        }
        break;
    }
    $table .= "</tr></thead><tbody>";

    foreach ($array as $item) {
        $table .= "<tr>";
        foreach ($item as $key => $value) {
            $table .= "<td>" . $value . "</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</tbody></table>";
    return $table;
}
?>