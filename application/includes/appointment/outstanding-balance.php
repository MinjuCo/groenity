<?php if(!empty($outstandingBalances) || $searchSubject): ?>
  <h3>Openstaande saldo</h3>
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
          <th scope="col">Duur</th>
          <th scope="col">Totaal</th>
          <th scope="col">Betalen voor</th>
          <th scope="col">Actie</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(empty($outstandingBalances)):
            echo "<tr><td colspan='6'>Geen resultaten gevonden</td></tr>";
          else:
            $teller = 0;
            foreach($outstandingBalances as $appointment): 
              if($appointment['completed'] && $appointment['paid'] == false):
        ?>
          <tr>
            <th scope="row"><?php echo $appointment['id']; ?></th>
            <td><?php echo htmlspecialchars($appointment['subject']); ?></td>
            <td><?php echo (!empty($appointment['total_price']))? ($appointment['total_price']/0.3)." min":"Onbekend"; ?></td>
            <td class="link-gn"><?php echo (!empty($appointment['total_price']))? "€ ".number_format(floatval(htmlspecialchars($appointment['total_price'])), 2):"Onbekend"; ?></td>
            <td class="bg-warning"><?php echo htmlspecialchars($appointment['due_date']); ?></td>
            <td><a href="#" class="btn btn-block btn-gresident">Betalen</a></td>
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
  <img class="col-md-5 col-xs-8 d-block mx-auto my-4" src="../img/Visuals/undraw_pay_online.svg" alt="Pay online">
  <h3 class="text-center">Sorry er zijn nog geen openstaande saldo's</h3>
<?php endif; ?>