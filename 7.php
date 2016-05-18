<?php

/**
 * Zadanie:
 * https://www.codeeval.com/open_challenges/7/
 */

namespace CodeEval\PrefixExpression;

/**
 * Interfejs implementowany przez procesor operatorów arytmetycznych
 */
interface OperatorProcessor {
    /**
     * Przetwarzanie operatora
     *
     * @param op1 pierwszy operand
     * @param op2 drugi operand
     * @param operator operator do obsłużenia
     * @return obliczony wynik operacji
     */
    public function process($op1, $op2, $operator);
}

/**
 * Klasa przetwarzająca wyrażenie prefixowe
 */
class Processor {
    public function __construct($expression, OperatorProcessor $processor) {
        $this->data = array_reverse(explode(' ', $expression));
        $this->operands = new \SplStack();
        $this->processor = $processor;
    }
    
    public function getResult() {
        return $this->result;
    }
    
    public function process() {
        if($this->result != -1) return;

        foreach($this->data as $token) {
            $this->processToken($token);
        }
        $this->result = $this->operands->pop();
    }
    
    private function processToken($token) {
        if($token == '') return;
        if(is_numeric($token)) {
            $this->operands->push((int)$token);
        }
        else {
            $op1 = $this->operands->pop();
            $op2 = $this->operands->pop();
            $this->operands->push($this->processor->process($op1, $op2, $token));
        }
    }
    
    private $data;
    private $operands;
    private $processor;
    private $result = -1;
}

/**
 * Podstawowa obsługa operatorów - tylko te wymienione w zadaniu
 * Obsługuje dodawanie/mnożenie/dzielenie
 */
class BasicProcessor implements OperatorProcessor {
    public static function process($op1, $op2, $operator) {        
        $res = 0;
        switch($operator) {
            case '*':
                $res = $op1 * $op2;
                break;
            case '+':
                $res = $op1 + $op2;
                break;
            case '/':
                $res = $op1 / $op2;
                break;
        }
        return $res;
    }
}

$fh = fopen($argv[1], "r");
while (true) {
    $test = trim(fgets($fh));
    if($test == '') break;

    $processor = new Processor($test, new \BasicProcessor());
    $processor->process();
    
    $str = sprintf("%d\n", $processor->getResult());
    fwrite(STDOUT, $str);
}
