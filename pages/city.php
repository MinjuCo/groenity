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
                    <a class="nav-link rounded-pill" id="pills-explore-tab" data-toggle="pill" href="#pills-explore" role="tab" aria-controls="pills-explore" aria-selected="false">Verkennen</a>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-city" role="tabpanel" aria-labelledby="pills-city-tab">
                <!-- Real-time  -->
                <div class="row" id="viewContainer">
                    <div class="card col-md-8 shadow-sm d-flex">
                        <div class="card-title mt-2 d-flex justify-content-between">
                            <div class="col-6 align-self-center">
                                <h3>Real-time gegevens</h3>
                            </div>
                            <div class="col-m-7 align-self-center">
                                <input type="submit" value="Bekijk milieu-impact" class="btn btn-gresident form-control" id="btnMilieu">
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="col ml-3 card shadow-sm">
                        <div class="card-title mt-2 d-flex mb-0">
                            <h3 class="mb-0">Prestaties</h3>
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
                                        <div class="p-2 d-flex align-items-center mr-2">
                                            <img src="../img/Icons/users.svg" alt="chart icon" style="height:70px;">
                                        </div>
                                        <div class="p-2 ">
                                            <h5>Aantal inwonners</h5>
                                            <h4 class="font-weight-bold">12</h4>
                                            <h5>Active inwonners</h5>
                                            <h4 class="font-weight-bold">12</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="card border border-secondary" style="width: 100%;">
                                    <div class="d-flex justify-content-center">
                                        <div class="p-2">
                                            <img src="../img/Icons/award.svg" alt="chart icon" style="height:70px;">
                                        </div>
                                        <div class=" p-2">
                                            <h5>Voltooide uitdagingen</h5>
                                            <h4 class="font-weight-bold">12</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4" id="viewContainer2">
                    <div class="card col-md-12 mt-4 shadow-sm">
                        <div class="card-title mt-2 d-flex mb-0 mt-1">
                            <h3 class="mb-0 mt-1">Top Gresident-zens</h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row d-flex justify-content-between">

                                        <div class="card p-2" style="width: 16rem;">
                                            <div class="row text-center mt-1 mb-1">
                                                <div class="col-4 align-self-center">
                                                    <img src="../img/avatar.svg" alt="persoon">
                                                </div>
                                                <div class="col-6 align-content-end">
                                                    <div class="row ">
                                                        <p class="mb-0 mt-1 font-weight-bold">Naam Achternaam</p>
                                                        <p class="mb-0 mt-1" style="color:#389583;">Status</p>
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <a href=""><img src="../img/Icons/x.svg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card p-2 " style="width: 16rem;">
                                            <div class="row text-center mt-1 mb-1">
                                                <div class="col-4 align-self-center">
                                                    <img src="../img/avatar.svg" alt="persoon">
                                                </div>
                                                <div class="col-6 align-content-end">
                                                    <div class="row ">
                                                        <p class="mb-0 mt-1 font-weight-bold">Naam Achternaam</p>
                                                        <p class="mb-0 mt-1" style="color:#389583;">Status</p>
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <a href=""><img src="../img/Icons/x.svg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card p-2" style="width: 16rem;">
                                            <div class="row text-center mt-1 mb-1">
                                                <div class="col-4 align-self-center">
                                                    <img src="../img/avatar.svg" alt="persoon">
                                                </div>
                                                <div class="col-6 align-content-end">
                                                    <div class="row ">
                                                        <p class="mb-0 mt-1 font-weight-bold">Naam Achternaam</p>
                                                        <p class="mb-0 mt-1" style="color:#389583;">Status</p>
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <a href=""><img src="../img/Icons/x.svg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="background-color: red;">
                                        6+
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
                <div id="milieu">
                    <?php include_once('../includes/cityMilieuImpact.inc.php'); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">
                <div class="row">
                    <div class="card col-md-10 shadow-sm d-flex mb-5">
                        <div class="card-title mt-2 d-flex justify-content-between">
                            <div class="col-6 align-self-center">
                                <h3>Kies een gemeente</h3>
                            </div>
                            <div class="col-m-7">
                                <form action="post" class="form-inline">
                                    <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="Bv 2800 of Mechelen ">
                                    <input type="submit" value="Zoeken" class="btn btn-gresident form-control ">
                                </form>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <!-- searching -->
                            <div class="card-body d-flex justify-content-center">
                                <?php
                                //MAP
                                include_once(__DIR__ . "/../includes/live-map.inc.php");
                                ?>
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
        // switch
        document.querySelector("#btnMilieu").addEventListener("click", function() {
            console.log("clicked");
            changeView();
        });

        document.querySelector("#btnRealTime").addEventListener("click", function() {
            console.log("clicked");
            changeView();
        });

        function changeView() {
            let realTime = document.getElementById("viewContainer");
            let realTime2 = document.getElementById("viewContainer2");
            let milieu = document.getElementById("viewContainerMilieu");

            realTime.classList.toggle("hidden");
            realTime2.classList.toggle("hidden");
            milieu.classList.toggle("hidden");
        }
        //chart
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