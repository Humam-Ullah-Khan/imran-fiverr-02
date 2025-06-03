<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormHeading;

class FormHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$firstQ = [];

    	$firstQ[] = [
    		'eng_heading'	=> 'Information', 
    		'urdu_heading' 	=> 'Information', 
    		'parent_id'	 => 0 
    	];


    	$firstQ[] = [
    		'eng_heading'	=> 'Food Frequency Questionnaire', 
    		'urdu_heading' 	=> 'Food Frequency Questionnaire', 
    		'parent_id'	 => 0 
    	];

    	foreach ($firstQ as $keyName => $firstValue) {
    		FormHeading::create([
    			'eng_heading'	=> $firstValue['eng_heading'],
				'urdu_heading' 	=> $firstValue['urdu_heading'],
				'parent_id' 	=> $firstValue['parent_id']
    		]);
    		# code...
    	}


    	$subHeading = [];
    	$subHeading[] = [
    		'eng_heading'	=> 'Personal Information', 
    		'urdu_heading' 	=> 'Personal Information', 
    		'parent_id'	 	=> 1 
    	];

        $subHeading[] = [
            'eng_heading'   => 'A: SCREENING FORM', 
            'urdu_heading'  => 'اسکریننگ فارم', 
            'parent_id'     => 1 
        ];


    	foreach ($subHeading as $keysubHeading => $firstSubHeading) {
    		FormHeading::create([
    			'eng_heading'	=> $firstSubHeading['eng_heading'],
				'urdu_heading' 	=> $firstSubHeading['urdu_heading'],
				'parent_id' 	=> $firstSubHeading['parent_id']
    		]);
    		# code...
    	}



        //
    }
}
