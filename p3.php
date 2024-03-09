<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true){
    
    echo "<html><head></head><body><script>alert('Please login first');</script></body></html>";
    header("location: index.html");
    exit;
}
$server="localhost";
$username="root";
$password="";
$database="pr1";
$conn= mysqli_connect($server,$username,$password,$database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
$pid=3;

$query = "SELECT * FROM `products` where id=$pid";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="navigation.css">
    <link rel="icon" href="images/GREEN THREADS.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Skranji&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">  
    <link rel="icon" href="images/GREEN THREADS.png">
    <title>Item page</title>
    <style>
        
        label {
          margin-bottom: 8px;
        }
    
       
        input[type="radio"] {
          display: none; 
        }
    
        label.size-label {
          display: inline-block;
          border: 2px solid #c1a780;
          padding: 8px;
          margin-right: 10px;
          cursor: pointer;
        }
    
       
        input[type="radio"]:checked + label.size-label {
          background-color: #c1a780;
          color: white;
        }

        td{text-align: center;}
      </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <div class="cont1">
                <li class="logo"><img src="images/GREEN THREADS.png" alt="brandlogo" style="height: 100%;border-radius: 20px;"></li>
                <li class="home"><a href="home.php">Home</a></li>
            </div>
        </ul>
    <div class="search_box">
            <form action="#" method="get">
                <div class="search">
                    <button class="submit_search" id = "submit_button" type="submit"><span class="material-symbols-outlined">search</span></button>
                    <input class="searchForm" id="searchForm" type="text" placeholder="Search" style = "color:black;" autocomplete="off">
                </div>
            </form>
    </div>
        <ul style="padding-left: 0;max-width:fit-content;">
            <div class="cont2">
                <li class="home"><a href="Aboutus.html">About</a></li>
                <li class="team"><a href="contactus.html">Contact</a></li>
                <li class="home"><a href="#"><img src="images/ins.png" alt="insta" style="height: 3vh;"></a></li>
                <li class="team"><a href="#"><img src="images/x.png" alt="twitter" style="height:3vh;"></a></li>
                <li class="home"><a href="#"><img src="images/fb.png" alt="facebook" style="height: 3vh;"></a></li>
            </div>
        </ul>
    </div>
    <header style="background-color:grey;font-size:30px;"><center>Welcome <?php echo $_SESSION["username"] ?></center> </header>
    <div style="display: flex;justify-content: center;align-items: center;">
    <div class="main-cnt">
        <div  class="pi">
            <img src="images/<?php echo $row['location']?>" alt="Image" style="width:100%;height: 100%;">
        </div>
        <div class="right">
            <div class="pn">
                <h1 style="text-align: center;">Designer Kurta</h1>
            </div>
            <div class="pd"> 
                <span style="font-size:1rem;margin-right: 2vb;"><s style="height: 50;">&#8377;9999</s></span><span style="font-size: 2rem;">&#8377;9000</span>
                <div>
                <label for="color">COLOR:</label>
                <select name="color" id="color">
                    <option value="Red">BLACK</option>
                    <option value="Green">GREEN</option>
                </select>
                </div>
                <div style="margin-top: 2vh;" class="size">
                    <span style="margin-top: 1VH;margin-right:2px">SIZE:</span>
                    <label>
                        <input type="radio" id="small" name="size" value="small">
                        <label for="small" class="size-label">S</label>
                      </label>
                  
                      <label>
                        <input type="radio" id="medium" name="size" value="medium">
                        <label for="medium" class="size-label">M</label>
                      </label>
                  
                      <label>
                        <input type="radio" id="large" name="size" value="large">
                        <label for="large" class="size-label">L</label>
                      </label>
                  
                      <label>
                        <input type="radio" id="xlarge" name="size" value="xlarge">
                        <label for="xlarge" class="size-label">XL</label>
                      </label>
                  
                </div>
               
                <div class="desc" style="text-align: left;">
                    <span style="text-align:left;">
                    <?php 
                        echo $row["dsc"];
                    ?>
                
                <div class="btns">
                    <center>
                <button class="btn2" style="margin-top:20px">Add to Cart</button>
                </center>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    <div>
        <center>
        <table><tr><th>Size</th><th>Length(in inches)</th></tr>
        <tr><td>XS</td><td>26</td></tr>
        <tr><td>S</td><td>27</td></tr>
        <tr><td>M</td><td>28</td></tr>
        <tr><td>L</td><td>29</td></tr>
        <tr><td>XL</td><td>30</td></tr>
        </table>
        </center>
    </div>
    <script src="navigation.js" defer></script>
    
</body>
</html>