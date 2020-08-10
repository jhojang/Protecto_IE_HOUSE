<?php

session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: ../sesion/sesion.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet" text="text/css" >
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <link href="../css/login.css?v=<?php echo time(); ?>" rel="stylesheet" text="text/css" >
    <title>Login</title>
</head>
<body>
    <div class="modal_container modal_container_none">
        <div class="modal">
            <h2>Iniciando sesión</h2>
            <img src="../image/loader.gif"> 
        </div>
    </div>
    <div class="contenedor">
        <div class="child-cont izquierda-cont">
            <div class="central central_izquierdo">
                <div class="svg_login">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 631.8 629.93"><defs><style>.cls-1{fill:#253aa0;}.cls-2{fill:#bfbfbf;}.cls-3{fill:#3a4ed8;}.cls-4{fill:#3fd600;}.cls-5{fill:#249300;}.cls-6{fill:#2abf00;}.cls-7{fill:#2eaa00;}.cls-8{fill:#0acc66;}.cls-9{fill:#39cc09;}.cls-10,.cls-22{fill:#fff;}.cls-11{fill:#2eafff;}.cls-12{fill:#fafbfc;}.cls-13{fill:#e2e2e2;}.cls-14{fill:#e200cd;}.cls-15{fill:#606060;}.cls-16{fill:#0013a0;}.cls-17{fill:#ff0;}.cls-18{fill:#ffd400;}.cls-19{fill:#d89000;}.cls-20{fill:#e20000;}.cls-21{fill:#515151;}.cls-22{font-size:21px;font-family:MyriadPro-Regular, Myriad Pro;}.cls-23{letter-spacing:0em;}.cls-24{fill:#f2c070;}.cls-25{fill:#774f00;}.cls-26{fill:#3d009e;}.cls-27{fill:#7c00ff;}.cls-28{fill:#dabae2;}.cls-29{fill:#a56a02;}.cls-30{fill:#1f02c4;}.cls-31{fill:#ff4800;}</style></defs><title>imagen_login</title><g id="Capa_13" data-name="Capa 13"><ellipse class="cls-1" cx="283.83" cy="621.43" rx="189.5" ry="6"/></g><g id="Capa_6" data-name="Capa 6"><path class="cls-2" d="M994.5,248l-12.29,62.08-90.91-7.26,53.2,68-46.07,37L839.49,344.5l-5.61,85.95L806,432.5l-38.06-6.27L773,344l-52.5,69.92-45-33.3,49.15-67.83-87.4,21.61-15.5-53.2L716.5,253l-97.61-31L635,165.58l87.85,21.5L678,106.62l54.63-35.31,57.51,72.41s19.25-87.2,20.94-87.15c23,.61,65.29,13.5,65.29,13.5l-8.6,90.26,77.73-42.1L977,165.54l-77,64.14Z" transform="translate(-379.67 -56.57)"/><circle class="cls-2" cx="425.83" cy="189.93" r="140"/><path class="cls-2" d="M575.47,103.9l15.66,33.47-44.75,27.39,48.13,14.05-8.68,33.08L536.65,202l27,42.48-12.25,10.42-19.85,9.94-26-40.53-.32,50.81-32.38-.47L472.36,226l-33.19,39.83L413.65,246,448,200.51l-56,18.45L380,186.87l48.24-19.64-48.56-22.78,13.24-35.19L444.57,124s-21.08-47.69-20.28-48.24c10.92-7.53,35-15.76,35-15.76l27.08,45.52L508,59.24l30.93,11.67L525.21,127.3Z" transform="translate(-379.67 -56.57)"/><ellipse class="cls-2" cx="487.1" cy="167.26" rx="80.54" ry="81.81" transform="translate(-384.68 262.61) rotate(-36.11)"/><circle class="cls-3" cx="426.58" cy="188.18" r="87.75"/><circle class="cls-1" cx="105.83" cy="110.93" r="49.5"/></g><g id="Capa_10" data-name="Capa 10"><polygon class="cls-4" points="443.33 587.43 466.33 498.43 482.33 450.43 482.33 414.43 477.33 372.43 466.33 400.43 438.33 433.43 396.33 472.43 374.13 546.23 372.05 579.45 394.33 593.43 443.33 587.43"/><path class="cls-5" d="M801.5,656.5a184.67,184.67,0,0,0,65.34-30.32c12.1-8.71,23.73-18.29,33.57-29.54,9.09-10.41,15.11-22.38,22.09-34.14,8.61-14.5,14.81-30.83,25.08-44.3,3.61-4.73,8.38-8.45,12.8-12.45,2.26-2.05,7.9-5.4,9.12-8.25-16.35,0-33.69-1.89-49.53,2.53-27.27,7.63-54.59,17.55-76.52,35.48-7.22,5.91-30.5,27-37.27,39.27C789,606,788.51,635.69,781.5,650.5Z" transform="translate(-379.67 -56.57)"/><path class="cls-6" d="M807.4,661.89c16.23,4,32.3,9.3,49.27,6.13,11-2.06,21.09-7.41,30.88-12.86q22.71-12.63,44.67-26.55c14.16-9,29-17.89,45.27-22.48,11-3.1,22.73-4,34-5.63-3.71.55-10.9-3.12-14.51-4.15-6.52-1.87-13.05-4.09-19.66-5.62-27.13-6.29-57.36-7.88-84.78-2.73a153.14,153.14,0,0,0-55.32,22.37c-15.7,10.27-27.82,23.72-40.71,37.13v12C800.15,660.16,803.78,661,807.4,661.89Z" transform="translate(-379.67 -56.57)"/><path class="cls-7" d="M533.5,595.5c-6.88-15.78-13-31.74-22-46.38-18.35-29.76-40-56.35-64-81.6l0,0c17.76,8.67,37.37,15.57,51.76,29.34,18.27,17.48,35.22,36,52.24,54.66Z" transform="translate(-379.67 -56.57)"/><path class="cls-8" d="M502.5,617.5c-8.76-14.18-16.72-28.77-27.78-41.27a232,232,0,0,0-54.15-45.05c-4.66-2.8-9.67-5-14.55-7.42-2.18-1.09-6-4.11-8.52-4.26,18.87,1.18,38.52.24,56.49,6.47,21.36,7.39,42.36,16.41,61.24,29,15.21,10.11,28,6.15,41.27,18.57l25.26,41L587,654.69,567.5,663.5l-11-22Z" transform="translate(-379.67 -56.57)"/><path class="cls-9" d="M524.5,664.5c-9.27-10-17.8-21.08-29-29-31.21-22.17-65.79-34.74-102-46,11.57-1.88,23.27-4.56,34.93-5.66,11.51-1.09,24.55,1.81,35.83,4A247.86,247.86,0,0,1,524,607.64a68.52,68.52,0,0,1,8,4.31c9,5.86,16.27,14.89,23.92,22.34l10.23,10c.6.59,4.36,3.36,4.36,4.25v16Z" transform="translate(-379.67 -56.57)"/></g><g id="Capa_2" data-name="Capa 2"><rect class="cls-10" x="155.83" y="187.93" width="281" height="363"/></g><g id="Capa_3" data-name="Capa 3"><circle class="cls-11" cx="298.33" cy="283.43" r="61.5"/><path class="cls-12" d="M723,366.5S711,392,677.5,392C645,392,633,366.5,633,366.5S654,348,677.5,348,723,366.5,723,366.5Z" transform="translate(-379.67 -56.57)"/><circle class="cls-12" cx="298.33" cy="261.43" r="23"/></g><g id="Capa_4" data-name="Capa 4"><rect class="cls-13" x="200.83" y="368.93" width="195" height="34"/><rect class="cls-13" x="200.83" y="418.93" width="195" height="34"/><rect class="cls-14" x="250.83" y="474.93" width="98" height="33"/><ellipse class="cls-15" cx="221.33" cy="436.93" rx="6" ry="6.5"/><ellipse class="cls-15" cx="238.33" cy="436.93" rx="6" ry="6.5"/><ellipse class="cls-15" cx="255.33" cy="436.93" rx="6" ry="6.5"/><ellipse class="cls-15" cx="272.33" cy="436.93" rx="6" ry="6.5"/><ellipse class="cls-15" cx="289.33" cy="436.93" rx="6" ry="6.5"/></g><g id="Capa_7" data-name="Capa 7"><path class="cls-16" d="M823.5,196.5h83v16h17s0,58-9,73-50,40-50,40-44-28-51-43-7-69-7-69h17Z" transform="translate(-379.67 -56.57)"/><path class="cls-17" d="M829.23,202h71.58v16.51H917s0,50.61-8.08,64.21S865.05,319,865.05,319s-39.49-25.4-45.77-39S813,219.42,813,219.42h16.23Z" transform="translate(-379.67 -56.57)"/><polygon class="cls-16" points="453.83 199.93 475.83 233.93 523.83 179.93 476.83 212.93 453.83 199.93"/></g><g id="Capa_8" data-name="Capa 8"><circle class="cls-18" cx="334.83" cy="138.93" r="33"/><rect class="cls-18" x="609.5" y="225.5" width="95" height="13" transform="translate(-401.25 333.57) rotate(-32.57)"/><rect class="cls-18" x="620.61" y="249.87" width="11.64" height="23" transform="translate(-421.86 321.73) rotate(-32.57)"/><rect class="cls-18" x="636.61" y="239.87" width="11.64" height="23" transform="translate(-413.97 328.77) rotate(-32.57)"/><ellipse class="cls-19" cx="720" cy="193" rx="4.5" ry="10.5" transform="translate(-370.35 361.35) rotate(-32.57)"/></g><g id="Capa_9" data-name="Capa 9"><path class="cls-20" d="M574.5,325.5h-166a12,12,0,0,1-12-12v-38a12,12,0,0,1,12-12h170a12,12,0,0,1,12,12v38c0,3.42.24,29.71.24,29.71Z" transform="translate(-379.67 -56.57)"/><rect class="cls-21" x="194.83" y="513.93" width="36" height="41" rx="12" ry="12"/><rect class="cls-10" x="200.83" y="519.93" width="24" height="41" rx="12" ry="12"/><rect class="cls-20" x="182.83" y="540.93" width="60" height="39"/><circle cx="212.83" cy="563.93" r="4"/><ellipse cx="212.83" cy="558.43" rx="2" ry="3.5"/><text class="cls-22" transform="translate(34.99 238.43)">&gt;&gt;&gt;VERIFI<tspan class="cls-23" x="91.16" y="0">C</tspan><tspan x="103.42" y="0">ANDO</tspan></text><rect class="cls-10" x="35.33" y="248.43" width="157" height="3"/></g><g id="Capa_11" data-name="Capa 11"><polygon class="cls-24" points="441.83 309.93 435.83 342.93 446.83 344.93 446.83 353.93 452.83 360.93 456.83 363.93 465.83 352.93 467.83 338.93 469.83 312.93 449.83 300.93 441.83 309.93"/><polygon points="441.83 309.93 440.83 305.93 438.83 291.93 478.83 298.93 474.59 324.12 467.83 347.93 457.83 346.93 453.83 333.93 457.83 334.93 460.83 328.93 461.83 318.93 458.83 316.93 453.83 323.93 451.83 329.93 450.83 313.93 441.83 309.93"/><polygon class="cls-25" points="439.83 604.93 439.83 612.93 438.83 619.93 431.83 621.93 422.83 619.93 408.83 616.93 405.83 611.93 406.83 607.93 409.83 605.93 420.83 605.93 423.83 604.93 430.83 604.93 439.83 604.93"/><polygon class="cls-25" points="458.83 599.93 453.83 600.93 448.83 600.93 444.83 600.93 442.83 603.93 442.83 607.93 447.83 611.93 451.83 612.93 455.83 613.93 457.83 614.93 462.83 615.93 466.83 615.93 468.83 614.93 468.83 606.93 466.83 599.93 458.83 599.93"/><polygon class="cls-26" points="476.83 459.93 477.83 490.93 475.83 520.93 472.83 545.93 472.83 551.93 473.83 572.93 471.83 588.93 468.83 604.93 462.83 604.93 455.83 603.93 454.83 571.93 453.83 551.93 451.83 523.93 445.83 547.93 445.83 552.93 445.83 575.93 440.83 607.93 431.83 608.93 424.83 606.93 423.83 578.93 425.83 552.93 425.83 546.93 423.83 509.93 423.83 469.93 452.83 462.93 460.83 442.93 470.83 459.93 476.83 459.93"/><polygon class="cls-24" points="374.83 428.93 368.83 431.93 355.83 431.93 347.83 433.93 340.83 437.93 340.83 439.93 342.83 439.93 347.83 437.93 353.83 437.93 352.83 442.93 354.83 444.93 360.83 444.93 364.68 444.22 365.84 442.79 373.33 441.43 379.83 440.93 378.83 434.93 374.83 428.93"/><polygon class="cls-27" points="425.83 361.93 443.83 355.93 447.83 350.93 466.34 349.36 467.83 353.93 489.83 361.93 503.83 389.93 512.83 414.93 495.83 433.93 478.83 449.93 484.83 464.93 475.83 467.93 463.83 469.93 460.83 452.93 456.83 470.93 438.83 474.93 415.83 471.93 426.83 438.93 427.83 405.93 415.83 425.93 399.83 432.93 377.83 443.93 373.83 435.93 371.83 427.93 392.83 414.93 405.83 406.93 425.83 361.93"/><polygon class="cls-28" points="481.83 389.93 485.83 399.93 491.83 413.93 476.83 428.93 476.83 411.93 481.83 389.93"/><polygon class="cls-29" points="126.83 611.93 123.83 619.93 122.83 627.93 127.83 628.93 132.83 628.93 132.83 625.93 135.83 628.93 144.83 629.93 147.83 629.93 149.83 627.93 148.83 624.93 140.83 620.93 133.83 613.93 126.83 611.93"/><polygon class="cls-29" points="99.83 606.93 97.83 612.93 96.83 623.93 99.83 623.93 103.83 622.93 104.83 619.93 108.83 621.93 113.83 621.93 118.83 620.93 120.83 618.93 119.83 616.93 111.83 613.93 105.83 605.93 99.83 606.93"/><polygon class="cls-24" points="98.83 597.93 98.83 609.93 101.83 609.93 106.83 607.93 108.83 593.93 98.83 597.93"/><polygon class="cls-24" points="125.83 601.93 125.83 614.93 128.83 615.93 133.83 613.93 136.83 598.93 125.83 601.93"/><polygon class="cls-30" points="151.83 465.93 153.83 487.93 152.83 520.93 149.83 548.93 148.83 554.93 137.83 604.93 131.83 605.93 123.83 605.93 124.83 575.93 126.83 553.93 126.83 548.93 122.83 519.93 120.83 541.93 120.83 548.93 119.83 557.93 110.83 599.93 104.83 600.93 96.83 600.93 96.83 580.93 96.83 570.93 99.83 550.93 99.83 544.93 94.83 505.93 93.56 474.66 95.83 469.93 114.83 457.93 151.83 465.93"/><polygon class="cls-24" points="203.83 390.93 210.83 386.93 218.83 378.93 223.83 374.93 228.83 372.93 230.83 372.93 230.83 373.93 229.83 374.93 225.83 376.93 222.83 379.93 226.83 378.93 227.83 380.93 224.69 382.91 227.58 382.65 227.38 385.1 225.26 385.91 227.15 386.43 226.83 387.93 224.83 389.93 213.83 393.93 206.83 399.93 203.83 390.93"/><polygon class="cls-10" points="198.83 391.93 204.83 388.93 206.83 392.93 208.83 399.93 202.83 403.93 198.83 391.93"/><path class="cls-31" d="M508.5,425.5c7.22.94,11.45.9,18.67,1.81a30.18,30.18,0,0,1,4.38,1.4c.27.2,2.48,2.48,2.67,2.76,1.78,2.51,19.18,29.08,19.28,29l14-7,13-7.5c.53,1.49,5.62,13.31,4,14.5-6.76,4.95-13,10-20.47,13.88-1.06.55-13.16,7.54-13.53,7.12l-13-15-4-5-5,14c-.89,5.32-2.79,11.31-2.67,16.67A13,13,0,0,0,526,494c.48,2.86,13.15,32.11,12.49,32.46-6.43,3.42-13,7.63-20.12,9.79-5.82,1.76-12,2.8-17.88,4.21l-7-20-4,19c-.16.76-16.37-7.09-18-8l6-22c.24-.88-3.51-5.05-4-5.81-1.58-2.35-4.14-4.84-4.88-7.59a10.57,10.57,0,0,1-.28-2c-.87-11.34-2.11-22.72-1.61-34.11.2-4.55.35-8.11.51-12.66.07-2,1-9.23,2.55-10.86.29-.31,3.67-2.52,4-2.72,7.26-4,9.46-4.15,16.69-8.23Z" transform="translate(-379.67 -56.57)"/><path d="M525.28,370.59a10.92,10.92,0,0,0-2.48-3.69c-2.1-2-5-2.94-7.87-3.77s-5.74-1.66-8.68-1.44a16.81,16.81,0,0,0-4.14.89A26,26,0,0,0,486,378.73c-1.36,4.09-1,8.79-2.52,12.77l-4,11-3,7-5,13,5-6c-.95,1.14-1.23,4-1.66,5.4a147.78,147.78,0,0,0-4.34,19.6l4-6c-1,1.52.39,7.83.53,9.67.74,10.24-1.15,20.22-2.53,30.33l6-9,4-11v21l-2,22c4.6-7.88,10.17-15.27,13.72-23.73a120.23,120.23,0,0,0,3.89-12.3c.69-2.3,2.39-5.55,2.39-8v5l-1,8,7.92-12.18c4.68-7.21,7.45-14.52,10.14-22.72,1.56-4.78,3.15-9.65,3.26-14.68.14-5.81-.76-10.85.83-16.55,1-3.59,2-7.24,2.85-10.87C525.48,384.63,527.76,376.57,525.28,370.59Z" transform="translate(-379.67 -56.57)"/></g></svg>
                </div>
                <!--<p class="titulo">Hello World.</p>-->
            </div>
        </div>
        <div class="child-cont derecha-cont">
            <div class="central">
                <h1>Login</h1>
                <form action="" method="POST" name="login">
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario o Email" value="">
                    <div class="error"></div>
                    <input type="password"name="pass" id="pass" placeholder="Contraseña">
                    <div class="error"></div>
                    <input type="submit" value="Entrar" class="btn_enviar" >
                </form>
                <p class="anuncio">¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
                <p class="anuncio"><a href="recuperar.php">¿Olvidaste la contraseña?</a></p>
            </div>
        </div>
    </div>

    <script src="../js/login.js?v=<?php echo(rand()); ?>" type="text/javascript"></script>
</body>
</html>