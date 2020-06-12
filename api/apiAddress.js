console.log("connceted");

//decet click
document.querySelector('#findAddress').addEventListener("click", function(e){
    e.preventDefault();
    let street = document.querySelector("#street").value;
    let houseNr = document.querySelector("#streetNr").value;
    let city = document.querySelector("#city").value;

    console.log(street);
    console.log(houseNr);
    console.log(city);

    let url = `https://cors-anywhere.herokuapp.com/https://api.basisregisters.vlaanderen.be/v1/adresmatch?gemeentenaam=${city}&straatnaam=${street}&huisnummer=${houseNr}`;

    //get data
    
    return fetch(url).then(response => {
        //get json
        //console.log(response.json());
        return response.json();
      })
      .then(data => {
        if(data.adresMatches.length != 0){
          let zipCode = data.adresMatches[0].postinfo.objectId;

          //AJAX
          xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET", "api/setSession.php?zip=" + zipCode + "&street=" + street + "&houseNr=" + houseNr , true);
          xmlhttp.send();

      
          window.location.replace("pages/askCode.php");
        }
        


        //detect error
        if(typeof(data.warnings[0]) !== "undefined"){
           document.querySelector('#addressError').setAttribute("class", "form__error visible");
           return false;
        }
      
      })
      .catch(error => {
        console.error("Error:", error);
    });
});