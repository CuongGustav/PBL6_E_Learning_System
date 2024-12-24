<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <script>
        setTimeout(function() {
            document.getElementById('status').style.display = 'none';
        }, 3000);
    </script>
</head>
<body>
    @if(session('status'))
        <div class="alert alert-success" id="status">
            {{session('status')}}
        </div>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h2 class="m-0 font-weight-bold text-primary">List Vocabulary Favourite</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Transcribe phonetically </th>
                                <th> Meaning </th>
                                <th> Example </th>
                                <th> Image </th>
                                <th> DELETE </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vocabularys as $vocabulary )
                                <tr>
                                    <td>{{$vocabulary->id}}</td>
                                    <td>{{$vocabulary->name_voca}}</td>
                                    <td>{{$vocabulary->transcribe_phonetically}}</td>
                                    <td>{{$vocabulary->meaning}}</td>
                                    <td>{{$vocabulary->example}}</td>
                                    <td style="text-align: center;">
                                        <img src="{{ url($vocabulary->image_voca) }}" alt="" style="width: 70px;">
                                    </td>
                                    <td>
                                        {!! Form::open(['url' => 'user/favourite/delete/' . $username . '/' . $vocabulary->id, 'method' => 'GET']) !!}
                                        <input type="hidden" name="delete_voca" value="{{$vocabulary->id}}" id="delete_voca">
                                            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>