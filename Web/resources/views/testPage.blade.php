<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Div with Links</title>
    <link rel="stylesheet" href="/PBL6/public/css/style_testPage.css">
</head>
<body>
    <div class="container">
        @foreach ($tests as $test)
        <div class="box">
            <a href="{{ route('detailQuestionUser', ['id_test'=> $test->id]) }}">{{$test->NameTest}}</a>
        </div>
        @endforeach
        
    </div>
</body>
</html>
