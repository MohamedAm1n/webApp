<?php

namespace App\Http\Controllers\BackEnd;
use Illuminate\Http\Request;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\users\Update;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\models\User;

class Users extends BackEndController
{

public function __construct(User $model)
{
    parent::__construct($model);
}


public function store(Store $request)
{
    $requestArray=$request->all();
    $requestArray['password']= Hash::make($requestArray['password']);

    $this->model->create($requestArray);
      return redirect()->route('users.index');
}






public function update($id,Update $request) {

$row=$this->model->findOrfail($id);

$requestArray=$request->all();

if(isset($requestArray['password']) && request()->get('password') !="")
{
    $requestArray=$requestArray + ['password'=>hash::make($request->password)];
}
else{
    unset($requestArray['password']);
}


$row->update($requestArray);


return redirect()->route('users.index');

}

}
