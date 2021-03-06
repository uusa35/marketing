<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ env('APP_NAME') }}</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">لم يتم تفعيل العضوية</div>
                <div class="title">
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <a href="{{ url('logout') }}" class=""
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();
                    ">الصفحة الرئيسية</a>
                </div>
            </div>
        </div>
    </body>
</html>
