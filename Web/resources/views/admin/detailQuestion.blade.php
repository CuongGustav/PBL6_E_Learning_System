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
                <h2 class="m-0 font-weight-bold text-primary">Test</h2>
                <a href="{{ route('addQuestionPage', ['id_test'=> $id_test]) }}" class="btn btn-success ml-auto"> ADD </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Question </th>
                                <th> Answer A </th>
                                <th> Answer B </th>
                                <th> Answer C </th>
                                <th> Answer D </th>
                                <th> Answer Right </th> 
                                <th> Edit </th> 
                                <th> Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question )
                                <tr>
                                    <td>{{$question->id}}</td>
                                    <td>{{$question->Name_question}}</td>
                                    <td>{{$question->Answer_A}}</td>
                                    <td>{{$question->Answer_B}}</td>
                                    <td>{{$question->Answer_C}}</td>
                                    <td>{{$question->Answer_D}}</td>
                                    <td>{{$question->Answer_right}}</td>
                                    <td>
                                        <a href="{{ route('editQuestionPage', ['id_question'=> $question->id]) }}" class="btn btn-success ml-auto"> Edit </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('submitDeleteQuestion', ['id_question'=>$question->id, 'id_test' => $id_test]) }}" class="btn btn-success ml-auto"> Delete </a>
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