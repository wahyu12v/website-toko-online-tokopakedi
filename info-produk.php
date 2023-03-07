<?php
error_reporting(0);
include 'db.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id  ");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);

?>

<!DOCTYPE html>
<html>

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
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk" class="btn1">
            </form>
        </div>
    </div>

    <!-- produk detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                
            <!--Bermaslaah -->
                <div class="col-2">
                    <img src="image/reebok2.jpg" width="100%">
                    <!--<img src="produk/<?php echo $p->product_image ?>" width="100%"> -->
                </div>
                <div class="col-2">

                    <h3>Addidass</h3>
                    <h4>Rp.900.000</h4>
                    <p>
                        Deskripsi : <br>
                        is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                        has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                    <p>Hubungi Via Whatsapps</p>
                    <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai,Saya Tertarik dengan produk Anda." 
                    target="_blank"><img src="image/wa.png" width="40px"></a>
                    <a href="https://id-id.facebook.com/" target="_blank"><img src="image/ig.jpeg" width="40px"></a>
                    <a href="https://www.instagram.com/?hl=id" target="_blank"><img src="image/tele.png" width="40px"></a>
                    <a href="https://web.telegram.org/" target="_blank"><img src="image/fb.png" width="40px"></a>

                    <!--
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <p>
                        Deskripsi : <br>
                        <?php echo $p->product_description ?>
                    
                    </p> -->
               
                </div>

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