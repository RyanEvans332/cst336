<!DOCTYPE html>
<?php
include 'inc/functions.php';
?>
<html>
    <head>
        <title> e - the mathematical constant </title>
        <style>
            @import url("css/styles.css")
        </style>
    </head>
    <body>
    <header>
        <h1>e - the mathematical constant</h1>
    </header>
        <main>
            <hr>
            <img class = "picture" src ="img/eulers-number.png" alt="e"/>
            <div class="mainText">
                <p>The number <span class ="e">e</span> is one of the famous constants in math that help us do important calculations.</p>
                <p>along with &pi;, it's irrational and transcendental. </p>
                <p>This means that <span class ="e">e</span> is not considered to be part of the real number system, it cannot be written as a ratio of two other integers, and it cannot be solved for algebraically assuming we only use integers.</p>
                <p>The first handful of digits are:</p>
                </div>
            <div id="subtext">
                <b>2.718281828459045235360</b>
            </div>
            <br/>
            <hr>
            <h2>What is it used for?</h2>
            <figure>
                <img src="img/graph.gif"/>
                <figcaption>A graph of <span class ="e">e</span> to the x power</figcaption>
            </figure>

            
            <div class="mainText">
                <span class ="e">e</span> was first discovered and studied by Leonhard Euler in the 1700's, hence it being named after his second initial. It is a number that can be used as the base of an exponential function to predict exponential growth/decay with remarkable accuracy.
                    <span id ="list">
                        <p>&bull;<span class ="e">e</span> is used in compound interest calculations</p>
                        <p>&bull;<span class ="e">e</span> shows up in problems regarding probability and distribution of primes</p>
                        <p>&bull;<span class ="e">e</span> is used in some calculus problems since it's incredibly simple to work with in integration/differentiation.</p>
                        <p>&bull;<span class ="e">e</span> is applied in the sciences to calculate the rate of bacteria colony growth</p>
                        <p>&bull;<span class ="e">e</span> is used in Newton's cooling formula to predict the rate at which the temperature of something will reach the ambient temperature.</p>
                    </span>
                </div>
                <br/><br/><hr><h2>How can we calculate it?</h2>
                <div class="mainText">
                    I mentioned earlier that <span class ="e">e</span> is irrational and transcendental. <span class ="e">e</span> cannot be conjured up exactly by using algebraic methods; however, <span class ="e">e</span> can be approximated to varying degrees of accuracy. I found a <a href="https://www.reddit.com/r/math/comments/79jdy1/pick_a_uniformly_random_number_in_01_and_repeat/">Reddit thread</a>
 that gives us an interesting way to approximate <span class ="e">e</span>. The thread states:<span id="center"><p> "Pick a uniformly random number in [0,1] and repeat until the sum of the numbers picked is >1. You'll on average pick e ~ 2.718... numbers!" </p></span>
 <p>I did this. 250,000 times. Actually, <i>I just did this right now. In your very web browser.</i></p>
                    </div>
            <span id="econstant">
                    <?php
                    echo tolerence();
                    ?>
            </span>
            <form>
                <input type="submit" value = "Generate a new value!"/>
            </form>
            <br/>
            <hr>
            <div class="mainText">
                Okay, so it's not perfect by a long shot, and there are certainly better ways to approximate <span class ="e">e</span>--but this was just a fun little thing for me to test. Not to mention, I actually cheated a little bit. The code that just ran moments
                 ago on the server hosting this website will throw away approximations that are too far off from a certain error range I specified. But--for a silly way to approximate an irrational, transcendental number with numerical/iterative methods, it still isn't bad.
            </div>
        </main>
        <footer><br/><br/><br/>
                        CST336. 2017&copy; Tashiro-Evans<br/>
            <strong>Disclaimer:</strong> The information in this webpage is <i>not</i> fictitious. <br />
            It is to be used for academic purposes only. <br/>
            <a href="mailto:rtashiro-evans@csumb.edu">Contact me.</a><br/>
            <img src="img/csumb_otter.png" alt="CSUMB otter logo"/>
        </footer>
    </body>
</html>