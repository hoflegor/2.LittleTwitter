<?php
//poniżej napisz kod definiujący klasę
class BankAccount {

    private $number;
    private $balance;

    public function __construct($number){
        $this->number=$number;
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

$ba1=new BankAccount(666);
$ba1-> depositCash(900);
$ba1->printInfo();
$ba1->widthdrawCash(600);
$ba1->printInfo();
$ba1->widthdrawCash(400);
$ba1->printInfo();
