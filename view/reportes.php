<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pacientes</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
        .col {
            margin-bottom: 5px;
        }

        .grafica1 {
            margin-top: 30px;
            width: 300px;
            margin-left: 25%;
            margin-right: 25%;
        }

        .grafica2 {
            margin-top: 30px;
            width: 620px;
        }

        @media (max-width:820px) {
            .grafica1 {
                width: 300px;
                margin-left: 15%;
                margin-right: 15%;
            }

            .grafica2 {
                width: 400px;
            }
        }
    </style>
</head>



<body>
    <script type="text/javascript" src="public/js/script.js"></script>
    <header>
        <?php
        require_once('template/header.php');
        ?>
    </header>
    <div class="container mb-5">
        <div class="text-primary mt-5">
            <h3 class="h3"><i class="bi bi-journal-medical px-2"></i>Reportes Generales del consultorio</h3>
        </div>
        <hr class="mb-5">
        <div class="container table-pacientes">
            <div class="grid-bienvenida gap-2">
                <div class="gridA border">
                    <div class="bg-primary text-white p-2 fw-bold">
                        <i class="bi bi-person-fill px-2"></i>Informacion de pacientes
                    </div>
                    <div class="mt-3 px-2">
                        <p class="fw-bold">pacientes por sexo:</p>
                        <div class="row">
                            <div class="col"><i class="bi bi-gender-male px-1"></i> Masculinos:</div>
                            <div class="col"><?php echo $DatosreporteM->sexo ?></div>
                        </div>
                        <div class="row">
                            <div class="col"><i class="bi bi-gender-female px-1"></i>Femeninos:</div>
                            <div class="col"><?php echo $DatosreporteF->sexo ?></div>
                        </div>
                        <hr class="mt-5">
                        <p class="mt-5 fw-bold">pacientes por edad:</p>
                        <div class="row">
                            <div class="col">Infantes (0-2):</div>
                            <div class="col"><?php if(isset($DatosreporteE->Edad1)){echo $DatosreporteE->Edad1;}else{ echo "0";} ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Preescolar (3-7):</div>
                            <div class="col"><?php if(isset($DatosreporteE->Edad2)){echo $DatosreporteE->Edad2;}else{ echo "0";}  ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Escolares (8-12):</div>
                            <div class="col"><?php if(isset($DatosreporteE->Edad3)){echo $DatosreporteE->Edad3;}else{ echo "0";} ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Adolecentes (13-18):</div>
                            <div class="col"><?php if(isset($DatosreporteE->Edad4)){echo $DatosreporteE->Edad4;}else{ echo "0";} ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Adulto (19-65):</div>
                            <div class="col"><?php if(isset($DatosreporteE->Edad5)){echo $DatosreporteE->Edad5;}else{ echo "0";}  ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Adultos mayores (66-):</div>
                            <div class="col"><?php if(isset($DatosreporteE->Edad6)){echo $DatosreporteE->Edad6;}else{ echo "0";}  ?></div>
                        </div>
                    </div>
                </div>
                <div class="gridB border">
                    <div class="bg-primary text-white p-2 fw-bold">
                        <i class="bi bi-pie-chart px-2"></i>Grafica de datos
                    </div>
                    <div class="">
                        <div class="grafica1">
                            <canvas id="myChart1"></canvas>
                        </div>
                        <div class="grafica2">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                    <script>
                        const labels = [
                            'Masculinos',
                            'Femeninos'
                        ];

                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Pacientes por genero',
                                data: [<?php echo $DatosreporteM->sexo ?>, <?php echo $DatosreporteF->sexo ?>],
                                backgroundColor: [
                                    'rgb(174, 214, 241)',
                                    'rgb(215, 189, 226)'
                                ],
                            }]
                        };

                        const config1 = {
                            type: 'doughnut',
                            data: data,
                            options: {}
                        };

                        const myChart1 = new Chart(
                            document.getElementById('myChart1'),
                            config1
                        );

                        const labels2 = [
                            'Infantes (0-2)',
                            'Preescolar (3-7)',
                            'Escolares (8-12)',
                            'Adolecentes (13-18)',
                            'Adulto (19-65)',
                            'Adultos mayores (66-)'
                        ];

                        const data2 = {
                            labels: labels2,
                            datasets: [{
                                label: 'Pacientes por Edad',
                                data: [<?php echo $DatosreporteE->Edad1 ?>, <?php echo $DatosreporteE->Edad2 ?>,
                                    <?php echo $DatosreporteE->Edad3 ?>, <?php echo $DatosreporteE->Edad4 ?>,
                                    <?php echo $DatosreporteE->Edad5 ?>, <?php echo $DatosreporteE->Edad6 ?>
                                ],
                                backgroundColor: [
                                    'rgb(91, 44, 111)',
                                    'rgb(241, 196, 15)',
                                    'rgb(82, 190, 128)',
                                    'rgb(52, 73, 94)',
                                    'rgb(203, 67, 53)',
                                    'rgb(26, 82, 118)'
                                ],
                            }]
                        };

                        const config2 = {
                            type: 'bar',
                            data: data2,
                            options: {}
                        };

                        const myChart2 = new Chart(
                            document.getElementById('myChart2'),
                            config2
                        );
                    </script>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php
        require_once('template/footer.php');
        ?>
    </footer>
</body>

</html>