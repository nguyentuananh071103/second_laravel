<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view("backend.user.list", compact('users'));
    }

    public function create()
    {
        return view("backend.user.create");
    }


    public function store(Request $request)
    {
//        $request->validate([
//            "name"=>"require",
//            "email"=>"require",
//            "password"=>"require",
//        ]);
         $this->userRepository->store($request);
        return redirect()->route("users.index");
    }


    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return view("backend.user.detail",compact("user"));
    }


    public function edit($id)
    {
        $user = $this->userRepository->getById($id);
        return view("backend.user.update", compact("user"));
    }


    public function update(Request $request, $id)
    {
        $this->userRepository->update($id,$request);
        return redirect()->route("users.index");
    }

    public function destroy($id)
    {
        $this->userRepository->destroy($id);
        return redirect()->route("users.index");
    }
}
