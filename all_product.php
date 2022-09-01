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

    if (isset($_GET['urunsil'])) {

        $id = $_GET['urunsil'];
        $urunsil = $db->prepare("DELETE FROM product WHERE id =" . $id);

    

        $urunsil->bindParam(':id', $id);
        $urunsil->execute();
        if (!$urunsil->rowCount()) {
            echo "Ürün silerken Bir Hata Oluştu";
        } else {
            echo "Ürün Başarı İle Silindi";
        }
    } else {
    }

    ?>

    <div class="container">
        <form action="index.php" method="POST" class="formt-group">

            <div class="row">

                <table class="table table-striped table-hover mt-5">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Sıra</th>
                            <th scope="col">Ürün Ad</th>
                            <th scope="col">Ürün Kodu</th>
                            <th scope="col">Fiyat</th>
                            <th scope="col">Stok Sayısı</th>
                            <th scope="col">Kategori</th>
                            <td scope="col">İşlemler</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $urunlersor = $db->prepare("SELECT * FROM product");
                        $urunlersor->execute(array());

                        while ($urunleryaz = $urunlersor->fetch(PDO::FETCH_ASSOC)) {

                        ?>

                            <tr>
                                <th scope="row"><?php echo $urunleryaz['id'] ?></th>
                                <td><?php echo $urunleryaz['ad'] ?></td>
                                <td><?php echo $urunleryaz['kodu'] ?></td>
                                <td><?php echo $urunleryaz['fiyat'] ?></td>
                                <td><?php echo $urunleryaz['stok_sayisi'] ?></td>
                                <td><?php echo $urunleryaz['kategori'] ?></td>
                                <td>
                                    <a href="all_product.php?urunsil=<?php echo $urunleryaz['id'] ?>" class="btn btn-danger">Sil</a>
                                    <a href="repiar.php?urunduzenle=<?php echo $urunleryaz['id'] ?>" class="btn btn-info">Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

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