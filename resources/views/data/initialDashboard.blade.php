<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h3>Userlist</h3>


<ul class="form-control">

    {{-- its a php code that is not alowrd in laraBlade so convert it in LARABLADE --}}
    <?php
                // foreach($listUsers as $users){
        ?>
    <h4>
    <?php
                // echo $users['name']
     ?>             </h4>
    <?php
                // }
    ?>

    {{--
         =====>>>
         =====>>>
    --}}

@foreach($listUsers as $users)
    <h5>{{$users['name']}}</h5>
    <h5>{{$users['age']}} </h5>
    <h5>{{$users['city']}}</h5>
    @if($users['age']<18)
        <p>User Cant Drivee !!!</p>
    @endif
<br>
@endforeach

</ul>

<pre> <?php print_r($listUsers) ?> </pre>


@copyright {{ date('D-d-M-Y')}}
{{--
     D-day (digit)
     d-date of week
     m-month (digit)
     M-Motht in Word
     y-last 2 dig of year
     Y-all 4 digit of year
--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
