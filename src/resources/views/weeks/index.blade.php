<head>
    <title>最新ニュース</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">最新ニュース一覧</h3>
        </div>
    </div>





    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">{{ $dt }}</h3>
        </div>
    </div>


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
                    <div id="test" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form action="{{route('weeks.search') }}" method="GET">

                                <fieldset>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-2 text-right">
                                                <label class="control-label">title</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <input type="text" name="title" class="form-control" placeholder="テキスト入力欄">
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
                                                <input type="text" name="limk" class="form-control" placeholder="テキスト入力欄">
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
                                                <input type="date" name="from" placeholder="from_date">
                                                <span class="mx-3 text-grey">~</span>
                                                <input type="date" name="until" placeholder="until_date">
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


        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">title</th>
                        <th class="text-center">description</th>
                        <th class="text-center">link</th>
                        <th class="text-center">日付</th>
                    </tr>
                    @foreach($weeks as $week)
                    <tr>

                        <td>{{ $week->title }}</td>
                        <td>{{ $week->description }}</td>

                        <td>
                            <a href="{{ $week->link }}">
                                {{ $week->link }}</a>
                        </td>

                        <td>{{ $week->created_at }}</td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>