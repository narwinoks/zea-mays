<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Village\GetDataRequest;
use App\Http\Requests\Village\SaveDataRequest;
use App\Http\Resources\Village\VillageCollection;
use App\Http\Resources\Village\VillageResource;
use App\Responses\VillageResponse;
use App\Services\VillageService;
use Illuminate\Http\Request;
use function App\Helpers\success;

class VillageController extends Controller
{
    protected  VillageService $villageService;
    public function __construct(VillageService $villageService)
    {
        $this->villageService =$villageService;
    }

    public  function index(GetDataRequest $request)
    {
        $village            =  $this->villageService->getAllData($request);
        $villageResource    = new VillageCollection($village);
        $villageTransform   = json_decode($villageResource->toResponse($request)->getContent(), true);
        return success(VillageResponse::SUCCESS_VILLAGE, $villageTransform, 200);
    }

    public  function show(Request $request ,$id){
        $village            =  $this->villageService->getDataVillageById($id);
        $villageResource    = new VillageResource($village);
        $villageTransform   = json_decode($villageResource->toResponse($request)->getContent(), true);
        return success(VillageResponse::SUCCESS_VILLAGE, $villageTransform, 200);
    }

    public  function store(SaveDataRequest $request){
        $data               =$request->only('district_code' ,'name' ,'meta');
        $data['meta']       =json_encode($request->meta);
        $village            =  $this->villageService->saveDataVillage($data);
        $villageResource    = new VillageResource($village);
        $villageTransform   = json_decode($villageResource->toResponse($request)->getContent(), true);
        return success(VillageResponse::VILLAGE_STORE_SUCCESS, $villageTransform, 201);
    }

    public  function update(SaveDataRequest $request,$id){
        $data               = $request->only('district_code' ,'name' ,'meta');
        $village            = $this->villageService->updateDataVillage($id,$data);
        $villageResource    = new VillageResource($village);
        $villageTransform   = json_decode($villageResource->toResponse($request)->getContent(), true);
        return success(VillageResponse::VILLAGE_UPDATE_SUCCESS, $villageTransform, 200);
    }

    public  function delete(Request  $request,$id){
        $village = $this->villageService->deleteDataVillageById($id);
        return success(VillageResponse::VILLAGE_DELETE_SUCCESS,[], 200);
    }
}
