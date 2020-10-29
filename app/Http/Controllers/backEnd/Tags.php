<?php

namespace App\Http\Controllers\backEnd;

use App\models\Tag;
use Illuminate\Http\Request;
// use App\Http\Requests\BackEnd\Tags\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Tags\Store;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
    public function store(Store $request)
    {
        $this->model->create($request->all());
        return redirect()->route('tags.index');
    }
    public function update($id, Store $request)
    {
        $row = $this->model->findOrfail($id);
        $row->update($request->all());
        return redirect()->route('tags.index');
    }
}
