//decet click
document.querySelector('#findAddress').addEventListener("click", function(e){
    e.preventDefault();
    let streetName = document.querySelector("#street").value;
    let houseNr = document.querySelector("#streetNr").value;
    let streetAddress = streetName.replace(" ", "+") + "+" + houseNr;
    let city = document.querySelector("#city").value;
    let zip = "notFound";

    fetch('ajax/getZip.php?q=' + city)
    .then(response => response.json())
    .then(result => {
      console.log(result);
      if(result.status === "success"){
        zip = result.zip;

        console.log(streetAddress);
        console.log(city);
        console.log(zip);

        let url = `https://cors-anywhere.herokuapp.com/https://api.address-validator.net/api/verify?StreetAddress=${streetAddress}&City=${city}&CountryCode=be&PostalCode=${zip}&APIKey=av-27c0526fc3a239acdaf6b0d5fc7b3021`;

        //get data
        
        fetch(url).then(response => {
            //get json
            //console.log(response.json());
            return response.json();
          })
          .then(data => {
            console.log(data);
            if(data.status === "VALID"){
              
              //$("#jsLoad").load("api/setSession.php?zip=" + data.postalcode + "&street=" + data.street + "&houseNr=" + data.streetnumber);
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  window.location.replace("pages/askCode.php");
                }
              };
              xmlhttp.open("GET", "api/setSession.php?zip=" + data.postalcode + "&street=" + data.street.replace(" ", "+") + "&houseNr=" + data.streetnumber, true);
              xmlhttp.send();
            }

            //detect error
            if(data.status !== "VALID"){
              document.querySelector('#addressError').setAttribute("class", "form__error text-danger visible");
              return false;
            }
          
          })
          .catch(error => {
            console.error("Error:", error);
        });

      }else{
        document.querySelector('#addressError').setAttribute("class", "form__error text-danger visible");
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
});