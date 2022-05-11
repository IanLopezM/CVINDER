<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CVINDER</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
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
        <form method="POST" action="{{route('enterprise.edit')}}" id="formEnterprise">

            <div class="float-left w-1/5 shadow-md bg-white overflow-auto" style="height: 100vh">
                <ul class="relative">
                    <li class="relative gradient">
                        <a class="toggleColour no-underline hover:no-underline font-bold text-2xl lg:text-4xl text-gray-800" href="#">
                            <!--http://www.potlabicons.com/ -->
                            <svg class="inline" viewBox="0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none">
                                <style>
                                    @keyframes check {
                                        to {
                                            stroke-dashoffset: 0;
                                        }
                                    }
                                </style>
                                <rect width="10" height="14" x="7" y="5" stroke="#0A0A30" stroke-width="1.5" rx="1" />
                                <path stroke="#265BFF" stroke-linecap="round" stroke-width="1.5" d="M10 8.973h4m-4 3.64h2" style="animation:check 3s infinite cubic-bezier(.99,-.1,.01,1.02)" stroke-dashoffset="100" stroke-dasharray="100" />
                            </svg>
                            CVINDER
                        </a>
                    </li>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Nombre</p>
                        <input type="text" id="user" name="user" placeholder="Nombre" maxlength="30">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Mail</p>
                        <input type="text" id="mail" name="mail" placeholder="{{$enterprise->mail}}" maxlength="30" readonly>
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Provincia</p>
                        <select name="province" id="province">
                            @foreach ($provinces as $province)
                            <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Ofertas <button><a><i class='far fa-plus-square'></i></a></button></p>
                        <!-- foreach -->
                        @foreach ($enterprise->offers as $offer)
                        <div class="mt-2 mr-2 inline-block">
                            <button id="navAction" class="mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800">
                                <a href="#" class="bgtransp">$offer->title<i class='far fa-edit'></i>
                                </a>
                            </button>
                        </div>
                        @endforeach
                        <!-- endforeach -->
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Descripción</p>
                        <textarea id="desc" name="desc" rows="20" cols="20" placeholder="Descripción" maxlength="1300"></textarea>
                    </li>
                </ul>
            </div>
            <div class="text-gray-800 float-right w-4/5 flex justify-center gradient" style="height: 90vh;">
                <div class="w-3/6  bg-white rounded-md mt-6 block" style="height: 95%;">
                    <h1 class="text-black-800 ml-6 mt-12 mr-12 text-5xl font-extrabold" id="title">{{$enterprise->name}}</h1>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="ubi">{{$prov->name}}, España</h4>
                    <h5 class="text-blue-800 ml-10 mt-6 mr-12 text-xl font-extrabold leading-8" id="bodydesc">
                        {{$enterprise->description}}
                    </h5>
                </div>
            </div>
            <div class="text-gray-800 float-right w-4/5 flex justify-center gradient" style="height: 10vh;">
                <button id="guardar" class="mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow opacity-75 bg-white text-gray-800 h-24">
                    <a href="#">Guardar
                    </a>
                </button>
            </div>
        </form>

    </div>
</body>
<script>
    console.log("hola");
    var user;
    var title;

    var mail;
    var pwd;

    var desc;
    var bodydesc;

    var province;
    var ubi;
    var provinces;

    var btnGuardar;

    var form;

    document.addEventListener('DOMContentLoaded', function(event) {
        user = document.getElementById("user")
        title = document.getElementById("title")
        mail = document.getElementById("mail")
        pwd = document.getElementById("pwd")
        desc = document.getElementById("desc");
        bodydesc = document.getElementById("bodydesc")
        province = document.getElementById("province")
        ubi = document.getElementById("ubi")
        provinces = province.children
        btnGuardar = document.getElementById("guardar")
        form = document.getElementById("formEnterprise")

        user.addEventListener("keyup", updateUser);
        user.addEventListener("change", updateUser);
        desc.addEventListener("keyup", updateDesc);
        desc.addEventListener("change", updateDesc);
        province.addEventListener("keyup", updateUbi);
        province.addEventListener("change", updateUbi);
        btnGuardar.addEventListener("click", editEnterprise);
    });

    function updateUser() {
        title.innerHTML = "";
        title.append(user.value);
    }

    function updateDesc() {
        bodydesc.innerHTML = "";
        bodydesc.append(desc.value);
    }

    function updateUbi() {
        ubi.innerHTML = "";
        ubi.append(provinces[province.value - 1].innerHTML + ", España");
        console.log(provinces[province.value - 1].innerHTML);
    }

    function editEnterprise() {
        if (user.value != null && mail.value != null && desc.value != null && province.value != null && pwd.value != null && pwd.value.length > 8) {
            form.submit();
        }
    }
</script>

</html>