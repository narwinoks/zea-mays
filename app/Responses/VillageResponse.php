<?php

namespace App\Responses;

class VillageResponse
{
    public const SUCCESS_VILLAGE = [
        'success' => true,
        'code' => '200',
        'message' => 'Successfully',
    ];

    public const VILLAGE_FAILED = [
        'success' => false,
        'code' => 500,
        'message' => 'Get Data Failed',
    ];

    public const VILLAGE_NOT_FOUND= [
        'success' => false,
        'code' => 404,
        'message' => 'Data Not Found',
    ];
    public const VILLAGE_STORE_SUCCESS= [
        'success' => true,
        'code' => 201,
        'message' => 'Create Village Success',
    ];
    public const VILLAGE_UPDATE_SUCCESS= [
        'success' => true,
        'code' => 200,
        'message' => 'Update Village Success',
    ];

    public const VILLAGE_DELETE_SUCCESS= [
        'success' => true,
        'code' => 200,
        'message' => 'Delete Courier Success',
    ];
}
