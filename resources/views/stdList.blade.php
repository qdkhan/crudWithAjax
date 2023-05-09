<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Choice</th>
            <th scope="col">Images</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
            
                <th scope="row">{{$data['id']}}</th>
                <td>{{$data['name']}}</td>
                <td>{{$data['email']}}</td>
                <td>{{$data['phone']}}</td>
                <td>{{$data['choice']}}</td>
                <td>
                    @if($data['images'])
                        <img src="{{ Storage::url($data['images']) }}" alt="profile Pic" height="100" width="100">
                        @else
                        No Image
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/js/custom.js')}}"></script>
    </body>
</html>