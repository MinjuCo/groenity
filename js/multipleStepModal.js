/* Source: https://codepen.io/Ayn_/pen/vmVKZV */
$(document).ready(function() {
  prep_modal();
});

function prep_modal()
{
  $(".modal").each(function() {

		var element = this;
		var pages = $(this).find('.modal-split');

		if (pages.length != 0)
		{
				let emailEl = document.querySelector("#bookingEmail");
				let phoneEl = document.querySelector("#bookingPhone");

				pages.hide();
				pages.eq(0).show();
				
				var c_button = document.createElement("button");
				c_button.setAttribute("type","button");
				c_button.setAttribute("class","btn btn-secondary");
				c_button.setAttribute("data-dismiss","modal");
				c_button.innerHTML = "Annuleren";

				var b_button = document.createElement("button");
				b_button.setAttribute("type","button");
				b_button.setAttribute("class","btn btn-outline-gresident");
				b_button.setAttribute("style","display: none;");
				b_button.innerHTML = "Vorige";

				var n_button = document.createElement("button");
				n_button.setAttribute("type","button");
				n_button.setAttribute("class","btn btn-gresident");
				n_button.innerHTML = "Volgende";

				$(this).find('.modal-footer').append(c_button).append(b_button).append(n_button);


				var page_track = 0;

				$(n_button).click(function() {
					
					this.blur();

					if(page_track == 0)
					{
						$(b_button).show();
					}

					if(page_track == pages.length-2)
					{
						$(n_button).text("Indienen");
						n_button.setAttribute("id","submitbtnAppoint");
						if(emailEl.value.trim() === "" && phoneEl.value.trim() === ""){
							n_button.setAttribute("disabled", "");
						}else{
							n_button.setAttribute("type", "submit");
							n_button.setAttribute("name", "makeAppointment");
							n_button.addEventListener("click", ()=>{
								if(emailEl.value.trim() !== "" || phoneEl.value.trim() !== ""){
									$("form#submitAppointment").submit();
								}
								
							});
						}
					}

					if(page_track < pages.length-1)
					{
						page_track++;

						pages.hide();
						pages.eq(page_track).show();
					}


				});

				$(b_button).click(function() {

					if(page_track == 1)
					{
						$(b_button).hide();
					}

					if(page_track == pages.length-1)
					{
						$(n_button).text("Volgende");
					}

					if(page_track > 0)
					{
						page_track--;

						pages.hide();
						pages.eq(page_track).show();
					}


				});
				
				emailEl.addEventListener("keyup", (e) => {
					let valueEmail = emailEl.value;
					let valuePhone = phoneEl.value;
				
					if(valueEmail.trim() !== "" || valuePhone.trim() !== ""){
						n_button.setAttribute("type", "submit");
						n_button.removeAttribute("disabled");
					}else{
						n_button.setAttribute("type", "button");
						n_button.setAttribute("disabled", "")
					}

					n_button.addEventListener("click", ()=>{
						if(emailEl.value.trim() !== "" || phoneEl.value.trim() !== ""){
							$("form#submitAppointment").submit();
						}
						
					});
				});
				
				phoneEl.addEventListener("keyup", (e) => {
					let valueEmail = emailEl.value;
					let valuePhone = phoneEl.value;
				
					if(valueEmail.trim() !== "" || valuePhone.trim() !== ""){
						n_button.setAttribute("type", "submit");
						n_button.removeAttribute("disabled");
					}else{
						n_button.setAttribute("type", "button");
						n_button.setAttribute("disabled", "")
					}

					n_button.addEventListener("click", ()=>{
						if(emailEl.value.trim() !== "" || phoneEl.value.trim() !== ""){
							$("form#submitAppointment").submit();
						}
						
					});
				});
		}

	});
	
}