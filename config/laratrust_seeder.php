<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'sijil' => 'c,r,u,d',
            'paper' => 'c,r,u,d',
            'manual' => 'c,r,u,d',
            'peserta' => 'c,r,u,d'
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'sijil' => 'c,r,u,d',
            'paper' => 'c,r,u,d',
            'manual' => 'c,r,u,d',
            'peserta' => 'c,r,u,d'
        ],
        'ppd' => [
            'users' => 'c,r,u,d',
            'sijil' => 'c,r,u,d',
            
            'manual' => 'c,r,u,d',
            'peserta' => 'c,r,u,d'
        ],
        'sektor' => [
            'users' => 'c,r,u,d',
            'sijil' => 'c,r,u,d',
            
            'manual' => 'c,r,u,d',
            'peserta' => 'c,r,u,d'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
