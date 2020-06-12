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
        challengeBlock.querySelector(".card-subtitle").remove();
        let tag = document.createElement("span");

        if(result.body.is_battle === "1"){
          //Add status tag
          tag.setAttribute("class", "ml-2 badge badge-warning");
          tag.innerHTML = "In wacht";
          challengeBlock.querySelector("h4").insertBefore(tag, challengeBlock.querySelector(".coins"));
          
          //Replace buttons
          challengeBlock.querySelector(".action-buttons").innerHTML = `
          <button class="btn btn-gresident ml-2">Annuleren</button>
          <a href="challengeInfo.php?challenge=${result.body.id}" class="btn btn-gresident">Meer info</a>`;
          //remove block
          challengeBlock.parentNode.removeChild(challengeBlock);
          if(document.querySelector("#pills-queue .empty")){
            document.querySelector("#pills-queue .empty").remove();
          }
          document.querySelector("#pills-queue").prepend(challengeBlock);
          $('#pills-queue-tab').tab('show');
        }else{
          //Add status tag
          tag.setAttribute("class", "ml-2 badge badge-success");
          tag.innerHTML = "Bezig";
          challengeBlock.querySelector("h4").insertBefore(tag, challengeBlock.querySelector(".coins"));
          
          //Replace buttons
          challengeBlock.querySelector(".action-buttons").innerHTML = `
          <a href="challengeInfo.php?challenge=${result.body.id}" class="btn btn-gresident">Details</a>`;
          //remove block
          challengeBlock.parentNode.removeChild(challengeBlock);
          if(document.querySelector("#pills-single .empty")){
            document.querySelector("#pills-single .empty").remove();
          }
          document.querySelector("#pills-single").prepend(challengeBlock);
          $('#pills-single-tab').tab('show');
        }

        document.querySelector("#pills-all").prepend(challengeBlock.cloneNode(true));
        $('#pills-ongoingChallenges-tab').tab('show');
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