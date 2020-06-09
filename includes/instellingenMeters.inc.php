<div class="card-header instellingen-header">
    <h3>Meters</h3>
</div>
<form action="" method="post">
    <div class="card-body">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-9 d-flex align-self-center">
                <h4>Over welk meters bechikt u? </h4>
            </div>
            <div class="col-3 d-flex justify-content-end align-self-center">
                <input type="submit" value="Aanpasen" class="btn btn-gresident form-control ">
            </div>
            <hr style="width: 96%">

            <div class="form-check form-check-inline col-2 text-center d-flex align-items-center flex-column">
                <div class="p-2">
                    <label for="inlineRadio1" class="border border-secondary">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <img src="../img/Icons/apartment.svg" alt="appartment">
                        <p class="font-weight-bold">Digitale meter</p>
                    </label>
                </div>
            </div>
            <div class="form-check form-check-inline col-2 text-center d-flex align-items-center flex-column">
                <div class="p-2">
                    <label for="inlineRadio1" class="border border-secondary">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <img src="../img/Icons/closed_house.svg" alt="appartment">
                        <p class="font-weight-bold">Elektromechanische meter</p>
                    </label>
                </div>
            </div>
        </div>

        <div class="row d-flex ">
            <div class="col-9 d-flex align-self-center">
                <h4>Gebruikers met referentie: </h4>
            </div>
            <hr style="width: 96%">
        </div>

        <div class="row d-flex ml-1 p-2">

            <div class="card col-4 h-50" style="width: 18rem;">
                <div class="row text-center mt-1 mb-1">
                    <div class="col-4 align-self-center">
                        <img src="../img/Icons/energy.svg" alt="">
                    </div>
                    <div class="col-6 align-content-end">
                        <div class="row ">
                            <p class="mb-0 mt-1 font-weight-bold">Elektrische merter</p>
                            <p class="mb-0 mt-1">kwh</p>
                        </div>
                    </div>
                    <div class="col-2 mb-2">
                        <a href=""><img src="../img/Icons/x.svg" alt=""></a>
                    </div>
                </div>
            </div>

            <div class="form-group col-6 ml-auto mr-3 p-2">
                <div class="row">
                    <label for="sel1">Waarvoor:</label>
                    <select class="form-control" id="sel1">
                        <option>Electriciteit</option>
                        <option>Water</option>
                    </select>
                </div>
                <div class="row mt-2">
                    <label for="exampleInputEmail1">Referentie nummer:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="row mt-3 d-flex ">
                    <div class="col-8"></div>
                    <input type="submit" class="btn btn-gresident form-control col-4 mr-0" value="Toevoegen">
                </div>
            </div>
        </div>
        
        <div class="row d-flex ">
            <div class="col-9 d-flex align-self-center">
                <h4>Elektromechanische meter </h4>
            </div>
            <hr style="width: 96%">
        </div>

        <div class="row d-flex ml-1 p-2">
            <div class="col-4">
        <button class="btn btn-gresident form-control ">Gegevens importeren</button>
        <button class="btn btn-gresident form-control mt-4">Manueel ingeven</button>
        </div>
        <div class="col-7 d-flex align-items-center">
            <p class="mt-2">
            Als u overschakkelt naar een digitale meter, dan betaalt u enkel voor wat u echt heb gebruikt. Weet u wat dat kan betekenen voor u? U kan tot €300 besparen.
            </p>
        </div>
        </div>


    </div> <!-- end card body -->
</form>