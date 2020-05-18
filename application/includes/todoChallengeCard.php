<div class="col-md-8">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4>Beschrijving</h4>
      <p class="card-text">
        <?php echo htmlspecialchars($challenge['description']); ?>
      </p>
      <h4>Doel</h4>
      <p class="card-text">
        <?php echo htmlspecialchars($challenge['goals']); ?>
      </p>
      <h4>Meer info</h4>
      <p class="card-text">
        <?php echo htmlspecialchars($challenge['extra_info']); ?>
      </p>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4>Beloning</h4>
      <p>
        <?php echo htmlspecialchars($challenge['rewards']); ?>
      </p>
    </div>
  </div>
</div>