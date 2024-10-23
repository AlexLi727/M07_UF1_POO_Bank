<?php namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 1:22 PM
 */

use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Exceptions\InvalidOverdraftFundsException;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class WithdrawTransaction extends BaseTransaction implements BankTransactionInterface
{
    public function applyTransaction(BankAccountInterface $account):float{
        $newBalance = $account->getBalance() - $this->amount;

        if ($account->applyOverdraft($account->getOverdraft())) {
            return $newBalance;
        }
        throw new InvalidOverdraftFundsException("Error Processing Request", 1);
        


    }

    public function getTransactionInfo():string{
        return "smth";
    }

    public function getAmount():float{
        return $this->amount;
    }
   
}
