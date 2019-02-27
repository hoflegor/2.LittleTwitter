<?php
//poniżej napisz kod definiujący klasę

class BankAccount {

    private $number;
    private $balance;

    static private $nextAccNumber =1;

    public function __construct(){
        $this->number=self::$nextAccNumber;
        self::$nextAccNumber++;

        $this->balance=0;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function depositCash($amount){
        if (is_numeric($amount) && $amount>0){
            $this->balance+=$amount;
        }
        else{
            echo "**Podano nieprawidłową wartość wpłaty!!";
        }
    }

    public function widthdrawCash ($amount){
        if (!is_numeric($amount) || $amount<=0){
            echo "**Podano nieprawidłową wartość wypłaty!!";

        }
        else{
            if ($this->balance-$amount<0){
                return $amount;
            }
            else {
                $this->balance -= $amount;
                return $amount;
            }
        }
    }

    public function printInfo(){
        echo "<br><strong>ID konta: </strong>$this->number<br><strong>Saldo: </strong>$this->balance<br>";
    }

}

$ba1=new BankAccount();
$ba2=new BankAccount();
$ba3=new BankAccount();
$ba4=new BankAccount();
var_dump($ba1,$ba2,$ba3,$ba4);
