<!-- header.php -->

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciador de Estoque</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f7f6;
        }

        /* NAVBAR */

        nav{
            width: 100%;
            background-color: #223f8d;
            padding: 18px 20px;

            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;

            box-shadow: 0px 3px 8px rgba(0,0,0,0.15);
        }

        .logo{
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .menu{
            width: 100%;

            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu a{
            background-color: rgba(255,255,255,0.12);

            color: white;
            text-decoration: none;

            padding: 12px;
            border-radius: 8px;

            text-align: center;

            transition: 0.3s;
        }

        .menu a:hover{
            background-color: #e62232;
        }

        /* TABLET */

        @media(min-width: 768px){

            nav{
                padding: 18px 40px;
            }

            .menu{
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
            }

            .menu a{
                width: auto;
            }

        }

        /* DESKTOP */

        @media(min-width: 1024px){

            nav{
                flex-direction: row;
                justify-content: space-between;
            }

            .menu{
                width: auto;
            }

        }

    </style>

</head>

<body>

    <nav>

        <div class="logo">
            Etec VAV
        </div>

        <div class="menu">

            <a href="index.php">
                Início
            </a>

            <a href="cadastro.php">
                Novo Registro
            </a>

            <a href="editar.php">
                Editar Registro
            </a>

            <a href="excluir.php">
                Excluir Registro
            </a>

        </div>

    </nav>