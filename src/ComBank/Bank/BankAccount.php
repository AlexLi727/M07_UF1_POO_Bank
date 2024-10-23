<?php namespace ComBank\Bank;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/27/24
 * Time: 7:25 PM
 */

use ComBank\Exceptions\BankAccountException;
use ComBank\Exceptions\InvalidArgsException;
use ComBank\Exceptions\ZeroAmountException;
use ComBank\OverdraftStrategy\Contracts\OverdraftInterface;
use ComBank\OverdraftStrategy\NoOverdraft;
use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Exceptions\FailedTransactionException;
use ComBank\Exceptions\InvalidOverdraftFundsException;
use ComBank\Support\Traits\AmountValidationTrait;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class BankAccount implements BankAccountInterface
{
    private $balance;
    private $status;
    private $overdraft;

    public function __construct($balance, $overdraft){
        $this->balance = $balance;
        $this->overdraft = $overdraft;
    }

    public function transaction(BankTransactionInterface $transaction){
        $newAmount = $transaction->applyTransaction($this);
        $this->setBalance($newAmount);
    }

    public function openAccount():bool{
        return $this-> status;
    }

    public function reopenAccount(){
        $this->status = true;
    }

    public function closeAccount(){
        $this->status = false;
    }

    public function getBalance():float{
        return $this->balance;
    }

    public function getOverdraft():OverdraftInterface{
        return $this->overdraft;
    }

    public function applyOverdraft(OverdraftInterface $overdraft){
        $overdraft->isGrantOverdraftFunds($this->getBalance());
    }

    public function setBalance(float $amount){
        $this->balance = $amount;
    }
    }
