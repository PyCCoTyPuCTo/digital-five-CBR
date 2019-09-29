<?php
$type = ['closed_question' => 'Вопросы закрытого типа']
?>

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <form method="POST" action="/savedata">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input required type="text" class="form-control" id="title"
                                   placeholder="" name="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Каткгория</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category">
                                <option value="Денежно-кредитная политика" selected>Денежно-кредитная политика</option>
                                <option value="Банковское кредитование">Банковское кредитование</option>
                                <option value="Экономика">Экономика</option>
                            </select>окончания регистрации
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Текст вопроса</label>
                            <textarea required class="form-control" id="exampleFormControlTextarea1"
                                      rows="3" name="text"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputDate">Введите дату завершени регистрации:</label>
                            <input required type="date" name="date" class="form-control" data-date-format="yyyy-dd-mm">
                        </div>


                        <div class="form-group center" style="margin-bottom: 10px">
                            <label for="exampleFormControlSelect1">Лица допущенные к голосованию</label>
                            <select required class="form-control" id="exampleFormControlSelect1" name="permition">
                                <option value="1" selected>Физические лица</option>
                                <option value="2">Юридические лица</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-outline-success">Сохранить</button>
                    </form>

                </div>
                <div class="col-sm">

                </div>
            </div>
        </div>

    </div>
</div>
</body>

</html>
