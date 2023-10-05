<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Consultar Datos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style>
            body {
                background-color: #f4f4f4;
                font-family: 'Gabarito', cursive;
            }
            .header {
                background-color: #333;
                color: #fff;
                text-align: center;
                padding: 9px;
            }
            .footer {
                background-color: #333;
                color: #fff;
                text-align: center;
                padding: 10px;
                position: absolute;
                bottom: 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Formulario de Contacto</h1>
        </div>

        <div class="container mt-5">
            <br>
            <h3 class="pt-4">CONSULTA DE DNI</h3>
            <div class="btn-group">
                <input type="text" id="documento" class="form-control"  style="border-radius: 0px; border-color: #333;">
                <button type="button" class="btn btn-dark" id="buscar">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </div>
        <br><br>
        
        <div class="row">
            
            <div class="col mb-3">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno" disabled>
            </div>

            
            
            <div class="col mb-3">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoMaterno" disabled>
            </div>
            
            
            <div class="col mb-3">
                <label class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombre" disabled>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <p>&copy; 2023 BenjaDev. All rights reserved.</p>
    </div>
    </body>

    <script>
        $('#buscar').click(function(){
            dni=$('#documento').val();
            $.ajax({
            url:'consultaDNI.php',
            type:'post',
            data: 'dni='+dni,
            dataType:'json',
            success:function(r){
                if(r.numeroDocumento==dni){
                    $('#apellidoPaterno').val(r.apellidoPaterno);
                    $('#apellidoMaterno').val(r.apellidoMaterno);
                    $('#nombre').val(r.nombres);
                }else{
                    alert(r.error);
                }
                console.log(r)
            }
            });
        });
    </script>
</html>