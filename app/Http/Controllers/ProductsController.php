<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Repositories\ProductRepository;

use CodeDelivery\Http\Controllers\Controller;

class ProductsController extends Controller
{
    private $repository;
    
    public function __construct(ProductRepository $repository) {
        $this->repository = $repository;
    }
    
    public function index() {
        $products = $this->repository->paginate();
        return view("admin.products.index", compact('products'));
    }
    
    public function create() {
        return view("admin.categories.create");
    }
    public function edit($id) {
        $category = $this->repository->find($id);
        return view("admin.categories.edit", compact('category'));
    }
    public function store(AdminCategoryRequest $request) {
        
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route("admin.categories.index");
                
    }
    public function update(AdminCategoryRequest $request, $id) {
        
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route("admin.categories.index");
                
    }
}