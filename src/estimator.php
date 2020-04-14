<?php

    $data = array('name' => 'Africa', 
                  'aveAge' => 19.7,
                  'aveDailyIncomeInUSD' => 5,
                  'aveDailyIncomePopulation' => 0.71,
                  'periodtype' => "days",
                  'timeToElapse' => 58,
                  'reportedCases' => 674,
                  'population' => 66622705,
                  'totalHospitalBeds' => 1380614
                
                  );


      echo 'data : {<br><br>';

                foreach($data as $x => $x_value)
                {
                    
                  echo $x.'  :   '.$x_value.'<br>';
                  
                  echo '<br>';

        }
        echo '<br>}<br>';



function covid19ImpactEstimator()
{


    $data = array('name' => 'Africa', 
                  'aveAge' => 19.7,
                  'aveDailyIncomeInUSD' => 5,
                  'aveDailyIncomePopulation' => 0.71,
                  'periodtype' => "days",
                  'timeToElapse' => 58,
                  'reportedCases' => 674,
                  'population' => 66622705,
                  'totalHospitalBeds' => 1380614
                
                  );

    //impact

    $impactcurrentlyInfected = $data['reportedCases'] * 10;
    $a = $data['timeToElapse']/3;
    $function = floor($a);
    $impactinfectionsByRequest = $impactcurrentlyInfected * pow(2,$function);
    $impactsevereCasesByRequestedTime = 0.15 * $impactinfectionsByRequest;
    $impacthospitalBedsRequestedTime= (($data['totalHospitalBeds'] * 0.35) - $impactsevereCasesByRequestedTime);
    $impactcasesForICUByRequestedTime = 0.05 * $impactinfectionsByRequest;
    $impactcasesForVentilatorsByRequestedTime = 0.02 * $impactinfectionsByRequest;
    $impactDollarsInflight = $impactinfectionsByRequest * $data['aveDailyIncomePopulation'] * $data['aveDailyIncomeInUSD'] * $data['timeToElapse'];


    //severeImpact

    $severeImpactcurrentlyInfected = $data['reportedCases'] * 50;
    $severeImpactinfectionsByRequest = $severeImpactcurrentlyInfected * pow(2,$function);
    $severeImpactsevereCasesByRequestedTime = 0.15 * $severeImpactinfectionsByRequest;
    $severeImpacthospitalBedsRequestedTime= (($data['totalHospitalBeds'] * 0.35) - $severeImpactsevereCasesByRequestedTime);
    $severeImpactcasesForICUByRequestedTime = 0.05 * $severeImpactinfectionsByRequest;
    $severeImpactcasesForVentilatorsByRequestedTime = 0.02 * $severeImpactinfectionsByRequest;
    $severeImpactDollarsInflight = $severeImpactinfectionsByRequest * $data['aveDailyIncomePopulation'] * $data['aveDailyIncomeInUSD'] *  $data['timeToElapse'];
    

                    $arrangement = array(0 => array('currentlyInfected',
                                                    'infectionsByRequest',
                                                    'severeCasesByRequestedTime',
                                                    'hospitalBedsRequestedTime',
                                                    'casesForICUByRequestedTime',
                                                    'casesForVentilatorsByRequestedTime',
                                                    'DollarsInflight'),
                                          1 => array($impactcurrentlyInfected,
                                                    $impactinfectionsByRequest,
                                                    $impactsevereCasesByRequestedTime,
                                                    $impacthospitalBedsRequestedTime,
                                                    $impactcasesForICUByRequestedTime,
                                                    $impactcasesForVentilatorsByRequestedTime,
                                                    $impactDollarsInflight),
                                          2 => array($severeImpactcurrentlyInfected,
                                                    $severeImpactinfectionsByRequest,
                                                    $severeImpactsevereCasesByRequestedTime,
                                                    $severeImpacthospitalBedsRequestedTime,
                                                    $severeImpactcasesForICUByRequestedTime,
                                                    $severeImpactcasesForVentilatorsByRequestedTime,
                                                    $severeImpactDollarsInflight));

       

        
                    echo "<br>impact : { <br>";

                              for ($i=0; $i < 7; $i++) 

                              { 
            
                                  echo '<br>'.$arrangement[0][$i].' : '.intval($arrangement[1][$i]).'<br>';
            
                              }
            
                    echo " <br>}<br>";
            
                    echo "<br>severeImpact : { <br>";

                                for ($i=0; $i < 7; $i++) 
                                
                                { 

                                      echo "<br>".$arrangement[0][$i].' : '.intval($arrangement[2][$i])."<br>";

                                }

                    echo "<br>}";
      
}

covid19ImpactEstimator();



?>