<?php 
    include_once(__DIR__."/functions/appFunctions.php");
    session_start();
    $pageTitle = "Stad";

    /* FONT-END + CHART + JS door MARLENA */

    if(isset($_GET['content'])){
        $content = checkContent(htmlspecialchars($_GET['content']), "city");
    }else{
        $content = "realtime";
    }

    try{
        include_once(__DIR__."/includes/userInfo.inc.php");
        $zip = $userCityInfo['zip'];

        $leaderboard = City::rankingLeaderboard();
        if(!empty($leaderboard)){
            $searchingArray = array('name' => $userCityInfo['name']);
            $userCityRank = array_search($searchingArray, $leaderboard)+1;
        }

        $activeUsers = City::cityActiveUsers($zip);
        $amountCompletedChallenges = City::getCompletedChallengesOfCity($zip);
    }catch(\Throwable $th){
        $error = $th->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__."/../includes/head.inc.php"); ?> 
<body>
    <?php
        //Navbar
        include_once(__DIR__."/../includes/nav.inc.php"); 
    ?>
    
    <div class="container application">
        <?php if (!empty($error)) : ?>
          <div class="alert alert-danger" role="alert">
            <strong>Pas op!</strong> <?php echo $error; ?>
          </div>
        <?php endif; ?>
        <h2 class="mb-4">Stad</h2>
        <div class="hidden" id="cityName"><?php echo ucfirst(strtolower($userCityInfo['name'])); ?></div>
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active rounded-pill" id="pills-city-tab" data-toggle="pill" href="#pills-city" role="tab" aria-controls="pills-city" aria-selected="true">Mijn stad</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill" id="pills-explore-tab" data-toggle="pill" href="#pills-explore" role="tab" aria-controls="pills-explore" aria-selected="false">Verkennen</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-cityContent">
            <div class="tab-pane fade show active" id="pills-city" role="tabpanel" aria-labelledby="pills-city-tab">
                <?php 
                    if($content == "notFound"){
                        include_once(__DIR__."/404.php");
                    }else{
                        include_once(__DIR__."/includes/city/$content.php");
                    }
                ?>
            </div>
            <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h3 class="card-title d-flex align-items-center justify-content-between">
                                    Kies een gemeente
                                    <form class="form-inline my-2 my-lg-0 w-25">
                                        <div class="input-group w-100">
                                        <input type="text" class="form-control" name="searchCity" placeholder="Bv 2800 of Mechelen" aria-label="Stad opzoeken">
                                        <div class="input-group-append">
                                            <button class="btn btn-gresident" type="submit">
                                                Zoeken
                                            </button>
                                        </div>
                                        </div>
                                    </form>
                                </h3>
                                <div class="d-flex justify-content-center">
                                    <?php include_once(__DIR__."/includes/live-map.inc.php"); ?>
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
        include_once(__DIR__."/../includes/footer.inc.php");
    ?>
    <?php if($content == "realtime"): ?>
        <script>
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
        <script src="../api/apiPopulation.js"></script>
    <?php endif; ?>
</body>
</html>