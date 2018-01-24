<?php

use Illuminate\Database\Seeder;
use App\Vazamento;
use Faker\Factory as Faker;
class VazamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vazamento')->truncate();

        $faker = Faker::create();

        foreach (range(1,30) as $i) {
        	 

        	 Vazamento::create([

        	'endereco'=>$faker->streetAddress(),
        	'descricao'=>$faker->text($maxNbChars = 50),
        	'contato'=>$faker->tollFreePhoneNumber(),
        	'condicao'=>$faker->numberBetween($min = 1, $max = 2)



        	]);
        }
     
    }
}
