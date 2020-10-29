<?php

namespace App\Http\Controllers\backEnd;

use App\models\Tag;
use App\models\User;
use App\models\Skill;
use App\models\Video;
use App\models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Http\Requests\BackEnd\Videos\Store;

class Videos extends BackEndController
{

    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat', 'user'];
    }

    protected function append()
    {
        // فانكشن بتستدعي الحاجات اللي فيها
        // بقوله لو الريكويست المبعوت الراوت بتاعه فيه عنصر اسمه فيديو
        // الاراي الفاضية هيتحط جواها ال سكيلز اللي مربوطة ب ال اي دي ده

        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => [],
        ];
        if (request()->route()->parameter('video')) {
            $array['selectedSkills'] = $this->model->find(request()->route()->parameter('video'))
                ->skills()->pluck('skills.id')->toArray();
            // dd($array['selectedSkills']);
            $array['selectedTags'] = $this->model->find(request()->route()->parameter('video'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments'] = $this->model->find(request()->route()->parameter('video'))
            ->comments();
        }


        return $array;
    }

    public function store(Store $request)
    {
        $file_name = uploadImage($request);
        $requestArray = ['user_id' => auth()->user()->id, 'image' => $file_name] + $request->all();
        $row = $this->model->create($requestArray);
        // dd($this->model->create($requestArray));

        $this->syncSkillsTags($row, $requestArray);

        return redirect()->route('videos.index');
    }

    /**
     * Update data
     */
    public function update($id, Update $request)
    {
        /**
         * if update request has file image add the image to $requestarray
         */
        $row = $this->model->findOrfail($id);


        $requestArray = $request->all();
        $file_name = uploadImage($request);
        $requestArray = ['image' => $file_name] + $request->all();


        $row->update($requestArray);
        // dd($requestArray);
        $this->syncSkillsTags($row, $requestArray);
        return redirect()->back();
    }

    /**
     *
     */



    /**
     * protected function to sync tag and skills
     */

    protected function syncSkillsTags($row, $requestArray)
    {
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }
}
