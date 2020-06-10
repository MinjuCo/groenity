<?php
include_once(__DIR__ . "/../classes/User.php");
$pageTitle = "Code";

session_start();

if(empty($_SESSION["street"]) || empty($_SESSION['houseNr']) || empty($_SESSION["zip"])){
    header("Location: ../index.php");
}

$street = $_SESSION["street"];
$houseNr = $_SESSION["houseNr"];
$zip = $_SESSION["zip"];


if (!empty($_POST['sendCode'])) {
    $user = new User();

    try {

        $user->setCode($_POST['code']);
        $user->setStreet($street);
        $user->setHouseNumber($houseNr);
        $user->setZip($zip);

        // verifie code & find userId
        $id = $user->validateCode();
        
        $user->compliteRegistration($id);

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>

<body>
    <?php include_once(__DIR__ . "/../includes/nav.inc.php"); ?>
    <div class="container askCode">
        <div class="col-md-7 m-auto">
            <!-- 1st -->
            <h2 class="mb-2">Heb je een code?</h2>
            <!-- 2nd -->
            <div class="row">
                <div class="card shadow-sm col-12 rounded-lg">
                    <div class="card-body">
                        <label>Ja, ik heb een code</label>

                        <p>Vul code in:</p>
                        <p><?php if (isset($error)) {
                                echo $error;
                            } ?></p>
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputCode" class="sr-only">code</label>
                                    <input type="text" class="form-control" name="code" id="inputCode" placeholder="Code">
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="submit" value="Bevestig" name="sendCode" class="btn btn-gresident btn-form-registratie">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row mb-4">
                <div class="card shadow-sm col-12 rounded-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="mb-0">Nee, ik heb geen code</label>
                            </div>
                            <div class="col-md-7">
                                <a href="register.php" class="btn btn-gresident">Ga verder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once(__DIR__ . "/../includes/footer.inc.php"); ?>
</body>

</html>