<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{

    protected $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }



    public function index()
    {
        $smoduleName = $this->getModelName();
        $moduleName = $this->puralModelName();
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        $rows = $this->model;
        /**
         * declare variable $with / it call protected with()
         * check if with() is not empty
         * $rows=$this->model
         * set $rows = $this->model->with($with)
         */
        $with = $this->with();
        if (!empty($with)) {
            $rows = $rows->with($with);
        }
        // Debugar::info($row);
        $rows = $rows->paginate(10);
        $pageTitle = $moduleName . ' Control';
        $pageDes = "Here  You Can Add| Edit| Delete " . $moduleName;
        return view('back-end.' . $folderName . '.index', [
            'row'        => $rows,
            'moduleName' => $moduleName,
            'pageTitle'  => $pageTitle,
            'pageDes'    => $pageDes,
            'smoduleName' => $smoduleName,
            'routeName'  => $routeName,
            'folderName' => $folderName,

        ]);
    }


    public function create()
    {
        $moduleName = $this->getModelName();

        $smoduleName = $this->getModelName();

        $folderName = $this->getClassNameFromModel();

        $routeName = $this->getClassNameFromModel();

        $append = $this->append();

        $pageTitle = "Create " . $moduleName;

        $pageDes = "Here You Can Add " . $moduleName;

        return view('back-end.' . $folderName . '.create', [
            'moduleName' => $moduleName,
            'pageTitle' => $pageTitle,
            'pageDes'   => $pageDes,
            'folderName' => $folderName,
            'routeName' => $routeName,
            'smoduleName' => $smoduleName,
        ])->with($append);
    }


    public function edit($id)
    {
        $moduleName = $this->getModelName();

        $folderName = $this->getClassNameFromModel();

        $routeName = $this->getClassNameFromModel();
        $append = $this->append();
        $pageTitle = "Edit " . $moduleName;

        $pageDes = "Here You Can Edite " . $moduleName;

        $row = $this->model->findOrfail($id);

        return view('back-end.' . $folderName . '.edit', [
            'row'       => $row,
            'moduleName' => $moduleName,
            'pageTitle' => $pageTitle,
            'pageDes'   => $pageDes,
            'folderName' => $folderName,
            'routeName' => $routeName,

        ])->with($append);
    }
    public function destroy($id)
    {
        $row = $this->model->findOrfail($id);
        $row->delete();
        return redirect()->route($this->getClassNameFromModel() . '.index');
    }

    protected function with()
    {
        return [];
    }

    protected function append()
    {
        // dd(request()->route()->parameter('video'));
        return [];
    }

    protected function getClassNameFromModel()
    {
        return (strtolower($this->puralModelName()));
    }
    protected function puralModelName()
    {
        return str_plural(class_basename($this->model));
    }
    protected function getModelName()
    {
        return class_basename($this->model);
    }
}
