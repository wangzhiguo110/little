<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{

    //链接数据表
    protected $table = "novel";

    /**
     * @desc 获取列表
     * @return mixed
     */
    public function getLists()
    {

        return self::select('novel.id','c_name','author_name','c_id','a_id','name','image_url','status','tags','clicks','read_num')
                   ->join('category','novel.c_id','=','category.id')//  连接分类表
                   ->join('author','novel.a_id','=','author.id')
                   ->orderBy('novel.id','desc')
                   ->paginate(2);
    }


    /**
     * @desc 小说添加
     * @param $data
     * @return bool
     */
    public function addRecord($data)
    {
        return self::insert($data);
    }

    /**
     * @desc 小说删除
     * @param $id
     */
    public function delRecord($id)
    {
        return self::where('id',$id)->delete();
    }


    /**
     * @desc 获取小说详情
     * @param $id
     */
    public function getNovelInfo($id)
    {
        return self::where('id',$id)->first();
    }


    /**
     * @desc 小说编辑
     * @param $id
     */
    public function editRecord($data, $id)
    {
        return self::where('id',$id)->update($data);
    }


//    获取小程序banner图

  public  function  getBanners($num=3){
       $list=self::select('id','image_url')
           ->orderBy('id','desc')
           ->limit($num)
           ->get()
           ->toArray();

      return $list;
  }
//  获取最新小说
  public function  getNews($num=3){
      $list=self::select('novel.id','name','image_url','author_name','tags','desc')
          ->leftJoin('author','novel.a_id','=','author.id')
          ->orderBy('novel.id','desc')
          ->limit($num)
          ->get()
          ->toArray();

      return $list;
  }
//    点击排行
 public  function  getClicks($num=3){
     $list=self::select('novel.id','name','image_url','author_name','tags','desc')
         ->leftJoin('author','novel.a_id','=','author.id')
         ->orderBy('novel.clicks','desc')
         ->limit($num)
         ->get()
         ->toArray();
     return $list;

 }

    public function getReadRank($num = 8)
    {
        $list = self::select('novel.id','name','read_num')
            ->leftJoin('author','novel.a_id','=','author.id')
            ->orderBy('novel.read_num','desc')
            ->limit($num)
            ->get()
            ->toArray();

        return $list;
    }
    //通过分类id查询小说列表
    public  function  getNovelByCid($cid){
        $list=self::select('novel.id','name','image_url','author_name','tags','desc','status','clicks')
            ->leftJoin('author','novel.a_id','=','author.id')
            ->where('novel.c_id',$cid)
            ->orderBy('id','desc')

            ->get()
            ->toArray();
        return $list;
    }

    //通过小说名字搜索小说列表
    public  function getNovelByName($name){
        $list=self::select('novel.id','name','image_url','author_name','tags','desc','status','clicks')
            ->leftJoin('author','novel.a_id','=','author.id')
            ->where('novel.name','like','%'.$name.'%')
            ->orderBy('id','desc')
            ->get()
            ->toArray();
        return $list;
    }
}
