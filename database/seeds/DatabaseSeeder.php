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
        $this->call(FacilitiesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class); 
        $this->call(ProductStockSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(OrdersTableSeeder::class); 
        $this->call(OrderProductsTableSeeder::class);
        $this->call(ArrivalsTableSeeder::class);
        $this->call(ArrivalProductsTableSeeder::class);
        $this->call(ArrivalProductAnomaliesTableSeeder::class);       
    }
}
