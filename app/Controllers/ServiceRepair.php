<?php

namespace App\Controllers;

class ServiceRepair extends BaseController
{

    public function index()
    {
      $servicerepair = model(ServicerepairModel::class);
      $data['services'] = $servicerepair->orderBy('id', 'DESC')->findAll();
      $data['controller'] = $this;
      return view('repair/list', $data);
    }

    public function newService(){
      $customer = model(CustomerModel::class);
      $data['customers'] = $customer->findAll();
      $data['controller'] = $this;
      return view('repair/create', $data);
    }

    public function saveService(){
      $service_id = $this->request->getPost('service_id');
      $customer_id = $this->request->getPost('customer_id');
      if(!empty($customer_id) && $customer_id == 'new'){
        $customer = model(CustomerModel::class);
        $customerData = [
          'name' => $this->request->getPost('customer_name'),
          'email' => $this->request->getPost('customer_email'),
          'phone' => $this->request->getPost('customer_phone'),
          'city' => $this->request->getPost('customer_city'),
          'address' => $this->request->getPost('customer_address')
        ];
        $customer->insert($customerData);
        $customer_id = $customer->getInsertID();
      }
      $serviceData = [
        'id' => $service_id,
        'customer_id' => $customer_id,
        'service_cat_id' => $this->request->getPost('service_cat_id'),
        'model' => $this->request->getPost('model'),
        'imei' => $this->request->getPost('imei'),
        'complaint' => $this->request->getPost('complaint'),
        'photo' => ''
      ];

      $servicerepair = model(ServicerepairModel::class);
      if($servicerepair->save($serviceData)){
        $res['id'] = ($service_id)?$service_id:$servicerepair->getInsertID();
        $res['status'] = '900';
        echo json_encode($res);
      }else{
        echo json_encode($servicerepair->errors());
      }
    }

    public function editService(){
      $service_id = $data['service_id'] = $this->request->uri->getSegment(2);
      $servicerepair = model(ServicerepairModel::class);
      $data['service'] = $servicerepair->where('id', $service_id)->first();
      $customer = model(CustomerModel::class);
      $data['customers'] = $customer->findAll();
      $data['controller'] = $this;
      return view('repair/edit', $data);
    }

    public function serviceDetail(){
      $service_id = $data['service_id'] = $this->request->uri->getSegment(2);
      $servicerepair = model(ServicerepairModel::class);
      $data['service'] = $servicerepair->where('id', $service_id)->first();
      $data['controller'] = $this;
      return view('repair/service-detail', $data);
    }

    public function getServiceDetails(){
      $service_id = $this->request->getPost('service_id');
      $servicerepair = model(ServicerepairModel::class);
      $data['service'] = $servicerepair->where('id', $service_id)->first();
      $data['controller'] = $this;
      return view('repair/service-canvas', $data);
    }

    public function saveReport(){
      $service_id = $this->request->getPost('service_id');
      $delivery_date = (!empty($_POST['delivery_date']))?date_format(date_create_from_format('m-d-Y', $_POST['delivery_date']), 'Y-m-d'):null;
      $paid_date = (!empty($_POST['paid_date']))?date_format(date_create_from_format('m-d-Y', $_POST['paid_date']), 'Y-m-d'):null;
      $reportData = [
        'id' => $service_id,
        'delivery_date' => $delivery_date,
        'visible_notes' => $this->request->getPost('visible_notes'),
        'technician_notes' => $this->request->getPost('technician_notes'),
        'est_amount' => $this->request->getPost('est_amount'),
        'advance_paid' => $this->request->getPost('advance_paid'),
        'total_amount' => $this->request->getPost('total_amount'),
        'paid_date' => $paid_date,
        'status' => $this->request->getPost('status')
      ];
      $servicerepair = model(ServicerepairModel::class);
      if($servicerepair->save($reportData)){
        echo '900';
      }
    }




    //HELPERS


    public function getServiceCategoriesList(){
      $scat = model(ServicecatModel::class);
      return $scat->findAll();
    }

    public function getServiceCategoryName($scat_id){
      $scat = model(ServicecatModel::class);
      $thisScat = $scat->where('id', $scat_id)->first();
      return $thisScat['name'];
    }

    public function getCustomerField($customer_id, $field){
      $customer = model(CustomerModel::class);
      $thisCustomer = $customer->where('id', $customer_id)->first();
      return $thisCustomer[$field];
    }

    public function getStatus($status_id){
      $status = model(StatusModel::class);
      return $status->where('id', $status_id)->first();
    }
}
