<section class="aaaa">
    <div class="list-product">
        <ul class="ini-ul">
            <?php foreach ($products as $product) : ?>
                <li>
                    <div class="eee">
                        <img src="<?= $product['image'] ?>" class="gambar-li">
                    </div>
                    <div class="items">
                        <strong><?= $product['name'] ?></strong>
                        <hr>
                        <strong><?= $product['brand'] ?></strong>
                        <br> <br>
                        <div class="harga" style="margin-top:-20px !important;"> <?= "Rp" . number_format($product['price'], 2) ?> <br>
                        </div>
                    </div>
                    <div class="button">
                        <a href="beli.php?id= <?= $product['id_product']; ?>">
                            <button type="button">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Langsung Beli
                            </button>
                        </a>
                        <a href="beli.php?id= <?= $product['id_product']; ?>">
                            <button type="button">
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                Masukkan Keranjang
                            </button>
                        </a>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>