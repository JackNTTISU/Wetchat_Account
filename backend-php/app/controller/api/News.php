<?php
namespace app\controller\api;

use app\BaseController;
use app\model\News as NewsModel;
use think\Request;

/**
 * 资讯API控制器
 */
class News extends BaseController
{
    /**
     * 获取资讯列表
     */
    public function index(Request $request)
    {
        $page = $request->param('page', 1);
        $limit = $request->param('limit', 10);
        $keyword = $request->param('keyword', '');

        $where = ['is_published' => 1];
        
        if (!empty($keyword)) {
            $where[] = ['title', 'like', "%{$keyword}%"];
        }

        $list = NewsModel::where($where)
            ->field('id,title,cover,summary,author,views,publish_time as date')
            ->order('is_top', 'desc')
            ->order('sort_order', 'desc')
            ->order('publish_time', 'desc')
            ->paginate([
                'list_rows' => $limit,
                'page' => $page
            ]);

        return json([
            'code' => 200,
            'message' => 'success',
            'data' => [
                'list' => $list->items(),
                'total' => $list->total(),
                'page' => $page,
                'limit' => $limit
            ]
        ]);
    }

    /**
     * 获取资讯详情
     */
    public function read($id)
    {
        $news = NewsModel::where(['id' => $id, 'is_published' => 1])
            ->find();

        if (!$news) {
            return json([
                'code' => 404,
                'message' => '资讯不存在',
                'data' => null
            ]);
        }

        // 增加浏览量
        $news->views += 1;
        $news->save();

        $data = [
            'id' => $news->id,
            'title' => $news->title,
            'cover' => $news->cover,
            'summary' => $news->summary,
            'content' => $news->content,
            'author' => $news->author,
            'views' => $news->views,
            'date' => $news->publish_time,
            'created_at' => $news->created_at
        ];

        return json([
            'code' => 200,
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * 增加浏览量
     */
    public function view($id)
    {
        $news = NewsModel::find($id);
        
        if (!$news) {
            return json([
                'code' => 404,
                'message' => '资讯不存在',
                'data' => null
            ]);
        }

        $news->views += 1;
        $news->save();

        return json([
            'code' => 200,
            'message' => 'success',
            'data' => null
        ]);
    }
}


