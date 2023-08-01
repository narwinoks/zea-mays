<?php

namespace App\Interface;

interface VillageInterface
{
   public  function getAllData($request);
   public  function getLatsVillage();
   public  function saveVillage($data);
   public  function findVillageById($id);
   public function updateVillageById($oldData,$newData);
    public  function deleteVillage($data);
}
