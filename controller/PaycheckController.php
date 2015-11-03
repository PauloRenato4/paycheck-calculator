<?php
require('../service/PaycheckService.php');

$salary = $_GET['salary'];

if(is_numeric($salary)) {
    $inss = PaycheckService::getINSS($salary);
    $baseSalary = PaycheckService::getBaseSalary($salary);
    $ir = PaycheckService::getIR($baseSalary);
    $liquidSalary = PaycheckService::getLiquidSalary($salary);
}

$calculation = array (
    'INSS' => $inss,
    'IRPF' => $ir,
    'liquidSalary' => $liquidSalary
);

echo json_encode($calculation);
?>
