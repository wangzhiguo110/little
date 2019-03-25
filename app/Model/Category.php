<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //  链接表名
    protected $table = "category";



    /**
     * @desc 分类列表分页显示
     */
    public function getLists()
    {
        return self::paginate(5);
    }


    /**
     * @desc 执行分类添加
     * @param $data
     */
    public function addRecord($data)
    {
        return self::insert($data);
    }


    /**
     * @desc 分类作者
     * @param $id
     */
    public function delRecord($id)
    {
        return self::where('id',$id)->delete();
    }


    /**
     * @desc 获取分类
     * @return array
     */
    public function getCategory()
    {
        return self::get()->toArray();
    }
}
