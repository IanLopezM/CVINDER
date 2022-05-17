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
        <form method="POST" action="{{route('worker.edit')}}" id="formWorker">
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
                    <p class="text-gray-800 font-bold text-xl mb-2 px-2"><a href="{{route('worker.index', ['worker'=>$worker])}}" class="bgtransp">Ves a deslizar<i class="fa fa-eye"></i></a></p>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Nombre</p>
                        <input type="text" id="user" name="user" placeholder="{{$worker->name}}" value="{{$worker->name}}" maxlength="15">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Apellido</p>
                        <input type="text" id="lastname" name="lastname" placeholder="{{$worker->surname}}" value="{{$worker->surname}}" maxlength="30">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Mail</p>
                        <input type="text" id="mail" name="mail" placeholder="{{$worker->mail}}" value="{{$worker->mail}}" maxlength="30" readonly>
                        <input type="hidden" id="workerid" name="workerid" placeholder="{{$worker->id}}" value="{{$worker->id}}" maxlength="30" readonly>
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Direccion</p>
                        <input type="text" id="address" name="address" placeholder="{{$worker->address}}" maxlength="30">
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Edad</p>
                        <input type="text" id="edad" name="edad" placeholder="{{$worker->age}}" maxlength="30">
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
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Skills</p>
                        <select name="skill" id="skill">
                            @foreach ($skills as $skill)
                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @endforeach
                        </select>
                        <div class="mt-2 mr-2 inline-block" id="containerSkills">
                            @foreach ($myskills as $workerskill)
                            <div id="skill{{$skills[$workerskill->skill_id - 1]->id}}" onclick="deleteSkill(this)" class="mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 inline-block">
                                <a href="#" class="bgtransp">{{$skills[$workerskill->skill_id - 1]->name}}<i class="far fa-edit"></i>
                                </a><input name="myskills[]" type="hidden" value="{{$skills[$workerskill->skill_id - 1]->id}}"></input>
                            </div>
                            @endforeach
                        </div>
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Formación <a href="#" class="bgtransp"><i id="itoaddform" class='far fa-plus-square'></i></a></p>
                        <div id="divformacion" class="mt-2 mr-2 inline-block">
                            @foreach($formations as $formation)
                            <div class="gradient mx-auto lg:mx-0 hover:underline font-bold rounded-lg lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 mb-4">
                                <input type="text" onkeyup="updateForms()" name="formUbi[]" placeholder="{{$formation->location}}" value="{{$formation->location}}" maxlength="30">
                                <input type="text" onkeyup="updateForms()" name="formTitle[]" placeholder="{{$formation->title}}" value="{{$formation->title}}" maxlength="30">
                                <input type="number" onkeyup="updateForms()" name="formStart[]" placeholder="{{$formation->yearStart}}" value="{{$formation->yearStart}}" maxlength="30">
                                <input type="number" onkeyup="updateForms()" name="formEnd[]" placeholder="{{$formation->yearEnd}}" value="{{$formation->yearEnd}}" maxlength="30">
                                <p><a href="#"><i onclick="deleteThisForm(this)" class="far fa-edit"></i></a></p>
                            </div>
                            @endforeach
                        </div>
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="relative px-2">
                        <p class="text-gray-800 font-bold text-xl mb-2 px-2">Experiencia <a href="#" class="bgtransp"><i id="itoaddexp" class='far fa-plus-square'></i></a></p>
                        <div id="divexperiencia" class="mt-2 mr-2 inline-block">
                            @foreach($experiences as $experience)
                            <div class="gradient mx-auto lg:mx-0 hover:underline font-bold rounded-lg lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 mb-4">
                                <input type="text" onkeyup="updateExps()" name="expUbi[]" placeholder="{{$experience->location}}" value="{{$experience->location}}" maxlength="30">
                                <input type="text" onkeyup="updateExps()" name="expCharge[]" placeholder="{{$experience->charge}}" value="{{$experience->charge}}" maxlength="30">
                                <input type="number" onkeyup="updateExps()" name="expStart[]" placeholder="{{$experience->yearStart}}" value="{{$experience->yearStart}}" maxlength="30">
                                <input type="number" onkeyup="updateExps()" name="expEnd[]" placeholder="{{$experience->yearEnd}}" value="{{$experience->yearEnd}}" maxlength="30">
                                <p><a href="#"><i onclick="deleteThisExp(this)" class="far fa-edit"></i></a></p>
                            </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="text-gray-800 float-right w-4/5 flex justify-center gradient" style="height: 90vh;">
                <div class="w-3/6  bg-white rounded-md mt-6 block" style="height: 95%;">
                    <h1 class="text-black-800 ml-6 mt-12 mr-12 text-5xl font-extrabold" id="curname">{{$worker->name}} {{$worker->surname}}</h1>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curubi">{{$provinces[$prov->id - 1]->name}}, España</h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curaddress">{{$worker->address}}</h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curage">{{$worker->age}}</h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curforms">
                        @foreach($formations as $formatio)
                        <p>Ubi {{$formatio->location}} titulo {{$formatio->title}} start {{$formatio->yearStart}} end {{$formatio->yearEnd}}</p><br>
                        @endforeach
                    </h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curexps">
                        @foreach($experiences as $experienc)
                        <p>Ubi {{$experienc->location}} titulo {{$experienc->charge}} start {{$experienc->yearStart}} end {{$experienc->yearEnd}}</p><br>
                        @endforeach
                    </h4>
                    <h4 class="text-gray-500 ml-6 mt-2 mr-12 text-lg font-extrabold" id="curskills">
                        Skills:
                        @foreach ($myskills as $myskill)
                        <div class="skill{{$skills[$myskill->skill_id-1]->id}} mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 inline-block ml-2 mr-2 mb-2s">
                            <a href="#" class="bgtransp">{{$skills[$myskill->skill_id - 1]->name}}</a>
                        </div>
                        @endforeach
                    </h4>
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

    var totalForms;
    var totalExps;

    var form;

    var totalSkills;
    var firstSkill = 0;
    var skillselector;
    var curSkills;
    var containerSkills;

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
        totalExps = formdivexp.children.length;

        skillselector = document.getElementById("skill");
        curSkills = document.getElementById("curskills");
        containerSkills = document.getElementById("containerSkills");

        formdivform = document.getElementById("divformacion");
        itoaddform = document.getElementById("itoaddform");
        totalForms = formdivexp.children.length;

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
        totalSkills = containerSkills.children.length;
        skillselector.addEventListener("change", addSkill);
        btnGuardar.addEventListener("click", saveWorker);
    });

    function addSkill() {
        if (firstSkill == 0) {
            firstSkill = 1;
        }
        console.log(containerSkills.children)
        // console.log(skillselector[skillselector.value-1].value)
        // console.log(skillselector[skillselector.value-1].innerHTML)
        if (totalSkills < 6) {
            if (document.getElementById("skill" + skillselector[skillselector.value - 1].value) == null) {
                totalSkills++;
                containerSkills.innerHTML += '<div id="skill' + skillselector[skillselector.value - 1].value + '" onclick="deleteSkill(this)" class="mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 inline-block">' +
                    '<a href="#" class="bgtransp">' + skillselector[skillselector.value - 1].innerHTML + '<i class="far fa-edit"></i>' +
                    '</a><input name="myskills[]" type="hidden" value="' + skillselector[skillselector.value - 1].value + '"></input></div>';

                curSkills.innerHTML += '<div class="skill' + skillselector[skillselector.value - 1].value + ' mx-auto lg:mx-0 hover:underline font-bold rounded-full lg:mt-0 py-4 px-8 shadow bg-gray-50 text-gray-800 inline-block ml-2 mr-2 mb-2s">' +
                    '<a href="#" class="bgtransp">' + skillselector[skillselector.value - 1].innerHTML +
                    '</a></div>';
            }
        }
    }

    function deleteSkill(element) {
        console.log(element);
        totalSkills--;

        var elemid = element.id;
        var elem = document.getElementsByClassName(elemid)[0];

        console.log(elemid)
        console.log(elem);
        element.parentNode.removeChild(element);
        elem.parentNode.removeChild(elem);
    }

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
            curforms.innerHTML += "<p>Ubi " + formUbi[i].value + " titulo " + formTitle[i].value + " start " + formStart[i].value + " end " + formEnd[i].value + "</p><br>";
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
            curexps.innerHTML += "<p>Ubi " + expUbi[i].value + " titulo " + expCharge[i].value + " start " + expStart[i].value + " end " + expEnd[i].value + "</p><br>";
        }
    }

    function saveWorker() {
        if ((totalExps != 0) && (totalForms != 0) && (!isNaN(formage.value)) && (formprovince.value != "" && formprovince.value != null)) {
            console.log(form);
            form.submit();
        }
    }
</script>

</html>