<div id="space-bar">
	<h2>Buy Credits</h2>
</div>
<br>
<?php

	if(!isset($_SESSION['username'])){
		Header("Location: index.php?site=login");
	}


	if(isset($_POST['submit'])){
		die($_POST['calcolato']);
	}
?>
<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>

<script src="js/smartslider.js" type="text/javascript"></script>

<link href="smartslider.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    $(document).ready(function() {
        $('#trackbar1').strackbar({ callback: onTick1,minValue:1, maxValue: 100, defaultValue: 5, sliderHeight: 4, sliderWidth: 700, style: 'style1', animate: true, ticks: false, labels: true, trackerHeight: 20, trackerWidth: 19 });
    });
    function onTick1(value) {
        $('#text1').html("Credits: " + value);
		$('#text2').html("Price: $" + value*1 + " BTC");
		
		$('#someButton').click(function() {
			window.location.href = 'index.php?site=buy&credits='+value;
			return false;
		});


    }
</script>

				
<p>

<div style="width: 800px; float: left; padding: 20px;">
    <div style="position: relative">
        <div id="trackbar1">
        </div>
        <div id="text1" style="clear: both; width: 800px; text-align: center;">
        </div>
		<br>
		<div id="text2" style="clear: both; width: 800px; text-align: center;">
        </div>
    </div>
</div>
<br><br>
<input type="submit" class="button" value="Buy Now" id="someButton">


</p>