<!DOCTYPE html>
<html lang="nl">
<?php include_once("includes/head.inc.php"); ?>

<body>
    <?php include_once("includes/nav.inc.php"); ?>
    <div class="container">
        <!-- 1st -->
        <div class="d-flex align-items-start flex-column ">
            <div class="p-2 form-space">
                <h2>Heb je een code?</h2>
            </div>
            <!-- 2nd -->
            <div class="p-4 form-space">
                <p>Ja, ik heb een code</p>

                <p>Vul code in:</p>
                <form method="post" class="form-group row">
                
                    <div class="col">
                    <label for="inputCode" class="sr-only">code</label>
                    <input type="text" class="form-control" name="inputCode" id="inputCode" placeholder="Code">
                    </div>
                    <div class="col">
                    <input type="submit" name="inputCode" value="Bevestig" class="btn">
                    </div>
                </form>
               
        
            </div>

            <div class="p-3 form-space">
                <div class="row">
                <div class="col">
                <p>Nee, ik heb geen code</p>
                </div>
                <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Ga verder</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("includes/footer.inc.php"); ?>
</body>

</html>