<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    protected $guarded = [];
    public function scopeSimpleDetails($query)
    {
        return $query->select(['id', 'category_title']);
    }
    public function saveCategory($data=[],$category_id=0,$category=null){
        if(!empty($category)){
            //
        }
        elseif($category_id > 0){
            $category = $this->find($category_id);
        }
        else{
            $category = new Category();
        }
        $category->fill($data);
        $category->save();

        return $category;
    }
}
