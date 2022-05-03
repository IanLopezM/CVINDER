<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CVINDER</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
        textarea {
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
        textarea:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type=text]:placeholder,
        input[type=password]:placeholder,
        textarea:placeholder {
            color: #cccccc;
        }
    </style>
</head>

<body class="leading-normal tracking-normal text-white" style="font-family: 'Source Sans Pro', sans-serif; height: 100vh" cz-shortcut-listen="true">
    <div>
        <div class="float-left w-1/5 shadow-md bg-white" style="height: 100vh">
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
                    <p class="text-gray-800 font-bold text-xl mb-2 px-2">Descripción</p>
                    <textarea id="desc" name="desc" rows="20" cols="20" placeholder="Descripción" maxlength="1300"></textarea>
                </li>
                <br>
                <hr>
            </ul>
        </div>
        <div class="text-gray-800 float-right w-4/5 flex justify-center gradient" style="height: 85vh;">
            <div class="w-3/6  bg-white rounded-md mt-6 block" style="height: 95%;">
                <h1 class="text-black-800 ml-6 mt-12 mr-12 text-5xl font-extrabold">Doit Sistemas Multisensoriales</h1>
                <h5 class="text-blue-800 ml-12 mt-6 mr-12 text-xl font-extrabold leading-8">
                    DOIT es una empresa que diseña, fabrica e instala material para la estimulación sensorial, multisensorial o snoezelen en España. Todos nuestros productos se adaptan en todo lo posible a las necesidades de nuestros clientes. Nuestra materia prima es de procedencia de la UE, por lo que garantizamos un producto final de gran calidad y durabilidad.

                    En DOIT, mejoramos constantemente nuestros productos acorde a les últimas tendencias dentro del campo de la estimulación multisensorial. Nuestras soluciones van dirigidas a Centros de Educación Especial, centros socio-sanitarios, guarderías, escuelas ordinarias, unidades de lesiones cerebrales, cuidados paliativos… Entre un larga lista, en las que podemos aplicar las terapias multisensoriales.

                    Nuestra tecnología la desarrollamos conjuntamente en colaboración de prestigiosos profesionales del ámbito de la terapia snoezelen. Trabajamos a diario para desarrollar nuevos productos y un nuevo software que mejoren los resultados de la terapia multisensorial y faciliten también el trabajo de los terapeutas.Nuestra tecnología la desarrollamos conjuntamente en colaboración de prestigiosos profesionales del ámbito de la terapia snoezelen. Trabajamos a diario para desarrollar nuevos productos y mbito de la terapia snoezelen. Trabajamos a diario paaa
                </h5>
            </div>
        </div>
        <div class="text-gray-800 float-right w-4/5 flex justify-center gradient" style="height: 15vh;">
            <button id="navAction" class="mt-6 mx-auto lg:mx-0 hover:underline font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 bg-white text-gray-800 h-24">
                <a href="#">Guardar
                </a>
            </button>
        </div>
    </div>


</body>

</html>