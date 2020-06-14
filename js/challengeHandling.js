let btnsParticipate = document.querySelectorAll(".btn-participate");

btnsParticipate.forEach(btnParticipate => {
  let btn = this;
  btnParticipate.addEventListener("click", (e) => {
    let thisElem = e.currentTarget;
    let challengeId = thisElem.dataset.challengeid;

    //send to database
    let formData = new FormData();
    formData.append('challengeId', challengeId);

    fetch('../ajax/acceptChallenge.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(result => {
      if(result.status === "success"){
        console.log(result.body);
        let challengeBlock = thisElem.parentNode.parentNode.parentNode.parentNode; //Get <div class="row mb-3" of current element>

        challengeBlock.parentNode.removeChild(challengeBlock);
        window.location.replace("?content=onGoing");
      }

      if(result.status === "error"){
        alert(result.message);
      }

    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});