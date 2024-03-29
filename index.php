<?php include 'functions.php' ?>
<?php include 'header.php' ?>

<?php

$drinks = get_drinks();

?>

<main>
  <div class="banner flex justify-content-center">
    <div class="left">
      <div>
        <span>An award winning vineyard</span>
        <h1>Award-winning English wines to charm every palate</h1>
      </div>
    </div>
    <div class="right">
      <img src="assets/images/banner.jpg" alt="" />
    </div>
  </div>

  <div class="store">
    <div class="heading">
      <h2>Featured Drinks</h2>
    </div>

    <div class="container">
      <?php if (mysqli_num_rows($drinks)) { ?>
        <div class="drinks flex">
          <?php foreach ($drinks as $drink) { ?>
            <div class="drink">
              <div class="image">
                <img src="assets/images/<?= $drink['image'] ?>" alt="" />
              </div>
              <div class="content">
                <h3><?= $drink['name'] ?></h3>
                <p class="description">
                  <?= $drink['description'] ?>
                </p>
                <p class="price">£<?= $drink['price'] ?></p>
                <div class="flex quantity">
                  <span class="add" data-item="<?= $drink['d_id'] ?>"> + </span>
                  <span class="number" id="number-<?= $drink['d_id'] ?>">1</span>
                  <span class="subtract" data-item="<?= $drink['d_id'] ?>"> - </span>
                </div>
                <div class="add-to-basket">
                  <form action="add-to-cart.php" method="POST">
                    <input type="hidden" name="d_id" value="<?= $drink['d_id'] ?>">
                    <input type="hidden" id="item-<?= $drink['d_id'] ?>" name="quantity" value="1">
                    <button type="submit" name="add-to-cart" class="btn">Add To Basket</button>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</main>
<?php include 'footer.php' ?>