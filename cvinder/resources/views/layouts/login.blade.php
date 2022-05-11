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
    body {
      height: 100vh;
    }

    .gradient {
      background: linear-gradient(90deg, rgba(51, 213, 162, 1) 0%, rgba(81, 134, 218, 1) 100%);
    }

    h2 {
      background: linear-gradient(90deg, rgba(51, 213, 162, 1) 0%, rgba(81, 134, 218, 1) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .wrapper {
      display: flex;
      align-items: center;
      flex-direction: row;
      justify-content: center;
      width: 100%;
      min-height: 100%;
      padding: 20px;
    }

    .formContent {
      -webkit-border-radius: 10px 10px 10px 10px;
      border-radius: 10px 10px 10px 10px;
      background: #fff;
      padding: 30px;
      width: 90%;
      max-width: 450px;
      position: relative;
      padding: 0px;
      -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
      box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    input[type=button],
    input[type=submit],
    input[type=reset],
    #iniciaEmpresa,
    #iniciaWorker {
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
    input[type=reset]:hover,
    #iniciaEmpresa:hover,
    #iniciaWorker:hover {
      background-color: rgba(51, 213, 162, 1);
    }

    input[type=button]:active,
    input[type=submit]:active,
    input[type=reset]:active,
    #iniciaEmpresa:active,
    #iniciaWorker:active {
      -moz-transform: scale(0.95);
      -webkit-transform: scale(0.95);
      -o-transform: scale(0.95);
      -ms-transform: scale(0.95);
      transform: scale(0.95);
    }

    input[type=text],
    input[type=password] {
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
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #fff;
      border-bottom: 2px solid #5fbae9;
    }

    input[type=text]:placeholder,
    input[type=password]:placeholder {
      color: #cccccc;
    }
  </style>
</head>

<body class="gradient">
  <div class="wrapper fadeInDown">
    <div class="formContent mr-4">
      <!-- Login Form -->
      <h2 class="my-4 text-5xl font-bold leading-tight">Empresa</h2>
      <form method="POST" action="{{route('enterprise.check')}}" id="formEnterprise">
        @csrf
        <input type="text" id="enterprise" class="fadeIn second" name="enterprise" placeholder="Empresa">
        <input type="password" id="enterprisepwd" class="fadeIn third" name="enterprisepwd" placeholder="Contraseña">
      </form>
      <button id="iniciaEmpresa" class="gradient">
        <a href="#">Inicia Sesión
        </a>
      </button>

    </div>
    <div class="formContent ml-4">
      <!-- Login Form -->
      <h2 class="my-4 text-5xl font-bold leading-tight">Trabajador</h2>
      <form method="POST" action="{{route('worker.check')}}" id="formWorker">
        @csrf
        <input type="text" id="worker" class="fadeIn second" name="worker" placeholder="Trabajador">
        <input type="password" id="workerpwd" class="fadeIn third" name="workerpwd" placeholder="Contraseña">
      </form>
      <button id="iniciaWorker" class="gradient">
        <a href="#">Inicia Sesión
        </a>
      </button>
    </div>
  </div>
</body>
<script>
  var enterprise, enterprisepwd, worker, workerpwd;
  var formEnterprise, formWorker;

  document.addEventListener('DOMContentLoaded', function(event) {
    var btnIniciarEmpresa = document.getElementById("iniciaEmpresa");
    var btnIniciarWorker = document.getElementById("iniciaWorker");
    enterprise = document.getElementById("enterprise");
    enterprisepwd = document.getElementById("enterprisepwd");
    worker = document.getElementById("worker");
    workerpwd = document.getElementById("workerpwd");
    formEnterprise = document.getElementById("formEnterprise");
    formWorker = document.getElementById("formWorker");
    btnIniciarEmpresa.addEventListener("click", checkEnterprise);
    btnIniciarWorker.addEventListener("click", checkWorker);
  });

  function checkEnterprise() {
    if (enterprise.value != null && enterprisepwd != null) {
      formEnterprise.submit();
    }
  }

  function checkWorker() {
    if (worker.value != null && workerpwd != null) {
      formWorker.submit();
    }
  }
</script>

</html>