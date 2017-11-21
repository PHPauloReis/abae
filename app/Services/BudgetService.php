<?php

namespace App\Services;

use App\Repositories\BudgetItemRepository;
use App\Repositories\BudgetRepository;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class BudgetService
{
    protected $budgetRepository;
    protected $budgetItemRepository;

    public function __construct(BudgetRepository $budgetRepository, BudgetItemRepository $budgetItemRepository)
    {
        $this->budgetRepository = $budgetRepository;
        $this->budgetItemRepository = $budgetItemRepository;
    }

    public function create($data)
    {
        try {
            // Inicia uma transação no banco de dados
            DB::beginTransaction();

            $budget = $this->budgetRepository->insert($data);

            foreach($data['budgetItem'] as $budgetItem) {
                $budgetItem['budget_id'] = $budget->id;
                $this->budgetItemRepository->insert($budgetItem);
            }

            // Se tudo deu certo, commit a transação
            DB::commit();
        } catch (\Exception $e) {
            // Em caso de falha, realiza o Rollback
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}