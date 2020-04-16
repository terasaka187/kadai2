<!DOCTYPE html>
<html lang="ja">


<head>
    <title>検索ニュース</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.scss') }}">
</head>


<body>

    <div class="container">
        <div class="row col-xs-8">
            <h3 class="ops-title">ニュース検索一覧</h3>
        </div>
    </div>

    <!-- 検索窓 -->
    <div class="container">
        <div class="row col-xs-8">
            <div class="panel-group" id="sampleAccordion">
                <div class="panel panel-default">
                    <div class="panel-heading  background-orange">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            <a data-toggle="collapse" data-parent="#sampleAccordion" href="#sampleAccordionCollapse1">
                                検索条件
                            </a>
                        </h3>
                    </div>
                    <div class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form action="{{route('weeks.search') }}" method="GET">

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-2 text-right">
                                                <label class="control-label">title</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <input type="text" value="{{  $title }}" name="title" class="form-control" placeholder="テキスト入力欄">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-2 text-right">
                                                <label class="control-label">URL</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <input type="url" value="{{  $link }}" name="link" class="form-control" placeholder="テキスト入力欄">
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-2 text-right">
                                                <label class="control-label">日付</label>
                                            </div>
                                            <div class="col-xs-2">
                                                <input type="date" value="{{  $from }}" name="from" placeholder="from_date">
                                                <span class="mx-3 text-grey">~</span>
                                                <input type="date" value="{{  $until }}" name="until" placeholder="until_date">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-offset-9">

                                                <p><input type="submit" name="search" value="検索" /></p>

                                            </div>
                                        </div>
                                    </div>



                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row col-xs-8">
                <div class="col-md-12">
                    <h2 class="ops-title">ニュース検索最新一覧</h2>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
</body>


</html>