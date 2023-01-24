<?php

namespace App\Controllers;

class ServiceRepair extends BaseController
{

    public function index()
    {
      return view('repair/index');
    }

    public function newService(){
      $data['controller'] = $this;
      return view('repair/add-new', $data);
    }




    //HELPERS


    public function getServiceCategoriesList(){
      $scat = model(ServicecatModel::class);
      return $scat->findAll();
    }

}
