<?php
namespace CodeDelivery\Http\Controllers;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\OrderItemRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminOrderItemRequest;
use CodeDelivery\Http\Controllers\Controller;

class OrderItemsController extends Controller
{
    private $repository, $orderRepository, $productRepository;
    public function __construct(OrderItemRepository $repository, OrderRepository $orderRepository, ProductRepository $productRepository){
        $this->repository = $repository;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }
    public  function index($id){
        $idOrder = $id;
        $orders = $this->repository->findByField('order_id', $id);
        return view('admin.orders.itens.index', compact('orders', 'idOrder'));
    }
    public function create($orderId){
        $order = $this->orderRepository->find($orderId);
        $products = $this->productRepository->lists("name","id");
        return view("admin.orders.orderItem.newItem", compact('order','products'));
    }
    public  function store(AdminOrderItemRequest $request){
        $data = $request->all();
        $product = $this->productRepository->find($data['product_id']);
        $data['price'] = $product->price;
        $data['qtde'] = 1;
        $this->repository->create($data);
        $this->updateOrderTotal($data['order_id']);

        return redirect()->route('admin.orders.edit', $data['order_id']);
    }
    public function destroy($id){
        $item = $this->repository->find($id);
        $this->repository->delete($id);
        $this->updateOrderTotal($item->order_id);
        return redirect()->route('admin.orders.index', $item->order_id);

    }
    public function update(AdminOrderItemRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('admin.orders.itens.index');
    }

    public function newItem($orderId){
        $order = $this->repository->find($orderId);
        $products = $this->productRepository->lists("name","id");
        return view("admin.orders.orderItem.newItem", compact('order','products'));
    }

    public function updateOrderTotal($orderId){
        /**
         * @Todo: Calcular total também levando em consideração a quantidade e produtos repetidos
         */
        $orderItems = $this->repository->findByField("order_id", $orderId, ['price']);
        $total =0;
        foreach($orderItems as $orderItem){
            $total += $orderItem['price'];
        }
        $order = $this->orderRepository->find($orderId);
        $order->total = $total;
        $order->save();
    }

}