<?php

//take care of cookie generation
function generateForm(){
    echo $_POST[removetask];
        $amount = 7; //amount of task panels to add
        if(isset($_POST[submitted])){
         for ($t=1; $t<$amount; $t++){   
            setcookie('textbox'.$t, $_POST['textbox'.$t] , time() + (86400 * 30));
            setcookie('checkbox'.$t, $_POST['checkbox'.$t]);
            //echo $_POST['checkbox'.$t];
            }
         }
        if(isset($_POST[removetask])){//delete cookie when remove button is pressed
            setcookie('textbox'.$_POST[removetask],"", time() - 3600);
            setcookie('checkbox'.$_POST[removetask],"", time() - 3600);
            //echo $_POST[removetask];
            //echo "hi";
        }
        echo "<div id='form'>";
    echo "<form method ='post'>";
    echo "<table><tr><td></td><td>Task</td><td>Completion</td></tr>";
        for ($i=1; $i<$amount; $i++){//TODO: add if statement to check if the thing has been set already as a cookie, if not, use current
                if($_POST[removetask] == $i){
                    $name ='';
                    $checked='';
                    goto cookiedeleted;
                }
                $name = isset($_POST['textbox'.$i]) ? $_POST['textbox'.$i] :$_COOKIE['textbox'.$i];//cookies cant be used if they were just set. So we use the value of the post request instead for now
                $checked = isset($_POST['checkbox'.$i]) ? $_POST['checkbox'.$i] :$_COOKIE['checkbox'.$i]; //[${'checkbox'.$i}];
                cookiedeleted:
                if($checked == 'on'){
                    $checkactive = "checked";
                }   
                echo "<tr>
            <td>Task #$i:</td>
            <td><input type='text' name ='textbox$i' value ='$name' size = '35'></td>
            <td><input type ='hidden' name ='checkbox$i' value ='off'><input type='checkbox' name ='checkbox$i' $checkactive></td>
            <td><button class='btn btn-danger' name ='removetask' value ='$i'>Remove</button></td>
            </tr>";
            $checkactive ='';
            }
        
        echo '<input type="hidden" name ="submitted" value = "1">';
        echo '<input class="btn btn-success" type="submit"></form></div>';
}

?>
<html>
    <meta charset="UTF-8">
        <head>
            <title>To-do list</title>
            
            <link href="css/styles.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            
            <!-- Yeah, I know, in-line styles are a big no-no. But unfortunately, I can't get the bootstrap stylesheet and my stylesheet to play nice with eachother so I gotta separate them and put each of them in time out for 5 minutes so they can think about what they've done -->
            <style>
            h1{
            margin: auto;
            color: gold;
            text-align: center;
            }

            body{
                background-color: #5792f2;
            }

            #form{
                margin: 0 auto;
                 width: 29%; 
                 border: 2px solid black;
                 border-radius: 5px;
                 background: #e8d547;
            }
            
            .btn-success{
                position:absolute;
                top:32%;
                left: 48%;
            }
            
            td{
                text-align:center;
            }
            
            tr{
                height:35px;
            }
            
            .information{
                position:absolute;
                top:50%;
                left: 27%;
                border: 2px solid black;
                border-radius: 5px;
                background: white;
                padding: 5px;
            }
            
            .emphasis{
                font-style: italic;
                font-weight: bold;
            }
            
            footer{
                position:absolute;
                top:72%;
                left: 41%;
                text-align:center;
                font-size: .92em;
            }
            
            img{
                border:2px solid black;
            }
            </style>
        </head>
    
    
    
    
    <body>
        <h1>To-Do list</h1>
        <?= generateForm(); ?>
        <div class='information'>
            <h2>What is this?</h2>
            <p>This is a cookie-enabled To-Do list written by Ryan Tashiro-Evans.</p>
            <p>You can write tasks and track the completion status into this webpage and they will stay here even if you leave the page and come back later.</p>
            <p>To remove tasks individually you can just hit the red 'remove' button next to the respective task</p>
            <p>I highly recommend you remove all the tasks individually or clear this webpage's session when you are done toying around with it.</p>
            <span class="emphasis"><p>The cookies will remain saved to your computer for a few days or so otherwise.</p></span>
        </div>
        <footer><br/><br/><br/>
                        CST336. 2018&copy; Tashiro-Evans<br/>
            <strong>Disclaimer:</strong> The information in this webpage is <i>not</i> fictitious. <br />
            It is to be used for academic purposes only. <br/>
            <a href="mailto:rtashiro-evans@csumb.edu">Contact me.</a><br/>
            <img src="img/csumb_otter.png" alt="CSUMB otter logo"/>
        </footer>
    </body>
</html>