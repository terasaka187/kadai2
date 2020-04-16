<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Week; // access Model

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Week::query();

        //$request->input()で検索時に入力した項目を取得します。
        $search1 = $request->input('title');
        //$search2 = $request->input('link');
        //$search3 = $request->input('description');
        //$search4 = $request->input('created_at');


        // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した棋力と一致するカラムを取得します
        // if ($request->has('strength') && $search1 != ('指定なし')) {
        //     $query->where('strength', $search1)->get();
        // }


        // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
        if ($request->has('title') && $search1 != '') {
            $query->where('title', 'like', '%' . $search1 . '%')->get();
        }

        //データ表示件数
        $data = $query->paginate(10);

        return view('search.index', [
            'data' => $data
        ]);
    }
}
