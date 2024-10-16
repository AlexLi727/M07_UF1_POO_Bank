<?php namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 11:30 AM
 */

use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class DepositTransaction implements BankTransactionInterface
{
    public function applyTransaction(BankAccountInterface $amount){
        
    }

    public function getTransactionInfo():string{
        return "smth";
    }

    public function getAmount():float{
        return $this->getAmount();
    }


   
}
