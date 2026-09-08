<?php


use App\Models\Public\Rent;

return [
    \App\Models\Admin\Catalog::class => [
        'name'=>[
            'type'=>'text','label'=>'Nome del prodotto','minlength'=>'1','maxlength'=>'100','required'=>true,'value'=>'','class'=>'giorgio'
        ],
        'type'=>[
            'type'=>'select','fn'=>['_findOtherType'],'label'=>'tipo di prodotto','multiple'=>false,'required'=>true,'value'=>''
        ],

        'price'=>[
            'type'=>'number','label'=>'Prezzo del prodotto','required'=>true,'value'=>'0','step'=>0.01,'min'=>0,'max'=>100
        ],
        'active'=>[
            'type'=>'radio','check'=>'isBoolean','label'=>'Disponibilità','required'=>true,'value'=>'', 'items'=>[
                ['value'=>false,'label'=>'Non Attivo'],
                ['value'=>true,'label'=>'Attivo']
            ]
        ],
        'available_from'=>[
            'type'=>'datetime-local','required'=>true,'label'=>'Data di attivazione','value'=>''
        ],
        'available_to'=>[
            'type'=>'datetime-local','required'=>true,'label'=>'Data di attivazione','value'=>''
        ],
        'extend_meta'=>[
            'meta'=>[
                'type'=>'custom-catalog-card','items'=>[
                    'taglia'=>[
                        'type'=>'number','label'=>'Inserisci la taglia','step'=>'1','min'=>'', 'max'=>'','value'=>'','placeholder'=>50,
                        'rules'=>'min:1|max:5|integer'
                    ],
                    'colore'=>[
                        'type'=>'select','label' => 'Seleziona il colore','items'=>["verde", "giallo"],'multiple'=>false,'value'=>'','placeholder'=>'Bianco',
//                'rules'=>''
                    ],
                    'quantita'=>[
                        'type'=>'number','label'=>'seleziona la quantita','step'=>'1','min'=>'0', 'max'=>'250','value'=>'','placeholder'=>0,
                        'rules'=>'min:1'
                    ],
                    'altezza'=>[
                        'type'=>'number','label'=>'inserisci l\'altezza in centimetri','step'=>'1','min'=>'', 'max'=>'','value'=>'','placeholder'=>0,
                        'rules'=>'min:1'
                    ],
                ],
            ],



        ]
    ],
    Rent::class => [
        'extend_meta'=>[
            'peso'=>[
                'type'=>'number','label'=>'Inserisci il peso in kg','step'=>'1','min'=>'10', 'max'=>'170','value'=>'','placeholder'=>90
            ],
            'altezza'=>[
                'type'=>'number','label'=>'Inserisci la tua altezza in cm','step'=>'1','min'=>'50', 'max'=>'230','value'=>'','placeholder'=>170
            ],
            'taglia_piedi'=>[
                'type'=>'number','label'=>'Inserisci la taglia dei piedi (EU)','step'=>'1','min'=>'20', 'max'=>'60','value'=>'','placeholder'=>40
            ],
            'bmi'=>'',
            'skills_level' =>[
                'type'=>'select','label'=>'seleziona la tua bravura','items' =>['principiante','intermedio',  'avanzato'],'multiple'=> false,'value'=>'','placeholder'=>'principiante'
            ],
            'note'=>[
                'type'=>'textarea','label'=>'inserisci le note','rows'=>'4','value'=>'','placeholder'=>'se hai qualcosa da dirci puoi aggiungerlo qui'
            ]
        ]
    ],
    \App\Models\Public\Client::class => [
        'name'=>[
            'type'=>'text','label'=>'Nome del Cliente','minlength'=>'1','maxlength'=>'100','required'=>true,'value'=>'','placeholder'=>'Nome'
        ],
        'lastname'=>[
            'type'=>'text','label'=>'Cognome del prodotto','minlength'=>'1','maxlength'=>'100','required'=>true,'value'=>'','placeholder'=>'Cognome'
        ],
        'phone'=>[
            'type'=>'tel','label'=>'Telefono fisso del Cliente','required'=>false,'value'=>'','length'=>'11','placeholder'=>'0834-34567'
        ],
        'mobile'=>[
            'type'=>'tel','label'=>'Cellulare del Cliente','required'=>true,'value'=>'','size'=>'10','placeholder'=>'1234567890'
        ],
        'email'=>[
            'type'=>'email','label'=>'Email','required'=>true,'value'=>'','length'=>'100','placeholder'=>'test@example.com'
        ]

    ],
    \App\Models\System\Package::class => [
        'name'=>[
            'type'=>'text','label'=>'Nome del Pacchetto','minlength'=>'1','maxlength'=>'100','required'=>true,'value'=>'','placeholder'=>'Nome Pacchetto'
        ],
        'description'=>[
            'type'=>'textarea','label'=>'Descrizione del pacchetto','required'=>true,'value'=>'','rows'=>'2','placeholder'=>'Descrizione pacchetto'
        ],
        'active'=>[
            'type'=>'radio','check'=>'isBoolean','label'=>'Disponibilità','required'=>true,'value'=>'', 'items'=>[
                ['value'=>false,'label'=>'Non Attivo'],
                ['value'=>true,'label'=>'Attivo']
            ]
        ],
        'available_from'=>[
            'type'=>'datetime-local','required'=>true,'label'=>'Data di attivazione','value'=>''
        ],
        'available_to'=>[
            'type'=>'datetime-local','required'=>true,'label'=>'Data di attivazione','value'=>''
        ],
        'products'=>['fn'=>'_resolveProducts']
    ]
];
