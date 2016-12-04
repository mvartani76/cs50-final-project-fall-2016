<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class SensordataController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 20,
        'maxLimit' => 50,
        'sortWhitelist' => [
            'id', 'temp1', 'photo1', 'DeviceType'
        ]
    ];
}