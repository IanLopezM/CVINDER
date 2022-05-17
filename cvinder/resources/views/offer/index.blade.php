<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CVINDER</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .gradient {
            background: linear-gradient(90deg, rgba(51, 213, 162, 1) 0%, rgba(81, 134, 218, 1) 100%);
        }

        input[type=button],
        input[type=submit],
        input[type=reset] {
            background-color: rgba(51, 213, 162, 1);
            border: none;
            color: white;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin: 5px 20px 40px 20px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        input[type=button]:hover,
        input[type=submit]:hover,
        input[type=reset]:hover {
            background-color: rgba(51, 213, 162, 1);
        }

        input[type=button]:active,
        input[type=submit]:active,
        input[type=reset]:active {
            -moz-transform: scale(0.95);
            -webkit-transform: scale(0.95);
            -o-transform: scale(0.95);
            -ms-transform: scale(0.95);
            transform: scale(0.95);
        }

        input[type=text],
        input[type=password],
        textarea,
        select {
            background-color: #f6f6f6;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            resize: none;
        }

        input[type=text]:focus,
        input[type=password]:focus,
        textarea:focus,
        select:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type=text]:placeholder,
        input[type=password]:placeholder,
        textarea:placeholder,
        select::placeholder {
            color: #cccccc;
        }

        .bgtransp {
            background: linear-gradient(90deg, rgba(51, 213, 162, 1) 0%, rgba(81, 134, 218, 1) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="leading-normal tracking-normal text-white" style="font-family: 'Source Sans Pro', sans-serif; height: 100vh" cz-shortcut-listen="true">
    <div>
        <div class="text-gray-800 float-left w-full flex justify-center gradient" style="height: 5vh;">
            <div class="float-left w-1/6 flex justify-end" style="height: 5vh;">
                <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-xl font-extrabold">DISLIKE <i class="fa-solid fa-thumbs-down"></i></h4>
            </div>
            <div class="float-left w-4/6 flex justify-center" style="height: 5vh;">
                <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-xl font-extrabold"><a href="{{route('enterprise.return', ['enterprise'=>$enterprise])}}">Vuelve a tu perfil</a></h4>
            </div>
            <div class="float-left w-1/6 flex justify-start" style="height: 5vh;">
                <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-xl font-extrabold">LIKE <i class="fa-solid fa-thumbs-up"></i></h4>
            </div>
        </div>
        <div class="text-gray-800 float-left w-full flex justify-center gradient" style="height: 95vh">
            <div id="nolike" ondrop="drop(event)" ondragover="allowDrop(event)" class="dropzone text-gray-800 float-left w-1/6 flex justify-center" style="height: 95vh;">
            </div>
            <div class="text-gray-800 float-left w-4/6 flex justify-center" id="container-curs" style="height: 95vh;">
                @foreach($allworkers as $worker)
                <div id="{{$worker->id}}" draggable="true" class="w-3/5  bg-white rounded-md mt-6 block hidden" ondragstart="drag(event)" style="height: 95%;">

                    <h1 class="text-black-800 ml-6 mt-12 mr-12 text-5xl font-extrabold" id="curname">{{$worker->name}} {{$worker->surname}}</h1>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curubi">{{$allprovinces[$worker->province_id -1]->name}}</h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curaddress">{{$worker->address}}</h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curage">{{$worker->age}} </h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curforms">
                        @foreach($worker->academics as $academic)
                        <p>Ubi {{$academic->location}} titulo {{$academic->title}} start {{$academic->yearStart}} end {{$academic->yearEnd}}</p><br>
                        @endforeach
                    </h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curexps">
                        @foreach($worker->experiences as $formatio)
                        <p>Ubi {{$formatio->location}} titulo {{$formatio->charge}} start {{$formatio->yearStart}} end {{$formatio->yearEnd}}</p><br>
                        @endforeach
                    </h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curskills">
                        Skills:
                        @foreach ($worker->skillWorkers as $myskill)
                        <div class="skill{{$skills[$myskill->skill_id-1]->id}} mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 inline-block ml-2 mr-2 mb-2s">
                            <a href="#" class="bgtransp">{{$skills[$myskill->skill_id - 1]->name}}</a>
                        </div>
                        @endforeach
                    </h4>

                </div>
                @endforeach
            </div>
            <div id="yeslike" ondrop="drop(event)" ondragover="allowDrop(event)" class="dropzone text-gray-800 float-left w-1/6 flex justify-center" style="height: 95vh;">
            </div>
        </div>
    </div>
</body>
<script>
    var curr = document.getElementById("curr");
    var nolike = document.getElementById("nolike");
    var yeslike = document.getElementById("yeslike");
    var containerCurs = document.getElementById("container-curs");
    var currs = containerCurs.children;
    var pos = 0;
    var offerid;
    // containerCurs[0].firstChild.classList.remove("hidden");
    // containerCurs.firstChild.classList.add("isShow");


    document.addEventListener('DOMContentLoaded', function(event) {
        var allworkers = @json($allworkers);
        offerid = @json($offer["id"]);
        console.log(offerid);
        currs[pos].classList.add("isShow");
        currs[pos].classList.remove("hidden");
        console.log(currs[0]);

        // console.log(allworkers);
    });

    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        console.log(ev.target.id);

    }

    function drop(ev) {

        console.log("dropped on" + ev.target.id);
        let mostrado = document.getElementsByClassName("isShow");

        if (ev.target.id == "yeslike") {
            let hijosDivWorker = mostrado[0];
            let workerid = hijosDivWorker.id;

            $.ajax({
                url: 'offer/save',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "workerid": workerid,
                    "offerid": offerid
                },
                type: "post",
                cache: false,
                success: function(savingStatus) {
                    console.log(savingStatus);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr);
                }
            });

        }

        currs[pos].classList.remove("isShow");
        currs[pos].classList.add("hidden");
        if (currs[pos + 1] != null) {
            pos++;
            currs[pos].classList.add("isShow");
            currs[pos].classList.remove("hidden");
        }


    }
</script>

</html>