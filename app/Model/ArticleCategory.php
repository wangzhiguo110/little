<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    //
    protected $table="jy_article_category";

    public $timestamps=false;
    // 获取分类列表的数据
    public  function getCategoryList(){
    	return self::get()->toArray();
    }
    // 添加数据

    public function doAdd($data){
    	return self::insertGetID($data);
    }

    // 删除操作

     public function del($id){
     	return self::where('id',$id)->delete();
     }
     // 获取分类详情
     public function getInfo($id){
     	return self::where('id',$id)->first();
     }
     // 执行分类编辑
     public function doEdit($data,$id){
     	return self::where('id',$id)->update($data);
     }
}
