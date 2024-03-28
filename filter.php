<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true){
    echo "<html><head></head><body><script>alert('Please login first');</script></body></html>";
    header("location: index.html");
    exit;
}
include 'connect.php';
$quantity=2;
$cat=$_POST['category'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigation.css">
    <link rel="icon" href="images/GREEN THREADS.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Skranji&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="icon" href="images/GREEN THREADS.png">
    <title>Home</title>
</head>

<body>
    <audio src="whoosh-6316.mp3" type="audio/mp3" autoplay></audio>
    <div class="navbar">
        <ul>
            <div class="cont1">
                <li class="logo"><img src="images/GREEN THREADS.png" alt="brandlogo"
                        style="height: 100%;border-radius: 20px;"></li>
                <li class="home"><a href="landing_page.html">Home</a></li>
                <li class="team"><a href="home.php">Shop Now</a></li>
            </div>
        </ul>
        <div class="search_box">
            <form action="#" method="get">
                <div class="search">
                    <button class="submit_search" id="submit_button" type="submit"><span
                            class="material-symbols-outlined">search</span></button>
                    <input class="searchForm" id="searchForm" type="text" placeholder="Search" style="color:black;"
                        autocomplete="off">
                </div>
            </form>
        </div>
        <ul style="padding-left: 0;max-width:fit-content;">
            <div class="cont2">
                <?php 
                
                if($_SESSION["loggedin"]==true){
                    echo "
                    <form action='logout.php'>
                    <button value='submit' >Logout</button>
                    
                    </form>
                    ";
                }
                
                ?>
                <li class="home"><a href="cart.html">Cart</a></li>
                <li class="home"><a href="Aboutus.html">About</a></li>
                <li class="team"><a href="contactus.html">Contact</a></li>
                <li class="home"><a href="#"><img src="images/ins.png" alt="insta" style="height: 3vh;"></a></li>
                <li class="team"><a href="#"><img src="images/x.png" alt="twitter" style="height:3vh;"></a></li>
                <li class="home"><a href="#"><img src="images/fb.png" alt="facebook" style="height: 3vh;"></a></li>
            </div>
        </ul>
    </div>
    <header style="background-color:grey;font-size:30px;"><center>Welcome <?php echo $_SESSION["username"] ?></center> </header>
    <div class="vidcnt">
        <center>
            <video src="Green Fashion - Sustainable clothing at UNEA.mp4" style="width:80%" 
                controls></video>
        </center>
    </div>
    <div style="display:flex;width:100%;background-color:wheat;height:fit-content">
        <div class="filters-container" >
            <center><article style="font-size: 32px;background-color:#c1a780;border: solid;">Filters</article></center>
            <div style="background-color:rgb(242, 242, 242);border: solid;border-top: none;">
            <form action="filter.php" method="post" class="filters-form" style="padding-top: 15px;">
                <div class="filter-option">
                    <input type="checkbox" name="category" id="winter" value="2">
                    <label for="winter">Winterwear</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" name="category" id="kurta" value="3">
                    <label for="kurta">Kurta</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" name="category" id="Shirts" value="4">
                    <label for="Shirts">Jeans</label>
                </div>
                <button type="submit" class="submit-button" style="margin-bottom: 10px;margin-top: 50px;">Apply Filters</button>
            </form>
            <form action="home.php" class="filters-form">
                <button type="submit" class="reset-button" style="margin-bottom: 10px;">Reset Filters</button>
            </form>
        </div>
        </div>

        <div class="products">
            <?php
        if($cat!=0){
    $query = "SELECT * FROM `products` where category='$cat';";}
    else{
        $query = "SELECT * FROM `products`;";
    }
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="devmain">
            <a href="<?php echo $row['plink'];?>"><img src='images/<?php echo $row['location']; ?>' alt="image" style="width: 100%"></a>

            <div>
                <center><span><?php echo $row['name']; ?><br>
                        Price:<?php echo $row['price']; ?></span></center>
            </div>
        </div>
    <?php
    }
    ?>
</div>

    </div>

<center>
    <div>
        <canvas id="canvas1" width="200" height="100"></canvas>
    </div>
</center>   


    <script src="navigation.js" defer></script>
    <script>
        const canvas = document.getElementById("canvas1");
        const ctx = canvas.getContext("2d");
        ctx.fillStyle = "Green";

    ctx.font = "30px Arial";
    ctx.fillText("SAVE EARTH", 10, 50);
    </script>

</body>

</html>
