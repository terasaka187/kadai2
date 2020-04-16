@extends('layouts.app')

<div class="container ops-main">
    @section('content')


    <!-- 検索結果 -->

    <div class="container">
        <div class="row col-xs-8">
            <h3 class="ops-title">検索結果件数</h3>
        </div>
    </div>

    <!-- 一覧表示 -->
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-0">
                <div class="pull-right">
                    <p>{{ $count }}件</p>
                </div>
                <table class="table text-center">
                    <tr>
                        <th class="text-center">title</th>
                        <th class="text-center">description</th>
                        <th class="text-center">link</th>
                        <th class="text-center">日付</th>
                    </tr>
                    @foreach($data as $week)
                    <tr>

                        <td>{{ $week->title }}</td>
                        <td>
                            <div class="text-flex">
                                <div class="over-text">
                                    {{ $week->description }}
                                </div>
                            </div>
                        </td>

                        <td>
                            <a href="{{ $week->link }}">
                                <div class="text-flex">
                                    <div class="over-text">
                                        {{ $week->link }}
                                    </div>
                                </div>
                            </a>
                        </td>

                        <td>{{ $week->created_at }}</td>
                    </tr>
                    @endforeach
                </table>

                <!-- ページネーション -->
                <div class="center-block">
                    {{ $data->appends(request()->input())->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection