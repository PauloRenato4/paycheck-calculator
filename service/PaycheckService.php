<?php
class PaycheckService {
    
    public static function getINSS($salary) {
        return $salary * 0.11;
    }
    
    public static function getBaseSalary($salary) {
        $inss = self::getINSS($salary);
        return $salary - $inss;
    }
    
    public static function getIR($baseSalary) {
        return $baseSalary * 0.07;
    }
    
    public function getLiquidSalary($salary) {
        $liquidSalary = 0.0;
        
        $inss = self::getINSS($salary);
        $baseSalary = self::getBaseSalary($salary);
        $ir = self::getIR($salary - $inss);
        $liquidSalary = $salary - $inss - $ir;
        
        return $liquidSalary;
    }
}
?>