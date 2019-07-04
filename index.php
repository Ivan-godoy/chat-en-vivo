<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Chat en Vivo</title>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <h1>Chat Negocios Web</h1>
    </div>
</div>

<div id="padre" class="container-fluid">


</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <input type="text" id="mensaje">
        <button id="enviar" class="btn btn-primary"><span class="icon icon-compass"></span></button>
    </div>
</div>



<script>
    let ws = new WebSocket('ws://192.168.43.101:4000');
    ws.onmessage = function(event){
        var caputara = event.data;
        $('#padre').append('<div class="row justify-content-md-start"><div class="hijos col-md-auto p-1">\n' +
            '        <p id="mensaje-reci">'+ caputara +'</p>\n' +
            '    </div></div>');
    };

    document.getElementById('enviar').addEventListener('click', function (e) {
        e.preventDefault();
        var mensaje = document.getElementById('mensaje').value;
        ws.send(mensaje);
        $('#padre').append('<div class="row justify-content-md-end"><div class="mio col-md-auto p-1">\n' +
            '        <p id="mensaje-envi">'+"Ivan- "+ mensaje +'</p>\n' +
            '    </div></div>');
        document.getElementById('mensaje').value = '';
    });

</script>
<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>