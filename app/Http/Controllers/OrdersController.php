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


    public function __construct(OrderRepository $repository, UserRepository $UserRepository, ProductRepository $productRepository){
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->UserRepository = $UserRepository;
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

    public function newItem($orderId){
        $order = $this->repository->find($orderId);
        $products = $this->productRepository->lists("name","id");
        return view("admin.orders.orderItem.newItem", compact('order','products'));
    }



    public function removeItem($id, $itemId){
        $order = $this->repository->find($id);
        $item = $order->items->find($itemId);
        $item->delete();
        return redirect()->route("admin.orders.index");
    }
}
