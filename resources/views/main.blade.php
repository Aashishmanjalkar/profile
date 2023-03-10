<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ashish M</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Domine&family=Lusitana&family=Philosopher&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/canvas/canvas.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>

    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark"">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active navbarHover " aria-current="page" href="#">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link navbarHover " href="#">ABOUT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link navbarHover " href="#">PROJECTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link navbarHover " href="#">CONTACT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> --}}
    <div class="navbar">
        <!-- <img src="images/logoAshish.png" alt="" srcset=""> -->
        {{-- <h4>Ashish</h4> --}}

        <nav class="navbar-links">
            <ul>
                <li><a class="a " href="">HOME</a></li>
                <li><a class="a " href="#about">ABOUT</a></li>
                <li><a class="a " href="#projects">PROJECTS</a></li>
                <li><a class="a " href="#contact">CONTACT ME</a></li>
            </ul>
        </nav>

    </div>

    <section id="home" class="flex height-fix">
        <div id="pt" class="canvas"></div>
        <div class="flex">
            <div class="text">
                Hello, I'm <span class="highlight">Ashish Manjalkar</span>.
                <br />
                I'm a full-stack web developer.
            </div>

            <div class="button page-link" dest="about">
                View my work</div>

            {{-- <nav class="flex">
            <div class="link-wrap">
              <div class="active page-link" dest="home">home</div>
              <div class="page-link" dest="about">about</div>
              <div class="page-link" dest="portfolio">portfolio</div>
              <div class="page-link" dest="blog">blog</div>
              <div class="page-link" dest="contact">contact</div>
            </div>
            <i class="mdi mdi-menu"></i>
          </nav> --}}
        </div>
    </section>

    <div class="container pb-4">
        <h2 id="about" class="pt-3 text-dark">About Me</h2>
        <div class="row">
            <div class="col-lg-6 col-sm-12">

                <div class="part pt-4">
                    <div class="hexa">
                        <div class="hex1">
                            <div class="hex2">
                                <img src="./images/personalPIc.jpg" alt="" width="320" height="313" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="intro">
                    @isset($description)
                        <p class="text-dark pt-4 description">{{$description}}</p>
                    @endisset
                    {{-- <p class="text-dark pt-4 description">I'm an full stack developer from mumbai. I have completed my education in
                        bachelor of science in statistics.
                        I'm currently working as software developer (laravel) in Big Rattle technologies .</p> --}}
                    <p class="text-dark" id="link">To Know More Download My resume</p>
                    <a href="files/resume (2).pdf" class="btn btn-primary" target="_blank">Resume</a>
                </div>

            </div>

            <div class="col-lg-6 col-sm-12">
                <h2 class="text-dark pt-4 pb-4">My Skills</h2>

                <p class="text-dark mb-1">HTML</p>
                <div class="skillContainer">
                    <div class="skills html" data-width="80%">80%</div>
                </div>

                <p class="text-dark mb-1">CSS</p>
                <div class="skillContainer">
                    <div class="skills css">75%</div>
                </div>

                <p class="text-dark mb-1">JavaScript</p>
                <div class="skillContainer">
                    <div class="skills js">70%</div>
                </div>

                <p class="text-dark mb-1">JQuery</p>
                <div class="skillContainer">
                    <div class="skills jquery">70%</div>
                </div>

                <p class="text-dark mb-1">Laravel</p>
                <div class="skillContainer">
                    <div class="skills laravel">70%</div>
                </div>

                <p class="text-dark mb-1">My sql</p>
                <div class="skillContainer">
                    <div class="skills mysql">65%</div>
                </div>

                <p class="text-dark mb-1">PHP</p>
                <div class="skillContainer">
                    <div class="skills php">60%</div>
                </div>


            </div>
        </div>
    </div>

    <div class="container pt-4 pb-4">
        <h2 id="projects" class="pt-3 text-dark py-4">Projects</h2>
        <div class="d-flex flex-row flex-wrap projects">
            @isset($projects)
                    @foreach ($projects as $project)
                    {{-- @php
                        $url = asset( 'uploads/'.$project['image']);

                    @endphp --}}
                    <div class="project p-2">
                        <img id="project_1" src="{{$project['image']}}" height="250px" width="250px">
                        <img id="project_1" src="{{asset('uploads/horse.jpg')}}" height="250px" width="250px">
                        <p class="text-dark mb-0">{{$project['description']}}</p>
                        <a href="" class="btn btn-primary">{{$project['link']}}</a>
                    </div>
                    @endforeach
            @endisset

            {{-- <div class="project p-2">
                <img src="./images/p1.png" height="250px" width="250px">
                <p class="text-dark">Description</p>
                <a href="" class="btn btn-primary">To Website</a>
            </div>
            <div class="project p-2">
                <img src="./images/p1.png" height="250px" width="250px">
            </div>
            <div class="project p-2">
                <img src="./images/p1.png" height="250px" width="250px">
            </div>
            <div class="project p-2">
                <img src="./images/p1.png" height="250px" width="250px">
            </div>
            <div class="project p-2">
                <img src="./images/p1.png" height="250px" width="250px">
            </div>
            <div class="project p-2">
                <img src="./images/p1.png" height="250px" width="250px">
            </div> --}}

        </div>

    </div>

    <div class="container-fluid from pt-4">
        <h1 id="contact">Contact</h1>
        <div class="d-flex justify-content-center">
            <div class="col-lg-5 col-sm-10">
                <p>Have a question or want to work together ?</p>
                <div class="d-flex flex-column pb-4">
                    <input type="text" class="name bg-black" placeholder="Name">
                    <input type="text" class="email" placeholder="Enter Your Email">
                    <textarea id="w3review" class="message" name="w3review" rows="4" placeholder="Your Message" cols="50"></textarea>
                    <button class="submitButton" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-5 d-flex justify-content-center">
                    <div class="icons">
                        <a href="https://t.co/VBNNTjtw3F" class="icon1 icon--instagram">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="#" class="icon1 icon--twitter">
                            <i class="ri-twitter-line"></i>
                        </a>
                        <a href="linkedin.com/in/brayan-ospina-8bb472243" class="icon1 icon--linkedin">
                            <i class="ri-linkedin-line"></i>
                        </a>
                        <a href="https://github.com/brayanospina2005/final-project" class="icon1 icon--github">
                            <i class="ri-github-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <p class="pt-4">Copyright © 2023 Ashish Manjalkar</p>
        </div>

    </footer>



    <script src="{{ URL::asset('js/canvas/pt.min.js') }}"></script>
    <script src="{{ URL::asset('js/canvas/canvas.js') }}"></script>
    <script src="{{ URL::asset('js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
