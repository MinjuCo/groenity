<h3>T-shirts</h3>
<?php 
  $teller = 1;
  foreach($products as $product):
    if($teller % 3 == 1){
      echo '<div class="row mb-3">';
    }
?>

  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="img-container d-flex justify-content-end">
        <img src="../img/shop/<?php echo htmlspecialchars($product['category'])."/".htmlspecialchars($product['picture']); ?>" alt="<?php echo htmlspecialchars($product['picture']); ?>" class="m-auto productPicture">
        <div class="position-absolute align-self-end card-body">
          <a href="#" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a>
        </div>
      </div>
      <div class="text-right card-body">
        <h5 class="card-title text-left my-0"><?php echo htmlspecialchars($product['name']); ?></h5>
        <div class="price link-gn d-flex">
          <?php echo ($product['gp'])? htmlspecialchars($product['price']): '€ '.htmlspecialchars($product['price']); ?>
          <?php if($product['gp']): ?>
            <img class="coins" src="../img/g_coins.svg" alt="GP">
          <?php endif; ?>
        </div>
        <a href="#" class="btn btn-gresident">Voeg toe</a>
      </div>
    </div>
  </div>

<?php 
    if($teller % 3 == 0 || $teller == count($products)){
      echo '</div>';
    }

    $teller++;
  endforeach; 
?>