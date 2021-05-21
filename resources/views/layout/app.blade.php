
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mazzuma API</title>
   
    <link href="{{ asset('mazzuma/css/styles.css') }}"  rel="stylesheet" />
    <link href="{{ asset('mazzuma/css/parsley.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body class="bg-primary" style="background-image: url('./assets/images/larry-farr-BFJC05gzLXo-unsplash.jpg');height: 100%;  background-position: center;background-repeat: no-repeat;background-size: cover;">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-light">
        <a class="navbar-brand" style="color: black" href="{{URL('/')}}">Mazzuma</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <a class="btn btn-primary" id="last_transac" href="{{URL('/check_transaction')}}">Check Last Transaction</a>

            <a class="btn btn-primary" id="validate_account" href="{{URL('/validate_account')}}">Validate Account</a>

            <a class="btn btn-primary" id="check_bal" href="{{URL('/checkBalance')}}">Check Balance</a>
        </div>
    </nav>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>

                <div class="container">
                    @yield('content')
                </div>
            
                

            </main>
        </div>

        @include('includes.footer')
        
    </div>
    <script src="{{ asset('mazzuma/js/scripts.js') }}" > </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   
</body>

</html>