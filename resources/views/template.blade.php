<!DOCTYPE html>
<html  lang="pl" data-theme="light" >
   <head>
     <title>Projekt - Jobs</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
     <link rel="stylesheet"  href="{{URL::asset('css/style.css?v=1.1')}}" />
   
</head>
<body>
    <div class="container" >

     @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
 
        <div >
    
            <div id="content">
              @yield("content")
            </div>  
        </div>    
  
 
    
    </div>   
     <script src="{{URL::asset('js/main.js?v=1.1')}}" ></script>
      
</body>
   
</html>