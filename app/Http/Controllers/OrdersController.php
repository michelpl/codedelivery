<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Http\Requests\AdminUserRequest;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{
    private $repository;
    
    public function __construct(OrderRepository $repository, UserRepository $userRepository) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->status = ['0'=>'Inativo','1'=>'Ativo'];
    }
    
    public function index() {
        $orders = $this->repository->paginate();
        $status = $this->status;
        return view("admin.orders.index", compact('orders', 'status'));
    }
    
    public function create() {
        return view("admin.orders.create");
    }
    public function edit($id) {
        $order = $this->repository->find($id);
        return view("admin.orders.edit", compact('order'));
    }
    public function store(AdminOrderRequest $orderRequest) {
        $data = $orderRequest->all();
        $this->repository->create($data);
        return redirect()->route("admin.orders.index");
    }
    public function update(AdminOrderRequest $request, $id) {
        $data = $request->all();

        $this->repository->update($data, $id);
        return redirect()->route("admin.orders.index");
    }

    public function destroy($id){
        $this->repository->delete($id);
        return redirect()->route("admin.orders.index");
    }
}
