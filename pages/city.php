<?php
$pageTitle = "Stad";
$_SESSION['user'] = "Test";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>

<body>
    <?php
    //Navbar
    include_once(__DIR__ . "/../includes/nav.inc.php");
    ?>

    <div class="container application">
        <div class="row d-flex flex-column">
            <h2 class="mb-2">Stad</h2>
            <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active rounded-pill" id="pills-city-tab" data-toggle="pill" href="#pills-city" role="tab" aria-controls="pills-city" aria-selected="true">Mijn stad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-explore-tab" data-toggle="pill" href="#pills-explore" role="tab" aria-controls="pills-explore" aria-selected="false">Verkennen</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="tab-content col-md-7 card shadow-sm" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-city" role="tabpanel" aria-labelledby="pills-city-tab">
                    <div class="card-title mt-2 d-flex  justify-content-between">
                        <div class="col-5  align-self-center">
                            <h3>Real-time gegevens</h3>
                        </div>
                        <div class="col-m-7 align-self-center">
                            <input type="submit" value="Bekijk milieu-impact" class="btn form-control ">
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">

                </div>
            </div>
            <div class="col-md-4 ml-2 card shadow-sm">
                <div class="card-title mt-2 d-flex ">
                    <h3>Prestaties</h3>
                </div>
                <div class="card-body text-center">
                    <div class="row d-flex justify-content-between ">
                        <div class="card d-flex p-3 border border-secondary">
                            <img src="../img/g_coins.svg" alt="green points" style="height: 70px;">
                            <h5>Groene punten</h5>
                            <h4 class="font-weight-bold">2000</h4>
                        </div>
                        <div class="card d-flex p-3 border border-secondary">
                            <img src="../img/Icons/trending-up.svg" alt="" style="height: 70px;">
                            <h5>Verbetering</h5>
                            <h4 class="font-weight-bold">200 000</h4>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="card border border-secondary" style="width: 100%;">
                            <div class="d-flex justify-content-center">
                                <div class="p-2">
                                    <img src="../img/Icons/bar-chart-2.svg" alt="chart icon" style="height:70px;">
                                </div>
                                <div class=" p-2">
                                    <h5>Leaderboard</h5>
                                    <h4 class="font-weight-bold">12</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    //Footer + scripts
    include_once(__DIR__ . "/../includes/footer.inc.php");
    ?>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maarts', 'April', 'Mei', 'Juni'],
                datasets: [{
                    label: 'electriciteit',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>