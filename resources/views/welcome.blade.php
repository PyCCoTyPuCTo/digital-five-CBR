<?php
$type = ['closed_question' => 'Вопросы закрытого типа']
?>

        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .title {
            font-size: 40px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref">

    <div class="content">
        <div class="title m-b-md" style="margin-bottom: 40px">
            CBR
            <small>Admin</small>
            <a href="/"
               style="margin-left: 50px; font-size: 20px; border: solid 1px; color: green; border-radius: 4px;padding: 5px; text-decoration: none">Создать
                голосование</a>
        </div>

        <table style="">
            <tr>
                <td>
                    Заголовок
                </td>
                <td>
                    Категория
                </td>
                <td>
                    Голосов
                </td>
                <td>
                    Среднее
                </td>
                <td>
                    Время окончания голосования
                </td>
            </tr>
            @foreach(\App\Vote::all() as $vote)

                <tr @if($vote->finish_time < date('Y-m-d',time())) style="color: black;background-color: rgba(255,0,2,0.38)" @endif>
                    <td>
                        <div class="links">
                            <a href="https://laravel.com/docs" style="text-decoration: none ">
                                {{$vote->title}}
                            </a>
                        </div>
                    </td>
                    <td>
                        {{$type[$vote->type]}}
                    </td>
                    <td>
                        {{\App\ClosedQuestion::all()->where('id_votes',$vote->id)->count()}}
                    </td>
                    <td>
                        {{\App\ClosedQuestion::all()->where('id_votes',$vote->id)->avg()}}
                    </td>
                    <td>
                        {{$vote->finish_time}}
                    </td>


                </tr>
            @endforeach

        </table>

    </div>
</div>
</body>

</html>
