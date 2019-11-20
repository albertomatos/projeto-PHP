<!DOCTYPE html>
<head>
    <title>WEB 1</title>

    <link rel="stylesheet" href="../js/bootstrap/css/bootstrap.css"/>
    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>

    <script>
        $(function () {
            $('#telefone').mask('(99) 9999-9999');
            $('#data_nascimento').mask('9999/99/99');
            $('#cpf').mask('999.999.999-99');
            $('#rg').mask('9.999-999');
            $('#cep').mask('99999-999');
        })
    </script>
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../home/index.php">Web 1 - Eventos</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../tipo_festa/index.php">Tipo Festa</a></li>
                <li><a href="../salao/index.php">Salões</a></li>
                <li><a href="../orcamento/index.php">Orçamentos</a></li>
                <li><a href="../festa/index.php">Festas</a></li>
                <li><a href="../cliente/index.php">Clientes</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="margin-top: 60px;">
