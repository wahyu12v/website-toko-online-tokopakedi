<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id ");
$a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokopakedi </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png">
</head>

<body>

    <!--header-->

    <header>
        <div class="container">
            <h1><a href="index.php">Tokopakedi</a></h1>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="login.php">Admin</a></li>
            </ul>
        </div>
    </header>

    <!--search-->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" class="text1"
                    value="<?php echo $_GET['search'] ?>">
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" >
                <input type="submit" name="cari" value="Cari Produk" class="btn1">
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
                <?php
                error_reporting(0);
                if ($_GET['search'] != '' || $_GET['kat'] != '' ) {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%".$_GET['kat']."%' ";

                }
                error_reporting(0);
                ini_set('display_errors', 0);
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC ");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {

                        ?>
                        <a href="detail-produk.php?ip=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['product_image'] ?>" width="100%">
                                <p class="nama">
                                    <?php echo substr($p['product_name'], 0, 20)?>
                                </p>
                                <p class="harga">Rp.
                                    <?php echo number_format($p['product_price']) ?>
                                </p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Produk Tidak Ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p>
                <?php echo $a->admin_address ?>
            </p>

            <h4>Email</h4>
            <p>
                <?php echo $a->admin_email ?>
            </p>

            <h4>Telepon</h4>
            <p>
                <?php echo $a->admin_telp ?>
            </p>

            <small>Copyright &copy; 2023 - Ardian Wahyu Saputra.</small>
        </div>
    </div>

</body>

</html>