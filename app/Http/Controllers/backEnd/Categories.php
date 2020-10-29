<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Requests\BackEnd\Categories\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Category;
class Categories extends BackEndController
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }


    public function store(Store $request)
    {
        $this->model->create($request->all());
          return redirect()->route('categories.index');
    }






    public function update($id,Store $request) {

    $row=$this->model->findOrfail($id);

    $row->update($request->all());

    return redirect()->route('categories.index');

    }


}
