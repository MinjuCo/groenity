//Wikipedia
let cityName = document.querySelector("#cityName").innerHTML;

let wiki = `https://cors-anywhere.herokuapp.com/https://en.wikipedia.org/w/api.php?action=query&prop=pageprops&titles=${cityName}&format=json`;
//Fetch city id on Wikidata
fetch(wiki)
.then(response => response.json())
.then(result => {
  let page = result.query.pages;
  let pageId = Object.keys(page)[0];
  if(pageId != "-1"){
    let pageIdValue = Object.values(page)[0];
    let wikiDataId = pageIdValue.pageprops.wikibase_item;

    //fetch population from rapidapi
    fetch("https://wft-geo-db.p.rapidapi.com/v1/geo/cities/" + wikiDataId, {
      "method": "GET",
      "headers": {
        "x-rapidapi-host": "wft-geo-db.p.rapidapi.com",
        "x-rapidapi-key": "5e6a221216mshd980cd564911787p112806jsnf93b19e023de"
      }
    })
    .then(response => response.json())
    .then(result => {
      if(Object.keys(result)[0] == "data"){
        let population = result.data.population;
        document.querySelector("#population").innerHTML = population.toLocaleString("nl-BE").replace('.',' ');
      }else{
        document.querySelector("#population").innerHTML = "Niet bekend";
      }
    })
    .catch(err => {
      console.log(err);
    });
  }
  
})
.catch(error => {
  console.error('Error:', error);
});