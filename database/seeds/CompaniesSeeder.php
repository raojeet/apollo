<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
      App\Models\Company::create([
          'name'      => 'Paradox',
          'telephone' => '0860 000 000',
          'email'     => 'indo@paradox.com',
          'address'   => '1 Kingsway Street',
          'address_2' => 'Auckland Park',
          'city'      => 'Johannesburg',
          'province'  => 'Gauteng',
          'country'   => 'South Africa',
      ]);
  }
}