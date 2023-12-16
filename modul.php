    <!-- header -->
    <!-- Navbar Section Starts Here -->
 <?php include('pecahan_depan/menu.php');  ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php SITEURL; ?>search_modul.php" method="POST">
                <input type="search" name="search" placeholder="Cari Modul..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">All Modul</h2>


            <!--Php script Start-->
            <?php  
                //query to get all categories from database
                $sql2 = "SELECT * FROM tbl_modul WHERE active='Yes' ";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);


                //cek
                if($count2>0)
                {
                    //we have data in database
                    //mengambil data dan tampilkan
                    while ($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id              = $row2['id'];
                        $title          = $row2['title'];
                        $pengarang      = $row2['pengarang'];
                        $description    = $row2['description'];
                        $image_name     = $row2['image_name'];
                        $namaFile       = $row2['namaFile'];

                        ?>
                        <!--start body form-->
                         <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        //cek
                                        if ($image_name=="") 
                                        {
                                            echo "<div class='error text-center'> Gambar Tidak Ditambahkan</div>";
                                        }
                                        else
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>/images/modul/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                <?php
                                            }

                                    ?>
                                                               
                        </div>
                                    <div class="food-menu-desc">
                                        <h4><?php echo $title; ?></h4>
                                        <p class="food-price"><?php echo $pengarang; ?></p>
                                        <p class="food-detail">
                                           <?php echo $description; ?>
                                        </p>
                                        <br>

                                        <a href="<?php echo SITEURL; ?>/berkas/<?php echo $namaFile ; ?>" class="btn btn-primary" download>Download Now</a>
                                    </div>
                                </div>

                        <!--end body form-->

                        <?php 
                    }
                }
                    else
                        {
                            // jika gagal
                            echo "<div class='error text-center'> Gambar Tidak Ditambahkan</div>";
                        }                

            ?>
            <!--Php script End-->
            <!--Php script Kategori End-->


            <div class="clearfix"></div>       

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    
   <!-- social Section Starts Here -->
 <?php include('pecahan_depan/footer.php'); ?>
    <!-- footer Section Ends Here -->