<?php

use Illuminate\Database\Seeder;
use App\FaltaDeAgua;
use Faker\Factory as Faker;
class FaltaDeAguaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('falta_de_aguas')->truncate();

        $faker = Faker::create();

        foreach (range(1,30) as $i) {
        	 

        	 FaltaDeAgua::create([

        	'endereco'=>$faker->streetAddress(),
        	'descricao'=>$faker->text($maxNbChars = 50),
        	'contato'=>$faker->tollFreePhoneNumber(),
        	'condicao'=>$faker->numberBetween($min = 1, $max = 2)



        	]);
        }
    }
}
