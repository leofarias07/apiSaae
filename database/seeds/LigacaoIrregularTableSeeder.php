<?php

use Illuminate\Database\Seeder;
use App\LigacaoIrregular;
use Faker\Factory as Faker;
class LigacaoIrregularTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ligacao_irregulars')->truncate();

        $faker = Faker::create();

        foreach (range(1,30) as $i) {
        	 

        	 LigacaoIrregular::create([

        	'endereco'=>$faker->streetAddress(),
        	'descricao'=>$faker->text($maxNbChars = 50),
        	'condicao'=>$faker->numberBetween($min = 1, $max = 2)



        	]);
        }
     
    
    }
}
