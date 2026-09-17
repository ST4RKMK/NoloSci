<?php

namespace Database\Seeders;


use App\Models\Admin\Catalog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=fake('it');

        for($i=0;$i<rand(10,50);$i++){
            $data = $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now', $timezone = null);
            $catalogo=Catalog::create([
               'name'=>$faker->name,
               'type'=>'',
               'price'=>$faker->numberBetween(1,100),
                'active'=>true,
                'available_from'=>$data,
                'available_to'=>Carbon::createFromDate($data)->addMonths($faker->numberBetween(1,100)),
            ]);
            $variants = $this->createVariants();
            $catalogo->extend()->create(['meta'=>$variants]);
        }

    }

    private function createVariants(){
        $data=[];
        $tg = range(27,64);
        $colori=['bianco','nero','rosso','blue','giallo','verde'];
        $altezza=range(100,200);
        $faker=fake('it');
        foreach(range(1,rand(5,20)) as $items){
            $data[]=[
              'taglia'=>$faker->randomElement($tg),
              'colore'=>$faker->randomElement($colori),
              'disponibilita'=>rand(1,40),
              'altezza'=>$faker->randomElement($altezza),
            ];
        }
        return $data;
    }


}
