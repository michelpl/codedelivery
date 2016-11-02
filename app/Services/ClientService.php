<?php
namespace CodeDelivery\Services;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ClientRepository;
class ClientService {
    public $clientRepository, $userRepository;
    public function __construct(ClientRepository $repository, UserRepository $userRepository){
        $this->clientRepository = $repository;
        $this->userRepository = $userRepository;
    }
    public  function create(array $data){
        $data['user']['password'] = bcrypt(123456);
        $user = $this->userRepository->create($data['user']);
        $data['user_id'] = $user->id;
        $this->clientRepository->create($data);
    }
    public  function update(array $data, $id){
        $this->clientRepository->update($data, $id);
        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;
        $this->userRepository->update($data['user'], $userId);
    }
}
