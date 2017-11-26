<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->usersTableSeed();
        $this->customersTableSeed();
        $this->chartOfAccountTableSeeder();
        $this->financialTransactionTableSeeder();
    }

    private function usersTableSeed()
    {
        $this->call(UsersTableSeeder::class);
    }

    private function customersTableSeed()
    {
        // Cria 30 registros na tabela Customers
        factory(App\Customer::class, 30)->create()->each(function($customer) {
            $sorted = rand(1, 5);

            if($sorted % 2 == 0 && $customer->active == 'Y') {
                $customer->contributions()->save(factory(App\Contribution::class)->make());
            }
        });
    }

    private function chartOfAccountTableSeeder()
    {
        factory(App\ChartOfAccount::class, 7)->create();
    }

    private function financialTransactionTableSeeder()
    {
        factory(App\FinancialTransaction::class, 3)->create();
    }
}
