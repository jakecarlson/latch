<?php

use App\Models\Team;

return [

    /*
    |--------------------------------------------------------------------------
    | Spark Path
    |--------------------------------------------------------------------------
    |
    | This configuration option determines the URI at which the Spark billing
    | portal is available. You are free to change this URI to a value that
    | you prefer. You shall link to this location from your application.
    |
    */

    'path' => 'billing',

    /*
    |--------------------------------------------------------------------------
    | Spark Middleware
    |--------------------------------------------------------------------------
    |
    | These are the middleware that requests to the Spark billing portal must
    | pass through before being accepted. Typically, the default list that
    | is defined below should be suitable for most Laravel applications.
    |
    */

    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | These configuration values allow you to customize the branding of the
    | billing portal, including the primary color and the logo that will
    | be displayed within the billing portal. This logo value must be
    | the absolute path to an SVG logo within the local filesystem.
    |
    */

    'brand' =>  [
        'logo' => realpath(__DIR__.'/../public/svg/billing-logo.svg'),
        'color' => 'bg-gray-800',
    ],

    /*
    |--------------------------------------------------------------------------
    | Proration Behavior
    |--------------------------------------------------------------------------
    |
    | This value determines if charges are prorated when making adjustments
    | to a plan such as incrementing or decrementing the quantity of the
    | plan. This also determines proration behavior if changing plans.
    |
    */

    'prorates' => true,

    /*
    |--------------------------------------------------------------------------
    | Spark Date Format
    |--------------------------------------------------------------------------
    |
    | This date format will be utilized by Spark to format dates in various
    | locations within the billing portal, such as while showing invoice
    | dates. You should customize the format based on your own locale.
    |
    */

    'date_format' => 'F j, Y',

    /*
    |--------------------------------------------------------------------------
    | Spark Billables
    |--------------------------------------------------------------------------
    |
    | Below you may define billable entities supported by your Spark driven
    | application. You are free to have multiple billable entities which
    | can each define multiple subscription plans available for users.
    |
    | In addition to defining your billable entity, you may also define its
    | plans and the plan's features, including a short description of it
    | as well as a "bullet point" listing of its distinctive features.
    |
    */

    'billables' => [

        'team' => [
            'model' => Team::class,
            'trial_days' => 30,
            'default_interval' => 'monthly',
            'plans' => [
                [
                    'name' => 'Solo',
                    'short_description' => 'This is a short, human friendly description of the plan.',
                    'monthly_id' => env('SPARK_SOLO_MONTHLY_PLAN', 1000),
                    'yearly_id' => env('SPARK_SOLO_YEARLY_PLAN', 1001),
                    'yearly_incentive' => 'Save 20%',
                    'features' => [
                        'Feature 1',
                        'Feature 2',
                        'Feature 3',
                    ],
                    'options' => [
                        'max_users' => env('SPARK_SOLO_MAX_USERS', 1),
                    ],
                    'archived' => false,
                ],
                [
                    'name' => 'Team',
                    'short_description' => 'This is a short, human friendly description of the plan.',
                    'monthly_id' => env('SPARK_TEAM_MONTHLY_PLAN', 2000),
                    'yearly_id' => env('SPARK_TEAM_YEARLY_PLAN', 2001),
                    'yearly_incentive' => 'Save 20%',
                    'features' => [
                        'Feature 1',
                        'Feature 2',
                        'Feature 3',
                    ],
                    'options' => [
                        'max_users' => env('SPARK_TEAM_MAX_USERS', 5),
                    ],
                    'archived' => false,
                ],
                [
                    'name' => 'Business',
                    'short_description' => 'This is a short, human friendly description of the plan.',
                    'monthly_id' => env('SPARK_BUSINESS_MONTHLY_PLAN', 3000),
                    'yearly_id' => env('SPARK_BUSINESS_YEARLY_PLAN', 3001),
                    'yearly_incentive' => 'Save 20%',
                    'features' => [
                        'Feature 1',
                        'Feature 2',
                        'Feature 3',
                    ],
                    'options' => [
                        'max_users' => env('SPARK_BUSINESS_MAX_USERS', 25),
                    ],
                    'archived' => false,
                ],
                [
                    'name' => 'Enterprise',
                    'short_description' => 'This is a short, human friendly description of the plan.',
                    'monthly_id' => env('SPARK_ENTERPRISE_MONTHLY_PLAN', 4000),
                    'yearly_id' => env('SPARK_ENTERPRISE_YEARLY_PLAN', 4001),
                    'yearly_incentive' => 'Save 20%',
                    'features' => [
                        'Feature 1',
                        'Feature 2',
                        'Feature 3',
                    ],
                    'options' => [
                        'max_users' => env('SPARK_ENTERPRISE_MAX_USERS', 1000),
                    ],
                    'archived' => false,
                ],
            ],
        ],

    ],

    'terms_url' => '/terms',

];
