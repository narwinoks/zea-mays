<?php

namespace App\Services;

use App\Interface\DistrictInterface;
use App\Interface\VillageInterface;
use App\Responses\ServerResponse;
use App\Responses\VillageResponse;
use Exception;
use function App\Helpers\error;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class VillageService
{
    protected  VillageInterface $villageInterface;
    protected  DistrictInterface $districtInterface;
   public function __construct(VillageInterface $villageInterface ,DistrictInterface $districtInterface)
   {
       $this->villageInterface =$villageInterface;
       $this->districtInterface =$districtInterface;
   }

   public  function getAllData($request){
       try{
           $data =$this->villageInterface->getAllData($request);
       }catch (Exception $exception){
           Log::error('VILLAGE GET : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
           throw new HttpResponseException(error(VillageResponse::VILLAGE_FAILED));
       }
       return $data;
   }

   public  function getDataVillageById($id){
       try{
           $data =$this->villageInterface->findVillageById($id);
           if ($data == null){
               throw new HttpResponseException(error(VillageResponse::VILLAGE_NOT_FOUND,404));
           }
       }catch (Exception $exception){
           Log::error('VILLAGE SHOW : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
           throw new HttpResponseException(error(VillageResponse::VILLAGE_NOT_FOUND,404));
       }
       return $data;
   }

   public  function saveDataVillage($data){
       $findDictrict =$this->districtInterface->getDistrictByCode($data['district_code']);
       if ($findDictrict == null){
           throw new HttpResponseException(error(ServerResponse::NOT_FOUND,404));
       }

       $getLastCodeVillage =$this->villageInterface->getLatsVillage();
       $code =$getLastCodeVillage + 1;


       try {
           $data['code'] =$code;
           $village =$this->villageInterface->saveVillage($data);
       }catch (Exception $exception){
           Log::error('VILLAGE STORE : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
           throw new HttpResponseException(error(VillageResponse::VILLAGE_FAILED));
       }
       return $village;
   }

   public  function updateDataVillage($id ,$newData){
       $data =$this->villageInterface->findVillageById($id);
       if ($data == null){
           throw new HttpResponseException(error(VillageResponse::VILLAGE_NOT_FOUND,404));
       }
       try{
           $updated =$this->villageInterface->updateVillageById($data,$newData);
       }catch (Exception $exception){
           Log::error('VILLAGE UPDATE : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
           throw new HttpResponseException(error(VillageResponse::VILLAGE_NOT_FOUND,404));
       }
       return $updated;
   }

   public  function deleteDataVillageById($id){
       $data =$this->villageInterface->findVillageById($id);
       if ($data == null){
           throw new HttpResponseException(error(VillageResponse::VILLAGE_NOT_FOUND,404));
       }
       try {
           $destroy =$this->villageInterface->deleteVillage($data);
       }catch (Exception $exception){
           Log::error('Village DESTROY : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
           throw new HttpResponseException(error(VillageResponse::VILLAGE_FAILED,404));
       }
       return $destroy;
   }
}
