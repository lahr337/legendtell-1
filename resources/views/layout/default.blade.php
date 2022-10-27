<!DOCTYPE html>
<html lang="en-EN">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link href="{{ asset('/assets/plugins/formvalidation/dist/css/formValidation.min.css') }}" rel="stylesheet" type="text/css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


    <style>
      .invalid-feedback, .error{
        color: #dc3545;
        /* font-size: 80%;
        margin-top: 0.25rem; */
      }
    </style>

    {{-- Includable CSS --}}
    @yield('styles')
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>

<body onload="startTime()">
    @include('layout.frontend.header')
    @yield('content')
   <div class="loader"> <span class="loader-1"> </span></div>
    @include('layout.frontend.footer')

    
    {{-- google key --}}
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script type="text/javascript" src="{{asset('/assets/js/mapInput.js')}}"></script>
    {{-- end google key --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('/assets/plugins/formvalidation/dist/js/FormValidation.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/plugins/formvalidation/dist/js/plugins/Bootstrap.min.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> --}}
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script>
        $(function() {
          $('.txtFirstName').keydown(function(e) {
            if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
            } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
              }
            }
          });
        });
      </script>
       <script>
      function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clocktxt').innerHTML =  h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
      }
      function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
      }
      </script>
    @yield('scripts')
</body>

</html>
