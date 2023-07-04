<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Front End', 'Back End', 'Full Stack', 'Data Management', 'WordPress','Design',];

        foreach($data as $type){
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($type, '-');
            $new_type->save();
        }
    }
}
