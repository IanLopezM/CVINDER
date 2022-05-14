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
        input[type=number],
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
        input[type=number]:focus,
        input[type=password]:focus,
        textarea:focus,
        select:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type=text]:placeholder,
        input[type=number]:placeholder,
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
        <form method="POST" action="{{route('worker.store')}}" id="formWorker">
            @csrf
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
                        <input type="text" id="user" name="user" placeholder="Nombre" maxlength="15">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Apellido</p>
                        <input type="text" id="lastname" name="lastname" placeholder="Apellido" maxlength="30">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Mail</p>
                        <input type="text" id="mail" name="mail" placeholder="worker@gmail.com" maxlength="30">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <label class="text-gray-800 font-bold text-xl mb-2 px-2">Contraseña</label>
                        <input type="password" id="pwd" name="pwd" placeholder="Contraseña" minlength="8">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Direccion</p>
                        <input type="text" id="address" name="address" placeholder="Direccion" maxlength="30">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Edad</p>
                        <input type="text" id="edad" name="edad" placeholder="Edad" maxlength="30">
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
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Formación <a href="#" class="bgtransp"><i id="itoaddform" class='far fa-plus-square'></i></a></p>
                        <div id="divformacion" class="mt-2 mr-2 inline-block">

                        </div>
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Experiencia <a href="#" class="bgtransp"><i id="itoaddexp" class='far fa-plus-square'></i></a></p>
                        <div id="divexperiencia" class="mt-2 mr-2 inline-block">
                            <!--    <div id="navAction" class="mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800">
                            <a href="#" class="bgtransp"><i class='far fa-edit'></i></a>
                        </div>-->
                        </div>
                    </li>
                </ul>
            </div>
            <div class="text-gray-800 float-right w-4/5 flex justify-center gradient" style="height: 90vh;">
                <div class="w-3/6  bg-white rounded-md mt-6 block" style="height: 95%;">
                    <h1 class="text-black-800 ml-6 mt-12 mr-12 text-5xl font-extrabold" id="curname"></h1>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curubi"></h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curaddress"></h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curage"></h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curforms"></h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curexps"></h4>

                </div>
            </div>
            <div class="text-gray-800 float-right w-4/5 flex justify-center gradient" style="height: 10vh;">
                <div id="guardar" class="mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow opacity-75 bg-white text-gray-800 h-16">
                    <a href="#">Guardar
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    var formname;
    var formlastname;
    var formmail;
    var formpwd;
    var formaddress;
    var formage;
    var formprovince;
    var formdivexp;
    var formdivform;
    var itoaddexp;
    var itoaddform;

    var provinces;

    var curname;
    var curubi;
    var curaddress;
    var curmail;
    var curage;
    var curforms;
    var curexps;

    var totalForms = 0;
    var totalExps = 0;

    var form;

    var btnGuardar = document.getElementById("guardar");

    document.addEventListener('DOMContentLoaded', function(event) {

        formname = document.getElementById("user");
        formlastname = document.getElementById("lastname");
        formmail = document.getElementById("mail");
        formpwd = document.getElementById("pwd");
        formaddress = document.getElementById("address");
        formage = document.getElementById("edad");
        formprovince = document.getElementById("province");

        formdivexp = document.getElementById("divexperiencia");
        itoaddexp = document.getElementById("itoaddexp");

        formdivform = document.getElementById("divformacion");
        itoaddform = document.getElementById("itoaddform");

        curname = document.getElementById("curname");
        curubi = document.getElementById("curubi");
        curaddress = document.getElementById("curaddress");
        curage = document.getElementById("curage");
        curforms = document.getElementById("curforms");
        curexps = document.getElementById("curexps");

        provinces = formprovince.children;

        form = document.getElementById("formWorker");

        formname.addEventListener("keyup", updateName);
        formname.addEventListener("change", updateName);
        formlastname.addEventListener("keyup", updateName);
        formlastname.addEventListener("change", updateName);
        formaddress.addEventListener("keyup", updateAddress);
        formaddress.addEventListener("change", updateAddress);
        formage.addEventListener("keyup", updateAge);
        formage.addEventListener("change", updateAge);
        formprovince.addEventListener("keyup", updateProvince);
        formprovince.addEventListener("change", updateProvince);
        itoaddexp.addEventListener("click", addExp);
        itoaddform.addEventListener("click", addForm);
        btnGuardar.addEventListener("click", saveWorker);
    });

    function updateName() {
        curname.innerHTML = "";
        curname.append(formname.value + " " + formlastname.value);
    }

    function updateProvince() {
        curubi.innerHTML = "";
        curubi.append(provinces[province.value - 1].innerHTML + ", España");
    }

    function updateAddress() {
        curaddress.innerHTML = "";
        curaddress.append(formaddress.value);
    }

    function updateAge() {
        curage.innerHTML = "";
        curage.append(formage.value);
    }

    function addExp() {
        totalExps++;
        formdivexp.innerHTML += '<div class="gradient mx-auto lg:mx-0 hover:underline font-bold rounded-lg lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 mb-4">' +
            '<input type="text" onkeyup="updateExps()" name="expUbi[]" placeholder="Ubicación" maxlength="30">' +
            '<input type="text" onkeyup="updateExps()" name="expCharge[]" placeholder="Titulo" maxlength="30">' +
            '<input type="number" onkeyup="updateExps()" name="expStart[]" placeholder="Año de inicio" maxlength="30">' +
            '<input type="number" onkeyup="updateExps()" name="expEnd[]" placeholder="Año de final" maxlength="30"><p><a href="#"><i onclick="deleteThisExp(this)" class="far fa-edit"></i></a></p>' +
            '</div>';
    }

    function deleteThisExp(i) {
        totalExps--;
        var thediv = i.parentNode.parentNode.parentNode;
        thediv.parentNode.removeChild(thediv);
        updateExps();
    }

    function addForm() {
        totalForms++;
        console.log(formdivform);
        var newForm = '<div class="gradient mx-auto lg:mx-0 hover:underline font-bold rounded-lg lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 mb-4">' +
            '<input type="text" onkeyup="updateForms()" name="formUbi[]" placeholder="Ubicación" maxlength="30">' +
            '<input type="text" onkeyup="updateForms()" name="formTitle[]" placeholder="Titulo" maxlength="30">' +
            '<input type="number" onkeyup="updateForms()" name="formStart[]" placeholder="Año de inicio" maxlength="30">' +
            '<input type="number" onkeyup="updateForms()" name="formEnd[]" placeholder="Año de final" maxlength="30"><p><a href="#"><i onclick="deleteThisForm(this)" class="far fa-edit"></i></a></p>' +
            '</div>';
        formdivform.innerHTML += newForm;

        // console.log(document.getElementsByName("formUbi[]"));
    }

    function deleteThisForm(i) {
        totalForms--;
        var thediv = i.parentNode.parentNode.parentNode;
        thediv.parentNode.removeChild(thediv);
        updateForms();
    }

    function updateForms() {
        curforms.innerHTML = "";
        var formUbi = document.getElementsByName("formUbi[]");
        var formTitle = document.getElementsByName("formTitle[]");
        var formStart = document.getElementsByName("formStart[]");
        var formEnd = document.getElementsByName("formEnd[]");
        for (var i = 0; i < totalForms; i++) {
            curforms.innerHTML += "Ubi " + formUbi[i].value + " titulo " + formTitle[i].value + " start " + formStart[i].value + " end " + formEnd[i].value + "<br>";
        }
    }

    function updateExps() {
        curexps.innerHTML = "";
        var expUbi = document.getElementsByName("expUbi[]");
        var expCharge = document.getElementsByName("expCharge[]");
        var expStart = document.getElementsByName("expStart[]");
        var expEnd = document.getElementsByName("expEnd[]");
        console.log(totalExps);

        for (var i = 0; i < totalExps; i++) {
            curexps.innerHTML += "Ubi " + expUbi[i].value + " titulo " + expCharge[i].value + " start " + expStart[i].value + " end " + expEnd[i].value + "<br>";
        }
    }

    function saveWorker() {
        if ((totalExps != 0) && (totalForms != 0) && (formname.value != "" && formname.value != null) &&
            (formlastname.value != "" && formlastname.value != null) && (formmail.value != "" || formmail.value != null) &&
            (formpwd.value != "" && formpwd.value != null) && (formaddress.value != "" && formaddress.value != null) &&
            (!isNaN(formage.value)) && (formprovince.value != "" && formprovince.value != null)) {
            console.log(form);
            form.submit();
        }
    }
</script>

</html>