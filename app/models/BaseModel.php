<?php
declare(strict_types = 1);

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Transaction\Manager as TransactionManager;

class BaseModel extends Model
{
    private $transaction;

    public function beginTransaction(): Model
    {
        $transaction = $this->getOrInitTransaction();

        return $this->setTransaction($transaction);
    }

    private function getOrInitTransaction(): Model\TransactionInterface
    {
        if ($this->transaction) {
            return $this->transaction;
        }
        $manager           = new TransactionManager();
        $this->transaction = $manager->get();

        return $this->transaction;
    }

    public function rollbackTransaction(string $message = ''): bool
    {
        $transaction = $this->getOrInitTransaction();

        return $transaction->rollback($message);
    }

    public function commitTransaction(): bool
    {
        $transaction = $this->getOrInitTransaction();

        return $transaction->commit();
    }
}