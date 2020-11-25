<?php

function sfxexchangeratesGetExchange($a, $b)
{

    $html = file_get_html("https://www.google.com/search?q={$a}+to+{$b}");
    if (!$html) return;

    // echo $html;
    $first = $html->find('.BNeawe', 0);
    if (!$first) return;
    $last = $html->find('.BNeawe', 1);
    if (!$last) return;

    $first = str_replace("=", "", utf8_encode($first->plaintext));
    $first = preg_replace('~^([0-9]+)~usmi', '', $first);

    $result = preg_replace('~(([0-9]+),([0-9]+))~usmi', '$1 -', utf8_encode($last->plaintext));
    $resultArray = explode("-", $result);
    // print_r($resultArray);
    return [
        "first" => trim($first),
        "exchange" => trim($resultArray[0]),
        "last" => trim($resultArray[1]),
    ];
}
