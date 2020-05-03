<?php
    $pageTitle = "Code";
?>
<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__."/../includes/head.inc.php"); ?>

<body>
    <?php include_once(__DIR__."/../includes/nav.inc.php"); ?>
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
                        
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputCode" class="sr-only">code</label>
                                    <input type="text" class="form-control" name="code" id="inputCode" placeholder="Code">
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="submit" value="Bevestig" class="btn btn-form-registratie">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="card shadow-sm col-12 rounded-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 d-flex align-items-center">
                                <label class="mb-0">Nee, ik heb geen code</label>
                            </div>
                            <div class="col-md-7">
                                <a href="register.php" class="btn">Ga verder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>