<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\subcategory;

class subcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 

	public function run(){ 
	        for($i = 1; $i <= 20 ; $i++){
	             $subcategory_data[] = [
			 		'name'           =>  str_random(6) .' clothes' ,    
					'description'    =>  str_random(10),  
					'img'            =>  rand(10 , 40) . '.jpg',   
	             ];
	        }

	        subcategory::insert($subcategory_data);
    	// }
	}






 
}
