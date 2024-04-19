<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container w-75">
        <!-- Button trigger modal -->

        <div class="me-3 d-flex justify-content-end" ;>
            <button type="button" class="btn btn-primary mt-2 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create Project
            </button>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Project Creation</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/addProject/{{$id}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>

                            

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">description</label>
                                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>

        <div>
            <!-- {{$records}} -->
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $records)
                        <tr>
                            <td>{{$records->title}}</td>
                            <td>{{$records->description}}</td>
                            <td>
                                <div class="d-flex justify-content-between">

                                    <!-- Button trigger modal -->
                                        
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$records->id}}">
                                        Edit
                                        </button>
                                

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$records->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/edit_project/{{$records->id}}" method="POST">
                                                        <!-- {{url('edit_record,$records->id')}} -->
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">title</label>
                                                            <input type="text" name="title" value="{{$records->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">description</label>
                                                            <input type="text" name="description" class="form-control"   value="{{$records->description}}" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    <a href="/delete_project/{{$records->id}}">
                                        <button class="btn btn-danger ms-2">Delete</button>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>


            
        </div>
    </div>

</body>


</html>