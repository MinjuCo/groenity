console.log("connceted");

//decet click
document.querySelector('#findAdress').addEventListener("click", function(e){
    e.preventDefault();
    let street = document.querySelector("#street").value;
    let houseNr = document.querySelector("#streetNr").value;
    let city = document.querySelector("#city").value;

    console.log(street);
    console.log(houseNr);
    console.log(city);

    let url = `https://cors-anywhere.herokuapp.com/https://basisregisters.vlaanderen.be/api/v1/adresmatch?adresMatchRequest.gemeentenaam=${city}&adresMatchRequest.straatnaam=${street}&adresMatchRequest.huisnummer=${houseNr}`;

    //get data
    
    return fetch(url).then(response => {
        //get json
        //console.log(response.json());
        return response.json();
      })
      .then(data => {

        //detect error
        if(typeof(data.warnings[0]) !== "undefined"){
           document.querySelector('#adressError').setAttribute("class", "form__error visible");
           return false;
        }

        sessionStorage.setItem("street", street);
        sessionStorage.setItem("city", houseNr);
        sessionStorage.setItem("houserNr", city);
              
        window.location.replace("pages/askCode.php");
      })
      .catch(error => {
        console.error("Error:", error);
    });
})