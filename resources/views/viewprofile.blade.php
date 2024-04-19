<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>View</title>
</head>

<body>
    <div class="container">

        <div class="container d-flex justify-content-center">
            <div>
                <h3 class="text-center fw-bold mt-3">User Information</h3>
                Name : {{$data->name}}
                <br>
                Email : {{$data->email}}

                <br>
                Address : {{$data->address}}

            </div>
        </div>



        <h3 class="text-center fw-bold mt-3">Projects:</h3>
        @if(count($projects) === 0) <span>No Projects found</span>

        @else

        <div class="container w-50 p-2 d-flex text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($projects as $records)
                    <tr>
                        <td>{{$records->title}}</td>
                        <td>{{$records->description}}</td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
        @endif
    </div>







</body>

</html>