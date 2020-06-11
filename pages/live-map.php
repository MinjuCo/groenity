<?php 
  /* Front-end Marlena */
  /* Optimized by Madina */

  $pageTitle = "Live kaart";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>
<body>
    <?php
      //Navbar
      include_once(__DIR__ . "/../includes/nav.inc.php");
    ?>

    <div class="container-fluid map">
        <div class="row mt-4">
          <div class="col-md-4">
            <div class="card shadow h-100">
              <div class="card-body">
                <form class="form-inline mr-auto my-2 mb-4">
                  <div class="input-group w-100">
                    <input type="text" class="form-control" name="searchUser" placeholder="Bv. 2800 of Mechelen" aria-label="Gebruiker opzoeken">
                    <div class="input-group-append">
                        <button class="btn btn-gresident" type="submit">
                            Zoeken
                        </button>
                    </div>
                  </div>
                </form>
                <h3 class="card-title">Leaderboard</h3>
                <div class="table-responsive">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ZIP</th>
                        <th scope="col">STAD</th>
                        <th scope="col" class="text-center"><img src="../img/g_coins.svg" alt="coin" class="coins"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>2800</td>
                        <td>Mechelen</td>
                        <td class="link-gn text-right">2500</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>2000</td>
                        <td>Antwerpen</td>
                        <td class="link-gn text-right">1500</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>1100</td>
                        <td>Brussel</td>
                        <td class="link-gn text-right">800</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card shadow h-100">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <?php include_once(__DIR__ . "/../includes/live-map.inc.php"); ?>
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
</body>

</html>