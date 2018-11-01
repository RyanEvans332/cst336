<?php
function generate_e() {
    $testnumber = 0; /*gets rndnum added to it until it's >= 1*/
    $iterator = 0; /*increments while testnumber not reached 1*/
    $avgs = array();
    /*upon many iterations, the average values stored to avgs should approach the
    transcendental number 'e'*/
    for ($x = 0; $x <= 250000; $x++){
        
        while(true){
            if ($testnumber <= 1){
                $rndnum = (rand(0, 10000)/10000);
                $testnumber += $rndnum;
                $iterator += 1;
            }
            else{
                array_push($avgs, $iterator);
                $testnumber = 0;
                $rndnum = 0;
                $iterator = 0;
                break;
            }
        }
    }
    return array_sum($avgs)/count($avgs);
}


function tolerence(){/*makes sure 'e' generated is within a certain error range*/
    while(true){
        $test_e = generate_e();
        if (abs($test_e - 2.71828) <= .01){
            return $test_e;
        }
    }
}
?>