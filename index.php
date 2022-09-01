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

    <?php

    if (isset($_POST['ekle'])) {

        $ekle = $db->prepare("insert into product set
    ad = :ad,
    kodu = :kodu,
    fiyat = :fiyat,
    stok_sayisi = :stok_sayisi,
    kategori = :kategori
    ");

        $kontrol = $ekle->execute(array(

            "ad" => $_POST["product_name"],
            "kodu" => $_POST["product_code"],
            "fiyat" => $_POST["product_payment"],
            "stok_sayisi" => $_POST["product_stock"],
            "kategori" => $_POST["product_category"],

        ));

        if ($kontrol) {
            echo "ürün başarı ile yüklendi.";
        } else {
            echo "ekleme yaparken bir sorunla karşılaşıldı, lütfen daha sonra tekrar deneyiniz.";
        }
    } else {
    }

    ?>


    <div class="container">
        <form action="index.php" method="POST" class="formt-group">

            <div class="row">

                <div class="col-md-8 mx-auto mt-3">
                    <label for="product_name" class="font-weight-bold">Ürün Adı</label>
                    <input class="w-100 form-control" type="text" name="product_name" id="product_name" placeholder="Ürün adınız giriniz" required>
                </div>
                <div class="col-md-8 mx-auto mt-3">
                    <label for="product_category" class="font-weight-bold">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="product_category" id="product_category">
                        <option value="Bilgisayar">Bilgisayar</option>
                        <option value="Telefon">Telefon</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Televizyon">Televizyon</option>
                    </select>
                </div>
                <div class="col-md-8 mx-auto mt-3">
                    <label for="product_code" class="font-weight-bold">Ürün Kodu</label>
                    <input class="w-100 form-control" type="text" name="product_code" id="product_code" placeholder="Ürün Kodu giriniz" required>
                </div>
                <div class="col-md-8 mx-auto mt-3">
                    <label for="product_payment" class="font-weight-bold">Ürün Fiyatı</label>
                    <input class="w-100 form-control" type="number" name="product_payment" id="product_payment" placeholder="Ürün Fiyatı giriniz" required>
                </div>
                <div class="col-md-8 mx-auto mt-3">
                    <label for="product_stock" class="font-weight-bold">ürün Stok Sayısı</label>
                    <input class="w-100 form-control" type="number" name="product_stock" id="product_stock" placeholder="ürün Stok Sayısı giriniz" required>
                </div>
                <div class="col-md-5 mx-auto mt-3">
                    <input type="submit" name="ekle" value="Ürün Yükle " class="btn btn-success w-100">
                </div>

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