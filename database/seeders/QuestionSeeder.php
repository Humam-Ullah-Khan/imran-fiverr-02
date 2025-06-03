<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Option;

class QuestionSeeder extends Seeder
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
    		'key_eng'	 => 'interviewer_eng_name', 
    		'key_urdu' 	 => 'interviewer_urdu_name', 
    		'title_eng'	 => 'Name of interviewer:' , 
    		'title_urdu' => 'انٹرویو لینے والے/والی کا نام:'
    	];

    	$firstQ[] = [
    		'key_eng'  	 => 'interviewer_eng_date',
    		'key_urdu' 	 => 'interviewer_urdu_date', 
    		'title_eng'	 => 'Date of interview:' , 
    		'title_urdu' => 'انٹرویوکی تاریخ:'
    	];

    	$firstQ[] = [
    		'key_eng'  	 => 'interviewer_eng_start_time',
    		'key_urdu' 	 => 'interviewer_urdu_start_time', 
    		'title_eng'	 => 'Time at the start of interview:' , 
    		'title_urdu' => 'انٹرویو  شروع   ہونے کا و‍‍ قت:'
    	];

        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_end_time',
            'key_urdu'   => 'interviewer_urdu_end_time', 
            'title_eng'  => 'Time at the end of interview:' , 
            'title_urdu' => 'انٹرویو ختم  ہونے کا و‍‍ قت'
        ];

     

        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_participant_first_name',
            'key_urdu'   => 'interviewer_urdu_participant_first_name', 
            'title_eng'  => 'Participant’s first name:' , 
            'title_urdu' => 'شرکاء کا پہلا نام: '
        ];

        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_participant_last_name',
            'key_urdu'   => 'interviewer_urdu_participant_last_name', 
            'title_eng'  => 'Last Name:' , 
            'title_urdu' => 'آ‏خری(‏خاندانی/والد/شوہر) نام:'
        ];


        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_residential_address',
            'key_urdu'   => 'interviewer_urdu_residential_address', 
            'title_eng'  => 'Residential Address:' , 
            'title_urdu' => 'گھر /رہا ئش کا '
        ];



        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_province',
            'key_urdu'   => 'interviewer_urdu_province', 
            'title_eng'  => 'Province:' , 
            'title_urdu' => ':صوبہ'
        ];


        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_city',
            'key_urdu'   => 'interviewer_urdu_city', 
            'title_eng'  => 'City:' , 
            'title_urdu' => ':شہر'
        ];

        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_personal_contact_number1',
            'key_urdu'   => 'interviewer_urdu_personal_contact_number1', 
            'title_eng'  => 'Personal Contact number (1):' , 
            'title_urdu' => 'ذاتی رابطے کا نمبر(1):'
        ];


        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_personal_contact_number2',
            'key_urdu'   => 'interviewer_urdu_personal_contact_number2', 
            'title_eng'  => 'Personal Contact number (2):' , 
            'title_urdu' => 'ذاتی رابطے کا نمبر(2):'
        ];


        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_family_contact_number',
            'key_urdu'   => 'interviewer_urdu_family_contact_number', 
            'title_eng'  => 'Family Contact number:' , 
            'title_urdu' => 'خاندان /گھر کےرابطے کا نمبر:'
        ];

        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_area_of_residence',
            'key_urdu'   => 'interviewer_urdu_area_of_residence', 
            'title_eng'  => 'Area of residence:' , 
            'title_urdu' => 'رہا ئش کا علاقہ:',
            'q_type' => 'option',
        ];


        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_interviewer_signature',
            'key_urdu'   => 'interviewer_urdu_interviewer_signature', 
            'title_eng'  => 'Interviewer’s signature:' , 
            'title_urdu' => 'انٹرویو کرنے والے/والی کی دستخط:'
        ];

        $firstQ[] = [
            'key_eng'    => 'interviewer_eng_form_filled_by',
            'key_urdu'   => 'interviewer_urdu_form_filled_by', 
            'title_eng'  => 'Form filled by:' , 
            'title_urdu' => 'فارم پر کرنے والے/والی کا نام:'
        ];



    	

    	foreach ($firstQ as $keyName => $firstValue) {
    		$questionCreate = Question::create([
    			'title_eng'		=> $firstValue['title_eng'],
				'title_urdu' 	=> $firstValue['title_urdu'],
				'key_eng' 		=> $firstValue['key_eng'],
				'key_urdu' 		=> $firstValue['key_urdu'],
				'heading_id' 	=>  1,
				'sub_heading_id' => 3,
				'step_no' 		 => 1,
				'q_type' 		 => isset($firstValue['q_type']) ?  $firstValue['q_type'] : 'blank',
				'sort_by'		 => ($keyName+1)
    		]);

            if (isset($firstValue['q_type'])) {

                Option::create([
                    'english_title' => '01- Urban',
                    'urdu_title'    => '01-شہر',
                    // 'status'        => ,
                    'question_id'   => $questionCreate->id,
                ]);

                Option::create([
                    'english_title' => '02- Rural',
                    'urdu_title'    => '02-دیہات/گاوں',
                    // 'status'        => ,
                    'question_id'   => $questionCreate->id,
                ]);
                # code...
            }
    		# code...
    	}


        // screening form

        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_are_you_currently_pregnant',
            'key_urdu'   => 'interviewer_urdu_are_you_currently_pregnant', 
            'title_eng'  => 'Are you currently pregnant?
(applicable for female participants)' , 
            'title_urdu' => 'کیا آپ اس وقت حاملہ ہیں؟
(صرف خواتین کے لئیے)
',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If yes, do not ask any further questions.' , 
                'urdu_skip' => 'اگر ہاں، تو مزید سوال نہ کریں'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];



        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_undergo_coronary_bypass',
            'key_urdu'   => 'interviewer_urdu_undergo_coronary_bypass', 
            'title_eng'  => 'Did you undergo coronary bypass 
grafting procedure in the past?' , 
            'title_urdu' => 'کیا آپکا   ماضی میں با‎ئ پاس کا آپریشن ہوا ہے؟',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If yes, do not ask any further questions.' , 
                'urdu_skip' => 'اگر ہاں، تو مزید سوال نہ کریں'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];


        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_undergo_coronary_angioplasty',
            'key_urdu'   => 'interviewer_urdu_undergo_coronary_angioplasty', 
            'title_eng'  => 'Did you undergo coronary angioplasty 
in the past or had any stent placement?' , 
            'title_urdu' => 'کیا ماضی میں آپکی اینجیوپلاسٹی ہوئ ہے یا آپکے دل کی
شریانوں میں جالی ڈالی گئ ہے؟
',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If yes, do not ask any further questions.' , 
                'urdu_skip' => 'اگر ہاں، تو مزید سوال نہ کریں'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];



        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_suffered_from_myocardial',
            'key_urdu'   => 'interviewer_urdu_suffered_from_myocardial', 
            'title_eng'  => 'Have you ever suffered from myocardial 
infarction (heart attack) in the past?' , 
            'title_urdu' => 'کیا آپکو ماضی میں کبھی دل کل دورہ پڑا ہے؟',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If yes, do not ask any further questions.' , 
                'urdu_skip' => 'اگر ہاں، تو مزید سوال نہ کریں'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];


        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_suffered_from_stroke_paralysis',
            'key_urdu'   => 'interviewer_urdu_suffered_from_stroke_paralysis', 
            'title_eng'  => 'Have you ever suffered from stroke
(paralysis) in the past?' , 
            'title_urdu' => 'کیا آپکو ماضی میں کبھی دل کل دورہ پڑا ہے؟',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If yes, do not ask any further questions.' , 
                'urdu_skip' => 'اگر ہاں، تو مزید سوال نہ کریں'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];


        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_episode_of_servere_chest_pain',
            'key_urdu'   => 'interviewer_urdu_episode_of_servere_chest_pain', 
            'title_eng'  => 'Did you ever have an episode of severe 
chest pain?' , 
            'title_urdu' => 'کیا آپکو ماضی میں کبھی  ‎شدید دل کا درد محسوس ہوا ہے؟',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If ‘No’ skip to q7' , 
                'urdu_skip' => 'اگر نہیں تو سوال   7پر جائیں'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];



        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_medication_to_resolve_chest_pain',
            'key_urdu'   => 'interviewer_urdu_medication_to_resolve_chest_pain', 
            'title_eng'  => 'Were you given any medication to resolve chest pain?' , 
            'title_urdu' => 'کیا آپنے ماضی میں دل کے دردکے لئیے کوئ دوائ لی؟ ',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If yes, do not ask any further questions.' , 
                'urdu_skip' => 'اگر ہاں، تو مزید سوال نہ کریں'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];


        $screenQ[] = [
            'key_eng'    => 'interviewer_eng_suffered_urrently_are_suffering_last_q',
            'key_urdu'   => 'interviewer_urdu_suffered_urrently_are_suffering_last_q', 
            'title_eng'  => 'Have you suffered from or currently are
suffering from:
•   Excruciating leg cramps
•   Gangrene
•   Non-healing wounds
•   Amputation
•   Pale leg when raised and red 
when lowered\
' , 
            'title_urdu' => 'کیا آپکو ما ضی میں یا فی الحال مندرجہ ذیل علامات کا سامنا کرنا پڑا:
                        شدید          ٹانگوں میں درد
ج                                          جسم  کے کسی حصے کا بے جان ہوکر سڑجانا
                                      زخم کا نہ بھرنا 
                                 پیرو‎ں/ٹانگوں کا کٹ جانا
                      ٹانگوں کا اوپر اٹھانے کے بعد سفیدپڑ جانا اورنیچے 
',
            'q_type' => 'option',
            'meta' => json_encode([[
                'eng_skip' => 'If any of it is yes, do not ask any further Questions' , 
                'urdu_skip' => 'کوئ بھی جواب ہاں ہے، تو مزید سوال نہ کریں',
                'eng_participant_end _the_interview' => 'If any of the above is ‘Yes’ then thank the participant and end the interview.',
                'urdu_participant_end _the_interview' => 'اگر مذکورہ بالا جوابات میں سے کوئی ’ہاں‘ ہے تو شریک کا شکریہ ادا کریں اور انٹرویو ختم کریں۔'
            ]]),

            'options' => [
                [
                'english_title' => '0: No',
                'urdu_title'    => '0: نہیں' 
                ],
                [
                'english_title' => '1: Yes ',
                'urdu_title'    => '1: ہاں'
                ]
                // 'sort_by' => ,
            ]
        ];



        // SECTION B: SOCIODEMOGRAPHIC INFORMATION معاشرتی معلومات 


        foreach ($screenQ as $keyName => $firstValue) {
            $questionCreate = Question::create([
                'title_eng'     => $firstValue['title_eng'],
                'title_urdu'    => $firstValue['title_urdu'],
                'key_eng'       => $firstValue['key_eng'],
                'key_urdu'      => $firstValue['key_urdu'],
                'heading_id'    =>  1,
                'sub_heading_id' => 4,
                'step_no'        => 2,
                'q_type'         => isset($firstValue['q_type']) ?  $firstValue['q_type'] : 'blank',
                'sort_by'        => ($keyName+1),
                'meta'           => $firstValue['meta']
            ]);

            if (isset($firstValue['q_type'])) {

                foreach ($firstValue['options'] as $keyOp => $valueOp) {

                    Option::create([
                        'english_title' => $valueOp['english_title'],
                        'urdu_title'    => $valueOp['urdu_title'],
                        'question_id'   => $questionCreate->id,
                        'sort_by'       => ($keyOp+1)
                    ]);
                }
            }
            # code...
        }

    }
}
