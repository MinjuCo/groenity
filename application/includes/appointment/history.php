<?php if(!empty($appointmentHistory) || $searchSubject): ?> 
  <h3>Geschiedenis</h3>
  <form class="form-inline d-flex justify-content-end">
    <div class="input-group mb-3 w-50">
      <input type="hidden" name="content" value="<?php echo $content; ?>">
      <input type="text" class="form-control" placeholder="Zoek op onderwerp" name="searchSubject" value="<?php echo (isset($searchSubject))? $searchSubject:"";?>" aria-label="Zoek op onderwerp" aria-describedby="button-topicSearch">
      <div class="input-group-append">
        <button class="btn btn-gresident" type="submit" id="button-topicSearch">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
      </div>
    </div>
  </form>
  <div class="card shadow-sm table-responsive-sm">
    <table class="table m-0 table-hover">
      <thead class="bg-darkblue">
        <tr>
          <th>#</th>
          <th scope="col" class="w-25">Onderwerp</th>
          <th scope="col">Thema</th>
          <th scope="col">Expert</th>
          <th scope="col">Totaal</th>
          <th scope="col">Duur</th>
          <th scope="col">Datum</th>
          <th scope="col">Actie</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(empty($appointmentHistory)):
            echo "<tr><td colspan='6'>Geen resultaten gevonden</td></tr>";
          else:
            foreach($appointmentHistory as $appointment): 
        ?>
          <tr>
            <th scope="row"><?php echo $appointment['id']; ?></th>
            <td><?php echo htmlspecialchars($appointment['subject']); ?></td>
            <td class="link-gn"><?php echo htmlspecialchars($appointment['theme']); ?></td>
            <td><?php echo (!empty($appointment['expert_name']))? htmlspecialchars($appointment['expert_name']):"Onbekend"; ?></td>
            <td class="link-gn"><?php echo (!empty($appointment['total_price']))? "€ ".number_format(floatval(htmlspecialchars($appointment['total_price'])), 2):"Onbekend"; ?></td>
            <td><?php echo (!empty($appointment['total_price']))? ($appointment['total_price']/0.3)." min":"Onbekend"; ?></td>
            <td>24/04/2020 15:45</td>
            <?php if($appointment['paid']): ?>
              <td><span class="badge badge-success mx-auto d-block">Betaald</span></td>
            <?php elseif($appointment['completed']): ?>
              <td><span class="badge badge-warning mx-auto d-block">In behandeling</span></td>
            <?php else: ?>
              <td><span class="badge badge-info mx-auto d-block">Afwachtend</span></td>
            <?php endif; ?>
          </tr>
        <?php
            endforeach;
          endif; 
        ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <img class="col-md-5 col-xs-8 d-block mx-auto my-4" src="../img/Visuals/undraw_conversation.svg" alt="Book a conversation illustration">
  <h3 class="text-center">Sorry je hebt nog geen enkel gesprek geboekt</h3>
  <p class="col-md-9 col-12 m-auto">Heb je vragen? Wil je tips? Of misschien heb je wel een geweldig idee om je omgeving nog groener te maken. 
    Boek nu een gesprek met een milieuspecialist en hij zal proberen om zo snel mogelijk contact met je op te nemen.</p>
  <button type="button" class="btn btn-gresident mt-4 d-block mx-auto px-4" data-toggle="modal" data-target="#makeABooking">
    Gesprek boeken
  </button>
<?php endif; ?>