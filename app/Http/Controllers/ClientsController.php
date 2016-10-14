<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminUserRequest;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\UserRepository;

class ClientsController extends Controller
{
    private $repository;
    
    public function __construct(ClientRepository $repository, UserRepository $userRepository) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }
    
    public function index() {
        $clients = $this->repository->paginate();
        return view("admin.clients.index", compact('clients'));
    }
    
    public function create() {
        return view("admin.clients.create");
    }
    public function edit($id) {
        $client = $this->repository->find($id);
        return view("admin.clients.edit", compact('client'));
    }
    public function store(AdminClientRequest $clientRequest) {
        $data = $clientRequest->all();
        $user = $this->userRepository->create($data);
        $data['user_id'] = $user->id;
        $this->repository->create($data);
        return redirect()->route("admin.clients.index");
    }
    public function update(AdminClientRequest $request, $id) {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $client = $this->repository->update($data, $id);
        $this->userRepository->update($data, $client->user_id);

        return redirect()->route("admin.clients.index");
                
    }

    public function destroy($id){
        $this->repository->delete($id);
        return redirect()->route("admin.clients.index");
    }
}