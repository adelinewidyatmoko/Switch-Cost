<?php //FORM DYNAMIC

if ($sisi= isset($_GET["anggrek"]) && isset($_GET["kamboja"]) && isset($_GET["lotus"]) ) {
    $anggrekStreet = $_GET["anggrek"]; //so this is where the value assigned to the variables 
    $kambojaStreet = $_GET["kamboja"];//-,-
    $lotusStreet = $_GET["lotus"]; //-
   
}else {
    $anggrekStreet = 0; //so this is where the value assigned to the variables 
    $kambojaStreet = 0;
    $lotusStreet = 0 ;
  
}
 
echo "<br>";
$length = isset($_GET['unit']);//supaya tidak warning pakai isset()
switch ($length) {
    case 'KM':
        $jalanAnggrek = $anggrekStreet * 1000;
        $jalanKamboja = $kambojaStreet * 1000;
        $jalanLotus = $lotusStreet * 1000;
        break;
    case 'CM':
        $jalanAnggrek = $anggrekStreet / 100;
        $jalanKamboja = $kambojaStreet / 100;
        $jalanLotus = $lotusStreet / 100;
        break;
    case 'M':
        $jalanAnggrek = $anggrekStreet ;
        $jalanKamboja = $kambojaStreet ;
        $jalanLotus = $lotusStreet ;
    break;
    
}
//I FOUND THE SOLVED WARNINGS !! 
if(isset($jalanAnggrek) && isset($jalanKamboja) && isset($jalanLotus)){
    $jalanAnggrek;
    $jalanKamboja;
    $jalanLotus;
}else{
    $jalanAnggrek = 0;
    $jalanKamboja = 0;
    $jalanLotus = 0;
} 


$materialCost = 15000;
$workFee = 650;

$totalStreetLength = $jalanAnggrek + $jalanKamboja + $jalanLotus;//6000
$totalMaterial =  $totalStreetLength * $materialCost;//90000000
$totalWork = $totalStreetLength * $workFee; //3900000
$totalAll = $totalWork + $totalMaterial;//

//I FOUND NOTHER SOLUTION WITH CONDITION
$length = isset($_GET['checks']);
if ($sisi && $length) {
   $status = "The project will be implementing soon !";
   $status1 = " To carry out road repairs with a total length of ". $totalStreetLength." meters, 
   Perumahan Graha Sentosa must prepare a total cost of Rp". $totalAll.".";
   $color = "green";
}elseif ($sisi && !$length) {
    $status = "The project implementations will be postponed until funds are available.";
    $status1 = " To carry out road repairs with a total length of ". $totalStreetLength." meters, 
    Perumahan Graha Sentosa must prepare a total cost of Rp". $totalAll.".";
    $color = "red";
}
else{
    $status = "-";
    $status1 = "unspecified";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesw.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Dynamic Form</title>
</head>
<body>
<br>
<h1 class="dynamic">Dynamic Calculation</h1>
<section>
    <div class="back">
    <div class="form">
    
    <div class="header">
    <form  action="" method="GET">
        <label for="units"><b>Select Units Length:</b>
        <select class="select" name="unit" id="units">
            <option value="KM">Km</option>
            <option value="CM">Cm</option>
            <option value="M">M</option>
        </select>

        </label>
        <br>
        <label for="jalan Anggrek"><b>Anggrek street (KM)</b> </label>
        <input class="input1" type = "number"  step="0.05" name="anggrek" id="anggrek">
        <br>
        <label for="jalan kamboja"><b>Kamboja Street (M)</b> </label>
        <input class="input2" type = "number"  step = "0.05" name="kamboja" id="kamboja">
        <br>
        <label for = "jalan lotus"><b>Lotus Street (CM)</b></label>
        <input class="input3" type ="number"  step= "0.025"name="lotus" id="lotus">
        <div class="low">
        <label for="check">IS THE CASH READY ? 
            <input type="checkbox"name="checks" id="checks">
        </label>
        </div>
        <button class="button" type="submit">Count</button>
        
        
    </form>

</div>

<div class="desc">
    <p><b>Description</b> : <?=$status1?></p> 

    <p><b>Project status</b> : <span style="color:<?=$color?>"><?=$status?></span></p>
</div>
</div>
</div>
</section>
</body>
</html>
