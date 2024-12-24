<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="/PBL6/public/css/style_addeditVoca.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('image_voca').addEventListener('change', function(event) {
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
        <h2>THÔNG TIN ĐỀ TÀI</h2>
        {!! Form::open(['url' => 'admin/topic/vocabulary/add/submit' , 'method' => 'POST', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::text('name_voca', '', ['class' => 'form-control', 'placeholder' => 'Tiêu đề']) !!}
                @error('name_voca')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::text('transcribe_phonetically','', ['class' => 'form-control', 'placeholder' => 'Phiên âm']) !!}
                @error('transcribe_phonetically')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::text('meaning','', ['class' => 'form-control', 'placeholder' => 'Nghĩa']) !!}
                @error('meaning')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::textarea('example','', ['class' => 'form-control', 'placeholder' => 'Ví dụ', 'style' => 'height: 100px;']) !!}
                @error('example')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::select('id_topic', [0 => 'Đề Tài'] + $topics, null, ['class' => 'form-select']) !!}
                @error('id_topic')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
            </div>

            <div class="form-group">
                <img id="preview-image" src="" alt="Image Preview" style="max-width: 200px; margin-top: 10px;">
                <input type="file" id="image_voca" class="form-control" name="image_voca">
                @error('image_voca')
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