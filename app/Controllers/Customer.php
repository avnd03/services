<?php

namespace App\Controllers;

class Customer extends BaseController
{

    public function index()
    {
      $customer = model(CustomerModel::class);
      $data['customers'] = $customer->findAll();
      return view('customer/index', $data);
    }

    public function saveCustomer(){
      $customer = model(CustomerModel::class);
      $customerData = [
        'id' => $this->request->getPost('customer_id'),
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'city' => $this->request->getPost('city'),
        'address' => $this->request->getPost('address')
      ];
      if($customer->save($customerData)){
        echo '900';
      }else{
        echo json_encode($customer->errors());
      }
    }

    public function getCustomer(){
      $customer = model(CustomerModel::class);
      $customer_id = $this->request->getPost('customer_id');
      $page = $this->request->getPost('page');
      $data['customer'] = $thisCustomer = $customer->where('id', $customer_id)->first();
      if($page == 'customer'){
        return view('customer/edit-customer', $data);
      }
      if($page == 'service'){
        echo json_encode($thisCustomer);
      }
    }

}
