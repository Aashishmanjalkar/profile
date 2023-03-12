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
                <button type="button" style="margin-bottom:10px;" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Add Projects
                </button>
            </div>
        </div>
        <!-- Button trigger modal -->



        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Project No</th>
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
                                <th scope="row">{{ $project['id'] }}</th>
                                <td>{{ $project['description'] }}</td>
                                <td>{{ $project['link'] }}</td>
                                <td>{{ $project['image'] }}</td>
                                <td>
                                    <a data-id="{{ $project['id'] }}" data-description="{{ $project['description'] }}"
                                        data-link="{{ $project['link'] }}" data-image="{{ $project['image'] }}"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-primary btn-sm update">update</a>
                                    <a data-id="{{ $project['id'] }}" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-description="{{ $project['description'] }}"
                                        data-url = "deleteProject" class="btn btn-danger btn-sm delete">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
<hr>
        <div class="row mt-4">
            <h3>Description</h3>
            <div class="col-12">
                @isset($description)
                    <form action="{{ url('/updateDescription') }}" method="post">
                        @csrf
                        <textarea class="form-control" name="description" aria-label="With textarea">{{ $description }}</textarea>
                        <button type="submit" id="updateDescription" class="btn btn-primary btn-sm mt-4">Update
                            Description</button>
                    </form>
                @endisset
            </div>
    <hr class="mt-2">
            {{-- Resume --}}
            <div class="col-12">
                <form action="{{ url('/updateResume') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-4">
                        <h3>Resume</h3>
                        <input type="file" class="form-control-file form-control-sm" name="resume" id="resume"
                            required>
                        <button type="submit" class="btn btn-primary btn-sm">Update Resume</button>
                    </div>
                </form>
            </div>
        </div>



<hr >
         {{-- Skills --}}
    <div class="row mt-4">
        <div class="col-6">
            <h3>Skills</h3>
        </div>
        <div class="col-6 d-flex flex-row-reverse">
            <button type="button" style="margin-bottom:10px;" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#skillsModal">Add Skills
            </button>
        </div>
    </div>


    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Skill No</th>
                    <th scope="col">Skill Name</th>
                    <th scope="col">Skill Percentage</th>
                    <th scope="col">Skill Color</th>
                    <th scope="col">Update/Delete</th>
                </tr>
            </thead>
            <tbody>
                @isset($skills)
                    @foreach ($skills as $skill)
                        <tr>
                            <th scope="row">{{ $skill['id'] }}</th>
                            <td>{{ $skill['name'] }}</td>
                            <td>{{ $skill['percentage'] }}</td>
                            <td><span style="
                                height: 25px;
                                width: 25px;
                                background-color: {{ $skill['color'] }};
                                border-radius: 50%;
                                display: inline-block;
                                margin-left: 28px;"
                                class="dot"></span></td>
                            <td>
                                <a data-id="{{ $skill['id'] }}" data-name="{{ $skill['name'] }}"
                                    data-percentage="{{ $skill['percentage'] }}" data-color="{{ $skill['color'] }}"
                                    data-bs-toggle="modal" data-bs-target="#skillsModal"
                                    class="btn btn-primary btn-sm updateSkill">update</a>
                                <a data-id="{{ $skill['id'] }}" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-description="{{ $skill['name'] }}" data-url ="deleteSkill"
                                    class="btn btn-danger btn-sm delete">delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>

    </div>


    <!-- Add Projects Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Add Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" action="{{ url('/addProject') }}" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="data-id" name="id" value="">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control form-control-sm" name="description"
                                id="description" placeholder="Enter description" required>
                        </div>
                        <div class="form-group">
                            <label for="projectUrl">Project Url</label>
                            <input type="text" class="form-control form-control-sm" name="projectUrl"
                                id="projectUrl" placeholder="Enter Project Url" required>
                        </div>
                        <div class="form-group">
                            <label for="imageLink" style="display: block !important">Add Image</label>
                            <input type="file" class="form-control-file form-control-sm" name="image"
                                id="imageLink" required>
                        </div>
                        {{-- <input type="submit" value="Login"> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm closeBtn"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="save" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Delete Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="delete_id" name="id" value="">
                    <h2 class="deleteModule"></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm deleteCloseBtn"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="deleteBtn" class="btn btn-primary btn-sm">Delete</button>
                </div>
            </div>
        </div>
    </div>



    {{-- skills modal --}}
    <div class="modal fade" id="skillsModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="skillModalLabel">Add Skills</h1>
                    <button type="button" class="btn-close skill-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/addSkill')}}" method="post" id="skillForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="data-skill-id" name="id" value="">
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="skillName">Skill Name</label>
                        <input type="text" class="form-control form-control-sm" name="skillName"
                            id="skillName" placeholder="Enter skill" required>
                    </div>

                    <div class="form-group">
                        <label for="skillPercentage">Skill Percentage</label>
                        <input type="text" class="form-control form-control-sm mb-2" name="skillPercentage"
                            id="skillPercentage" placeholder="Enter in percentage" required>
                    </div>
                    <div class="form-group">
                        <label for="color">Select Color</label>
                        <input type="color" name="color" id="color" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm skillCloseBtn"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addSkillsBtn" class="btn btn-primary btn-sm">Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
