<?
function dd_dump($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die(); // Halt script execution after dumping
}