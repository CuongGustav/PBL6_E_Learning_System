<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="/PBL6/public/css/style_addeditTopic.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('image_topic').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview-image').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Question</h2>
        {!! Form::open(['url' => 'admin/testpage/detailtest/editquestion/submit/'. $question->id, 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::text('Name_question', $question->Name_question, ['class' => 'form-control', 'placeholder' => 'Question']) !!}
                @error('Name_question')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::text('Answer_A', $question->Answer_A, ['class' => 'form-control', 'placeholder' => 'Answer A']) !!}
                @error('Answer_A')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::text('Answer_B', $question->Answer_B, ['class' => 'form-control', 'placeholder' => 'Answer B']) !!}
                @error('Answer_B')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::text('Answer_C', $question->Answer_C, ['class' => 'form-control', 'placeholder' => 'Answer C']) !!}
                @error('Answer_C')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::text('Answer_D', $question->Answer_D, ['class' => 'form-control', 'placeholder' => 'Answer D']) !!}
                @error('Answer_D')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::text('Answer_right', $question->Answer_right, ['class' => 'form-control', 'placeholder' => 'Answer Right']) !!}
                @error('Answer_right')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::submit('ADD', ['name' => 'sm-add', 'class' => 'btn btn-outline-secondary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    
</body>
</html>