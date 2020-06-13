<?php if(!empty($pendingAppointments) || $searchSubject): ?>
  <h3>Afwachtende afspraken</h3>
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
          <th># Referentie</th>
          <th scope="col" class="w-50">Onderwerp</th>
          <th scope="col">Thema</th>
          <th scope="col">Datum</th>
          <th scope="col">Actie</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(empty($pendingAppointments)):
            echo "<tr><td colspan='6'>Geen resultaten gevonden</td></tr>";
          else:
            $teller = 0;
            foreach($pendingAppointments as $appointment): 
              if($appointment['completed'] == 0):
        ?>
          <tr>
            <th scope="row"><?php echo $appointment['id']; ?></th>
            <td><?php echo htmlspecialchars($appointment['subject']); ?></td>
            <td class="link-gn"><?php echo htmlspecialchars($appointment['theme']); ?></td>
            <td><?php echo $appointment['timestamp']; ?></td>
            <td>
              <a href="?remove=<?php echo $appointment['id']; ?>" class="btn btn-danger">Annuleer</a>
            </td>
          </tr>
        <?php
                $teller++;
              endif;
            endforeach;
            echo ($teller == 0)? "<tr><td colspan='6'>Geen resultaten gevonden</td></tr>":"";
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