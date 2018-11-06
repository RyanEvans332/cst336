<?php
    
    $backgroundImage = "img/sea.jpg";
    
    // API call goes here
    include 'api/pixabayAPI.php';
    if(isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        
        if($keyword != ''){
            $imageURLs = getImageURLs($_GET['keyword']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        
        }else{
            $category = $_GET['category'];
            
            if($category != ''){
                $imageURLs = getImageURLs($_GET['category']);
                $backgroundImage = $imageURLs[array_rand($imageURLs)];
            }
        }
    }
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url(<?=$backgroundImage ?>);
            }
        </style>
    </head>
    <body>
        <br />
        <form>
            <input id="roundCorners" type="text" name="keyword" placeholder="Keyword" value=""/> <!-- <?=$_GET['keyword']?>"/> -->
                    <input type="radio" id="lhorizontal" value="horizontal">
                    <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
                    <br />
                    <input type="radio" id="lvertical" value="vertical">
                    <label for="Vertical"></label><label for="lvertical">Vertical</label>
                    <select name="category">
                        <option value="">Select One</option>
                        <option value="ocean">Sea</option>
                        <option value="forest">Forest</option>
                        <option value="mountain">Mountain</option>
                        <option value="snow">Snow</option>
                    </select>
                    <br />
                    <input type="submit" value="Submit" />
            </div>
        </form>
        
        <br />
        
        <?php 
            if(!isset($imageURLs)){
                echo "<h2>Type a keyword or select a category to display a slideshow <br /> with random images from Pixabay.com </h2>";
            }
            else {
                // Display Carousel Here
        ?>
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++){
                        echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'";
                        echo ($i == 0)?" class='active'": "";
                        echo "></li>\r\n";
                    }
                ?>
            </ol>
            
            <!-- Wrapper for Images -->
            <div class="carousel-inner">
        <?php 
            for ($i = 0; $i < 7; $i++){
                do{
                    $randomIndex = rand(0, count($imageURLs));
                }while(!isset($imageURLs[$randomIndex]));
                
                echo '<div class="carousel-item';
                echo ($i == 0)?" active": "";
                echo '">';
                echo '<img class="d-block w-100" src="' . $imageURLs[$randomIndex] . '">';
                echo "<div class='carousel-caption'></div>";
                echo '</div>';
                unset($imageURLs[$randomIndex]);
            }
        ?>
            </div>
            
            <!-- Controls Here -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
</a>
        </div>
        <?php
            }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>