<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{

    //  连接表明
    protected $table = "chapter";


    /**
     * @desc  小说章节添加
     * @param $data
     */
    public function addRecord($data)
    {

        return self::insert($data);

    }


    /**
     * @desc 获取小说章节列表
     * @param int $noveId 小说Id
     */
    public function getLists($novelId = 0)
    {

        //  判断是否有小说Id传过来
        if ($novelId == 0) {//  没有就调到所有的章节列表

            return self::select('chapter.id', 'novel.name', 'chapter.title', 'chapter.sort')
                       ->leftJoin('novel', 'chapter.novel_id', '=', 'novel.id')
                       ->paginate(5);

        } else {//  有 跳到对应的小说章节列表

            return self::select('chapter.id', 'novel.name', 'chapter.title', 'chapter.sort')
                       ->leftJoin('novel', 'chapter.novel_id', '=', 'novel.id')
                       ->where('novel_id', $novelId)
                       ->paginate(5);

        }
    }


    /**
     * @desc  删除章节
     * @param $id
     */
    public function delRecord($id)
    {

        return self::where('id', $id)->delete();

    }


    /**
     * @desc  获取章节信息
     * @param $id
     */
    public function getChapter($id)
    {

        return self::where('id', $id)->first();

    }


    /**
     * @desc  修改章节的记录
     * @param $id
     * @param $data
     */
    public function editRecord($data, $id)
    {

        return self::where('id', $id)->update($data);

    }

}
