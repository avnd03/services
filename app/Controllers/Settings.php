<?php

namespace App\Controllers;

class Settings extends BaseController
{

    public function index()
    {
      $module = $this->request->uri->getSegment(2);
      switch($module){
        case 'service-categories':
        $scat = model(ServicecatModel::class);
        $data['scategories'] = $scat->findAll();
        return view('settings/service-categories', $data);
        break;
        case 'users':
        return view('settings/users');
        break;
        default:
        return view('settings/application');
        break;
      }
    }

    public function getCategory(){
      $scat_id = $this->request->getPost('scat_id');
      $scat = model(ServicecatModel::class);
      $thisCat = $scat->where('id', $scat_id)->first();
      echo json_encode($thisCat);
    }

    public function saveCategory(){
      $categoryData = [
        'id' => $this->request->getPost('scat_id'),
        'name' => $this->request->getPost('name'),
      ];
      $scat = model(ServicecatModel::class);
      if($scat->save($categoryData)){
        echo '900';
      }
    }

}
