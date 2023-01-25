<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>user Management System</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number] {
      -moz-appearance: textfield;
    }
     #piechart_3d{
            width: 700px;
            height: 200px;
      }
      #chart-div{
                    width: 900px;
                    height:300px;
                  }
      .login-alert{
             width: fit-content;
      }
    @media only screen and (max-width: 600px) {
                  .main-section>h3 {
                    overflow: hidden;
                    font-size: 90%;
                    gap: 2px;
                  }
                  #piechart_3d{
                    width: 300px;
                    height: fit-content;
                  }
                  #chart-div{
                    width: 10px;
                    height:fit-content;
                  }
                }
                @media only screen and (min-width: 600px) {
                    #piechart_3d{
                    width: 300px;
                    height: fit-content;
                  }
                  #chart-div{
                    width: 100px;
                    height:fit-content;
                  }
                }

                @media only screen and (min-width: 768px) {
                 #piechart_3d{
                    width: 400px;
                    height: fit-content;
                  }
                  #chart-div{
                    width: 100px;
                    height:fit-content;
                  }
}
</style>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        "bDestroy": true,
        'paging': false,

    });
} );
</script>
<body>

@yield('content')
</body>
</html>

