<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //User::flushEventListeners();
   


      $this->truncateTables([
        'currencies',
        'users',
        'countries',
        
      ]);

      $this->call([
        CurrenciesTableSeeder::class,
        UsersTableSeeder::class,
        CountriesTableSeeder::class,
        
        
      ]);

      DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }


    protected function truncateTables(array $tables){
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      foreach ($tables as $table) {
        DB::table($table)->truncate();
      }
      
    }
}
