<?php include "section/db.php" ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDO INSERT INTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <pre></pre>

    <?php
    if (isset($_POST['urunduzenle']))
        $id = $_POST['urunduzenle'];

    if (isset($_POST['product_name'])) {

        $guncelle = $db->prepare("UPDATE product set
        ad = :ad,
        kodu = :kodu,
        fiyat = :fiyat,
        stok_sayisi = :stok_sayisi,
        kategori = :kategori
        WHERE id =:id
        ");

        $guncelle->execute(array(

            "ad" => $_POST["product_name"],
            "kodu" => $_POST["product_code"],
            "fiyat" => $_POST["product_payment"],
            "stok_sayisi" => $_POST["product_stock"],
            "kategori" => $_POST["product_category"],
            "id" => $id,

        ));

        if ($guncelle) {
            echo "Güncelleme Başarılı.";
        } else {
            echo "Güncellemede Bir Sorun Yaşandı.";
        }
    }

    ?>

    <div class="container">
        <form action="repiar.php" method="POST" class="formt-group">

            <div class="row">

                <?php

                if (isset($_GET['urunduzenle'])) {
                    $id = $_GET['urunduzenle'];

                    $urunsor = $db->prepare("SELECT * FROM product WHERE id =" . $id);
                    $urunsor->execute(array());
                    while ($urunyaz = $urunsor->fetch(PDO::FETCH_ASSOC)) {

                ?>

                        <input type="hidden" name="urunduzenle" value="<?php echo $id; ?>">
                        <div class="col-md-8 mx-auto mt-3">
                            <label for="product_name" class="font-weight-bold">Ürün Adı</label>
                            <input class="w-100 form-control" id="product_name" type="text" value="<?php echo $urunyaz['ad'] ?>" name="product_name">
                        </div>

                        <div class="col-md-8 mx-auto mt-3">
                            <label for="product_code" class="font-weight-bold">Ürün Stok Kodu</label>
                            <input class="w-100 form-control" id="product_code" type="text" value="<?php echo $urunyaz['kodu'] ?>" name="product_code">
                        </div>

                        <div class="col-md-8 mx-auto mt-3">
                            <label for="product_payment" class="font-weight-bold">Ürün Fiyat</label>
                            <input class="w-100 form-control" id="product_payment" type="number" value="<?php echo $urunyaz['fiyat'] ?>" name="product_payment">
                        </div>

                        <div class="col-md-8 mx-auto mt-3">
                            <label for="product_stock" class="font-weight-bold">Stok Sayısı</label>
                            <input class="w-100 form-control" id="product_stock" type="number" value="<?php echo $urunyaz['stok_sayisi'] ?>" name="product_stock">
                        </div>

                        <div class="col-md-8 mx-auto mt-3">
                            <label for="product_category" class="font-weight-bold">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="product_category" id="product_category">
                                <option value="<?php echo $urunyaz['kategori'] ?>"><?php echo $urunyaz['kategori'] ?></option>
                                <option value="Bilgisayar">Bilgisayar</option>
                                <option value="Telefon">Telefon</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Televizyon">Televizyon</option>
                            </select>
                        </div>

                    <?php } ?>

                    <div class="col-md-5 mx-auto mt-3">
                        <input type="submit" name="guncelle" value="Ürün Güncelle " class="btn btn-success w-100">
                    </div>
                <?php
                } ?>


            </div>

            <div class="row mt-5 text-center center-1">
                <h1>MENÜLER</h1>
                <hr>
                <div class="col-md-2 col-sm-4"><a href="index.php" class="btn btn-success w-100 ">Ürün Ekle</a></div>
                <div class="col-md-2 col-sm-4"><a href="all_product.php" class="btn btn-primary w-100 ">Tüm Ürünler</a></div>
            </div>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>