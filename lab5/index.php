<?php

include 'dbConnection.php';

$conn = getDatabaseConnection("heroku_488940c3db99adf");


function displayCategories(){
    global $conn;
    
    $sql = "SELECT catId, catName from om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //Print_r records can be used to view the records as raw data
    
    foreach($records as $record){
        
        echo "<option value'".$record["catId"]."' >" . $record["catName"] . "</option>";
    }
}
    
?>

<html>
    
    <head>
        <title> OtterMart Product Search</title>
        <link href="css/styles.css" rel="stylesheet" type"text/css">
    </head>
    <body>
        
        <div>
            <h1> OtterMart Product Search</h1>
            <form>
                
                Product: <input type="text" name="product"/>
                <br/>
                Category:
                <select name="category">
                    <option value ="">Select One</option>
                    <?=displayCategories()?>
                </select>
                <br/>
                Price: From <input type="text" name="priceFrom" size="7"/>
                       To   <input type="text" name"priceTo" size="7"/>
                <br>
                Order result by:
                <br>
                
                <input type="radio" name="orderBy" value="price"/> Price <br/>
                <input type="radio" name="orderBy" value="name"/> Name
                
                <br/><br/>
                <input type ="submit" value="Search" name="searchForm">
            </form>
            <br/>
            
            </div>
            
            <hr>
            
    </body>
    
</html>