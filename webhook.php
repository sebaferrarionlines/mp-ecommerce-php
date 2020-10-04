<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myfile = fopen("info1.txt", "a") or die("Unable to open file!");
    
    $txt = file_get_contents('php://input');
    fwrite($myfile, $txt);
    
    fclose($myfile);
    
    $myfile2 = fopen("info2.txt", "w") or die("Unable to open file!");
    $txt2 = "Entro al POST.";
    fwrite($myfile2, $txt2);
    fclose($myfile2);
}
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $myfile = fopen("info2.txt", "a") or die("Unable to open file!");
    $txt = json_encode($_GET);
    fwrite($myfile, $txt);
    fclose($myfile);
}

$myfile = fopen("info.txt", "a") or die("Unable to open file!");
$txt = json_encode($_REQUEST);
fwrite($myfile, $txt);
fclose($myfile);

http_response_code(200);