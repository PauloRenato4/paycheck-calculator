<?php
class PaycheckService {
    
    public static function getINSS($salary) {
        //salário até 1.399,12
        if($salary < 1399.13) {
            return $salary * 0.08; //8% of salary
        }
        //De 1.399,13 até 2.331,88
        else if($salary >= 1399.13 && $salary <= 2331.88) { 
            return $salary * 0.09; //9% of salary
        }
        //De 2.331,89 até 4.663,75
        else if($salary >= 2331.89 && $salary <= 4663.75) { 
            return $salary * 0.11; //11% of salary
        } 
        //salário ultrapassar os R$ 4.663,75
        else {
            return 513.02;
        }   
    }
    
    public static function getBaseSalary($salary) {
        $inss = self::getINSS($salary);
        return $salary - $inss;
    }
    
    public static function getIR($baseSalary) {
        //Até 1.903,98
        $irpf = 0.00;
        
        //De 1.903,99 até 2.826,65
        if($baseSalary >= 1903.99 && $baseSalary <= 2826.65) { 
        	$irpf = ($baseSalary * 0.075) - 142.80;
        }
        //De 2.826,66 até 3.751,05
        else if($baseSalary >= 2826.66 && $baseSalary <= 3751.05) { 
        	$irpf = ($baseSalary * 0.15) - 354.80;
        }
        //De 3.751,06 até 4.664,68
        else if($baseSalary >= 3751.06 && $baseSalary <= 4664.68) { 
        	$irpf = ($baseSalary * 0.225) - 636.13; 
        }
        //Acima de 4.664,68
        else if ($baseSalary > 4664.68) {
        	$irpf = ($baseSalary * 0.275) - 869.36;
        }
        
        return $irpf;
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