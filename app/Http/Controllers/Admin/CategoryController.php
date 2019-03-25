<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    /**
     * @desc 分类列表
     */
    public function list()
    {

        $category = new Category();

        //  从Model中获取
        $assign['categorys'] = $category->getLists();

        //  返回给前台数据
        return view('admin.category.list', $assign);

    }


    /**
     * 分类添加页面
     */
    public function create()
    {
        return view('admin.category.create');
    }


    /**
     * @desc 执行分类添加页面
     * @param Request $request
     * @return
     */
    public function store(Request $request)
    {

        //  获取所有的参数
        $params = $request->all();

        //  实例化Model
        $category = new Category();

        //  赋值
        $data = [
            'c_name' => $params['c_name'] ?? ""
        ];

        //  添加
        $res = $category->addRecord($data);

        //  判断是否添加成功
        if(!$res){//  否，跳回原来的页面
            return redirect()->back();
        }

        //  是 调到列表页面
        return redirect('/admin/category/list');

    }


    //  分类删除操作
    public function del($id)
    {

        $category = new Category();

        $category->delRecord($id);

        return redirect('/admin/category/list');
    }
}
