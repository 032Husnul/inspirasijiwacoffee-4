
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Awesome CSS -->
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">

    <!-- CSS Home -->
    <link href="//resource/css/home.css?version=<?php echo filemtime('resource/css/home.css'); ?>" rel="stylesheet">

    <!-- Any CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Inspirasi Jiwa | Home</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #926A12;">
        <div class="container">
            <a class="navbar-brand"  id="logo" href="#">Inspirasi Jiwa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#menu">Menu</a>
                    <a class="nav-link" href="#aboutus">About Us</a>
                    <?php
                        // $_SESSION['status'] = "";

                        session_start();

                        if($_SESSION['status']!="sudah_login"){
                        echo " <a class='nav-link' href='Login.php'>Login</a>";
                        } 
                        else{
                        //     echo " <a class='nav-link' href=''>".$_SESSION['email']."</a>";
                        // }
                    ?>
                    <div class="dropdown">
                        <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['email']; ?>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="cart.php?id_user=<?php echo $_SESSION['id_login']; ?>"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                        </ul>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Home -->
    <div class="home-1">
        <img src="Image/Logo.PNG" class="logo">
        <div class="text-Box">
            <h2 class="k1">Ngopi enak gak harus mahal</h2>
            <h2 class="k2">karna<span style="font-family: Brush Script MT;"> Inspirasi Jiwa</span> adalah</h2>
            <h2 class="k1">tepat untuk mencari inspirasi</h2>
        </div>
    </div>      
    <script src="resource/js/Home.js"></script>
    <!-- Akhir Home -->

    <!-- Menu -->
    <section class="pt-5" id="menu">

        <div class="container px-4 px-lg-5 mt-5" >

            <div class="col text-center pb-4">
                <h1 style="color: #926A12;"><b>MENU</b><img src="Image/menu.svg" alt="" class="M-svg"></h1>
            </div>

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
                    include('config.php');
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                    $query = "SELECT * FROM menu ORDER BY id_menu ASC";
                    $result = mysqli_query($koneksi, $query);
                    //mengecek apakah ada error ketika menjalankan query
                    if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                    }

                    //buat perulangan untuk element tabel dari data mahasiswa
                    // $no = 1; //variabel untuk membuat nomor urut
                    // hasil query akan disimpan dalam variabel $data dalam bentuk array
                    // kemudian dicetak dengan perulangan while
                    while($row = mysqli_fetch_assoc($result))
                    {
            ?>
                <div class="col mb-5">
                    <div class="card h-100" style="border-radius: 10px;">
                        <!-- Product image-->
                        <img class="card-img-top" id="img-p" src="Image/<?php echo $row['gambar_menu']?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-2">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $row['deskripsi_menu'] ?></h5>
                                <!-- Product price-->
                                Rp. <?php echo $row['harga'] ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <form action="addtocart.php" method="post">
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <input name="id_menu" value="<?php echo $row['id_menu']; ?>"  hidden />
                                <input name="id_user" value="<?php echo $_SESSION['id_login']; ?>"  hidden />
                                <input name="qty" value="0"  type="number" class="w-50 mb-3" />
                                <br>
                                <!-- <a class="btn btn-outline-dark mt-auto" href="#">Buy</a> -->
                                <input type="submit" value="Buy" name="submit" class="btn btn-success btn-outlne-dark mt-auto">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
               <?php
                    }
               ?>
            </div>
        </div>
    </section>
    <!-- Akhir Menu -->

    <!-- About Us -->
        <div class="col text-center">
            <h1 style="color: #926A12;"><b>ABOUT US</b><img src="Image/about.svg" alt="" class="ab-svg"></h1>
        </div>

    <div class="about">
        <div class="f-about">
            <img src="Image/Artboard 1.png">
        </div>

        <div class="p-about">
            <div class="p-about-j">
                <h3 style="color: white;">Apa yang membuat kopi kami istimewah?</h3>
            </div>
            <br>
            <p style="font-family: Times New Roman; font-size: 20px; color: white;">
                Kopi kami terbuat dari bahan pilihan yang menjaga kualitas dan rasa. Kami memiliki perkebunan kopi sendiri yang di olah oleh Para Ahli kopi, Kami memiliki berbagai menu kopi yang akan membuat lidah anda menikmati citra rasa kopi yang fresh. Kopi kami tidak hanya memanjakan lidah anda tapi juga memanjakan tubuh anda. Kopi hitam adalah minuman yang berasal dari pengolahan dan penggalian biji kopi. Kata kopi pertama kali muncul dalam bahasa Arab, dengan nama Qahwah yang berarti kekuatan. Ini wajar kopi hitam adalah minuman elit. Ini adalah istilah yang muncuk untuk kopi dimasa lalu. Belanda dan Prancis serta Inggris adalah penguasa pasar kopi pada tahun 1600-an.
            </p>
        </div>
    </div>
    <!-- Akhir About Us -->

    <!-- Location -->
    <div class="container-fluid">
        <div class="row pt-5 mt-3 mb-3">
            <div class="col text-center">
                <h1 style="color: #926A12;"><b>LOCATION</b><img src="Image/location.svg" alt="" class="loc-svg"></h1> 
            </div>
                </div>
            <div class="frame-loc">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.69844583339!2d112.7653257353303!3d-7.275113562519781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa2d7b0ce529%3A0x5b7099b55205fd8e!2sJl.%20Kalidami%20No.52-A%2C%20RT.001%2FRW.10%2C%20Mojo%2C%20Kec.%20Gubeng%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060285!5e0!3m2!1sen!2sid!4v1639285646300!5m2!1sen!2sid" width="1000" height="500" style="border-radius: 10px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
    </div>
    <!-- Akhir Contact -->

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p> Jangan lupa follow akun sosial kita yang ada dibawah!</p>
            <ul class="socials">
                <li><a href ="https://www.facebook.com/zuck"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/Asemm76320359"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://sso.unesa.ac.id/"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCvh1at6xpV1ytYOAzxmqUsA"><i class="fa fa-youtube"></i></a></li>
                <li><a href="https://www.instagram.com/ikann.21/"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2020 codeOpacity. designed by <span>Kel 5</span></p>
        </div>
    </footer>
    <!-- Akhir Footer -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>