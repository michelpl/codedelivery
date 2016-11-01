<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Repositories\OrderRepository;

use CodeDelivery\Repositories\OrderItemRepository;

use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests\AdminOrderItemRequest;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{
    private $repository;
    private $productRepository;
    private $orderItemRepository;
    private $userRepository;
    private $status = ['0'=>'Inativo','1'=>'Ativo'];
    private $deliverymen;


    public function __construct(OrderRepository $repository, UserRepository $userRepository, ProductRepository $productRepository){
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->deliverymen = $this->getDeliverymen();
    }
    
    public function index() {
        //echo  php_ini_loaded_file();
        $orders = $this->repository->paginate();
        $status = $this->status;
        return view("admin.orders.index", compact('orders', 'status'));
    }
    
    public function create() {
        return view("admin.orders.create");
    }
    public function edit($id) {
        $order = $this->repository->find($id);
        $deliverymen = $this->deliverymen;
        return view("admin.orders.edit", compact('order', 'deliverymen'));
    }
    public function store(AdminOrderRequest $orderRequest) {
        $data = $orderRequest->all();
        if($data['user_deliveryman'] == 0){
            unset($data['user_deliveryman']);
        }
        $this->repository->create($data);
        return redirect()->route("admin.orders.index");
    }
    public function update(AdminOrderRequest $request, $id) {
        $data = $request->all();
        if($data['user_deliveryman'] == 0){
            unset($data['user_deliveryman']);
        }
        $this->repository->update($data, $id);
        return redirect()->route("admin.orders.index");
    }

    public function destroy($id){
        $this->repository->delete($id);
        return redirect()->route("admin.orders.index");
    }
    private function getDeliveryMen(){

        $deliverymen = $this->userRepository->findByField("role", "deliveryman")->lists('name', "id");
        $deliverymen[0] = "Selecione";
        $deliverymen = json_decode($deliverymen, true);
        ksort($deliverymen);
        return $deliverymen;
    }


}
