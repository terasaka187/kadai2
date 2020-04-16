<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Week;
use Carbon\Carbon;


class RssController extends Controller
{
    //ニュース検索
    public function search(Request $request)
    {
        $query = Week::query();

        //タイトル
        $title = $request->input('title');
        //URL
        $link = $request->input('link');
        //以降
        $from = $request->input('from');
        //以前
        $until = $request->input('until');

        //タイトル検索
        if (!empty($title)) {
            $query->where('title', 'like', '%' . $title . '%')->get();
        }

        //URL検索
        if (!empty($link)) {
            $query->where('link', 'like', '%' . $link . '%')->get();
        }

        //日付検索
        if (!empty($from)) {
            $query->whereDate('created_at', '>=', $from)->get();
        }
        if (!empty($until)) {
        }


        //session
        session(['session[0]' => $title]);
        session(['session[1]' => $link]);
        session(['session[2]' => $from]);
        session(['session[3]' => $until]);

        // cookie書き込み
        \Cookie::queue("coockie[0]", $title, 120);
        \Cookie::queue("coockie[1]", $link, 120);
        \Cookie::queue("coockie[2]", $from, 120);
        \Cookie::queue("coockie[3]", $until, 120);



        //うまく行かなかった
        if (empty($request)) {
            $title = \Cookie::get('coockie[0]');
            $link = \Cookie::get('coockie[1]');
            $from = \Cookie::get('coockie[2]');
            $until = \Cookie::get('coockie[3]');
        }


        //並び替え
        $query->orderBy('created_at', 'desc')->get();



        //カウント
        $count = $query->count();

        //表示件数
        $data = $query->paginate(10);



        //表示
        return response()

            ->view('weeks.search', [
                'data' => $data,
                'count' => $count,



                'title' => $title,
                'link' => $link,
                'from' => $from,
                'until' => $until,

            ]);
    }
    public function cookie()
    {
    }


    //xmlの解析、DB保存、保存の確認
    public function create()
    {
        //XML解析
        $xml = file_get_contents('https://www.newsweekjapan.jp/story/rss.xml');
        $xmlObject = simplexml_load_string($xml);
        $xmlArray = json_decode(json_encode($xmlObject), TRUE);

        //最新記事
        $rss = $xmlArray['channel']['item'][0];

        //DB保存
        $week = new Week;
        $week->title = $rss['title'];
        //配列から文字列への変換がうまく行かなかったので、
        //いろんなメソッドを試します。
        //型変更
        $week->description = $rss['description'];
        $week->link = $rss['link'];
        $week->save();
        return "最新記事をDBに保存しました。";
    }


    //3日前のDB削除
    public function delete()
    {


        //インスタンス
        $query = Week::query();

        //現在日時を取得
        $dt = Carbon::now();

        //3日前の日時を取得
        $dt = $dt->subDay(3) . "\n";


        //検索削除
        $dt = $query->whereDate('created_at', '<=', $dt)->delete();

        return "3日前のデータを削除しました。";
    }
}
