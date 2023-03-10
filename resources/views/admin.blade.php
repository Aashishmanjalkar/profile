<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Admin Panel</a>
            <ul>
                <li class="nav-item">
                    <a class="nav-link active fw-bold text-white pt-2" aria-current="page" href="/logout">Log
                        Out</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>

    {{-- projects --}}

    <div class="container">
        <div class="row mt-4">
            <div class="col-6">
                <h3>Projects</h3>
            </div>
            <div class="col-6 d-flex flex-row-reverse">
                <button type="button" style="margin-bottom:10px;"
                class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Projects
                </button>
            </div>
        </div>
        <!-- Button trigger modal -->



        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Project no</th>
                        <th scope="col">Description</th>
                        <th scope="col">Link</th>
                        <th scope="col">Image</th>
                        <th scope="col">Update/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($projects)
                    @foreach ($projects as $project)
                    <tr>
                    <th scope="row">{{$project['id']}}</th>
                        <td>{{$project['description']}}</td>
                        <td>{{$project['link']}}</td>
                        <td>{{$project['image']}}</td>
                        <td>
                            <a data-id="{{$project['id']}}" data-description="{{$project['description']}}" data-link="{{$project['link']}}" data-image="{{$project['image']}}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-sm update">update</a>
                            <a data-id="{{$project['id']}}" data-bs-toggle="modal" data-bs-target="#deleteModal" data-description="{{$project['description']}}" class="btn btn-danger btn-sm delete">delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Projects Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalLabel"
       aria-hidden="true">
    <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h1 class="modal-title fs-5" id="modalLabel">Add Project</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                       aria-label="Close"></button>
               </div>
               <form id="form" action="{{url('/addProject')}}" method="post" enctype="multipart/form-data">

               <div class="modal-body">
                    @csrf
                    <input type="hidden" id="data-id" name="id" value="">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control form-control-sm" name="description" id="description" placeholder="Enter description" required  >
                    </div>
                    <div class="form-group">
                        <label for="projectUrl">Project Url</label>
                        <input type="text" class="form-control form-control-sm" name="projectUrl" id="projectUrl" placeholder="Enter Project Url" required>
                    </div>
                    <div class="form-group">
                        <label for="imageLink" style="display: block !important">Add Image</label>
                        <input type="file" class="form-control-file form-control-sm" name="image" id="imageLink" required>
                    </div>
                    {{-- <input type="submit" value="Login"> --}}

               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary btn-sm closeBtn" data-bs-dismiss="modal">Close</button>
                   <button type="submit" id="save" class="btn btn-primary btn-sm">Save</button>
               </div>
            </form>

           </div>
       </div>
   </div>


   <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalLabel"
   aria-hidden="true">
<div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h1 class="modal-title fs-5" id="modalLabel">Delete Project</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal"
                   aria-label="Close"></button>
           </div>
           <div class="modal-body">
                <input type="hidden" class="delete_id" name="id" value="">
                <h2 id="deleteModule"></h2>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary btn-sm deleteCloseBtn" data-bs-dismiss="modal">Close</button>
               <button type="submit" id="deleteBtn" class="btn btn-primary btn-sm">Delete</button>
           </div>
       </div>
   </div>
</div>

   <script src="{{URL::asset('js/index.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
