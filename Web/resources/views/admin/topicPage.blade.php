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
                <h2 class="m-0 font-weight-bold text-primary">List Topic</h2>
                {!! Form::open(['url' => 'admin/topicadd', 'method' => 'POST']) !!}
                    {!! Form::submit('ADD', ['class' => 'btn btn-success ml-auto']) !!}
                {!! Form::close() !!}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Describe </th>
                                <th> Image </th>
                                <th> EDIT </th>
                                <th> DELETE </th>
                                <th> DETAIL </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $topic )
                                <tr>
                                    <td>{{$topic->id}}</td>
                                    <td>{{$topic->name_topic}}</td>
                                    <td>{{$topic->describe_topic}}</td>
                                    <td style="text-align: center;">
                                        <img src="{{ url($topic->image_topic) }}" alt="" style="width: 100px;">
                                    </td>
                                    
                                    <td>
                                        {!! Form::open(['url' => 'admin/topic/edit/', 'method' => 'POST']) !!}
                                        <input type="hidden" name="edit_topic" value="{{ $topic->id }}" id="edit_topic">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT </button>
                                    {!! Form::close() !!}
                                    
                                    </td>
                                    <td>
                                        {!! Form::open(['url' => 'admin/topic/delete', 'method' => 'POST']) !!}
                                            <input type="hidden" name="delete_topic" value="{{$topic->id}}" id="delete_topic">
                                            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['url' => 'admin/topic/detail/'.$topic->id , 'method' => 'GET']) !!}
                                            <input type="hidden" name="detail_topic" value="{{$topic->id}}" id="detail_topic">
                                            <button type="submit" name="detail_btn" class="btn btn-danger"> DETAIL </button>
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