<?php

namespace Database\Seeders;


use App\Models\Admin\Catalog;
use App\Models\System\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=fake('it');

        for($i=0;$i<rand(15,25);$i++) {
            $data = $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now', $timezone = null);

            $d=['price','discount'];
            $dt=[
                'name'=>$faker->company,
                'description'=>$faker->text($maxNbChars = 200),
                'active'=>true,
                'status'=>true,
                'available_from'=>$data,
                'available_to'=>Carbon::createFromDate($data)->addMonths(rand(1,12)),
//                'price'=>rand(100,500),
//                'discount'=>rand(0,100),
                $faker->randomElement(['price','discount'])=> $faker->randomElement(['price'=>rand(10,75),'discount'=>rand(10,75)])
            ];

            $package=Package::create($dt);
            $this->getElementsChilds($package);
//            $this->getElementsChilds($package);
//            $this->getElementsChilds($package);

        }
    }

    private function getElementsChilds(Package $package){
        $faker=fake('it');

        $prd = Catalog::get()->map(fn($e)=>['toable_id'=>$e->id,'toable_type'=>Catalog::class]);
        $prd=$prd->merge(Package::where('id','!=',$package->id)->get()->map(fn($e)=>['toable_id'=>$e->id,'toable_type'=>Package::class]));
        $pprd=$prd->toArray();
        shuffle($pprd);

        $paperelle = $faker->randomElements($pprd,rand(1,round($prd->count()/rand(2,4))));

        foreach($paperelle as $paperella){
            $package->from()->create($paperella);
        }
    }

}
