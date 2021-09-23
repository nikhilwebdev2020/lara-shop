<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ isset($title) ? $title : 'Home' }} | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('theme/admin/styles.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .form-group {
            margin-bottom: 1em;
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <div class="sidebar text-center">
            <a class="logo">
                E-LAB
            </a>

            @include('admin.sidebar')

        </div>
        <div class="main_content">
            <div class="header">
                <div class="row">

                    <div class="col-md-6 flex">
                        <div class="menu-toggle show-on-mobile">
                            <a href="" id="toggleMenu"><i class="fas fa-bars icon"></i></a>
                        </div>
                        <a href="{{ url('/') }}"><i class="fas fa-home icon"></i>Home</a>
                    </div>

                    <div class="col-md-6 text-end">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user icon"></i><span>Admin</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{csrf_field()}}
                                </form>
                            </ul>
                        </div>
                    </div>

                </div>


            </div>
            <div class="info">

                <main class="content">

                    @yield('content')

                </main>

            </div>
        </div>
    </div>

    <script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script async type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
              height: 350,
            });
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        const toggleMenu = document.getElementById('toggleMenu');
        $(toggleMenu).click(function(e){
            e.preventDefault();
            $('.sidebar').toggleClass('w-200-mobile');
            $('.main_content').toggleClass('w-200-mobile');
        });

        $('#btn-addmore').click(function(e){
          e.preventDefault();

          $(this).closest('.contacts').find('.appendhere').append(`
            <div class="row contact">
              <div class="col-md-4">
                  <input type="text" name="name[]" class="form-control">
              </div>
              <div class="col-md-4">
                  <input type="text" name="contactNo[]" class="form-control">
              </div>
              <div class="col-md-4">
                  <input type="text" name="location[]" class="form-control">
              </div>
            </div>
          `);

        });
    </script>

</body>

</html>