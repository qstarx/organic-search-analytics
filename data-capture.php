<?php $titleTag = "Data Capture | Organic Search Analytics"; ?>

<?php include_once('inc/html/_head.php'); ?>

	<h1>Organic Search Analytics | Capture Data</h1>

	<h2>Google Search Console</h2>
	<hr>
	<h3>Search Analytics</h3>
	<p>Dates with no data in the database:</p>
	<?php
		//$domains = array("www.luggagepros.com/");

		$domains = $mysql->getSettings("sites_google", "1");

		foreach( $domains as $domain => $values ) {
			echo '<ul><li>'.$domain.'</li>';
			$googleSearchAnalyticsDates = $dataCapture->checkNeededDataGoogleSearchAnalytics($domain);
		
			if( count( $googleSearchAnalyticsDates['datesWithNoData'] ) > 0 ) {

				echo '<ul id="googleSearchAnalytics">';
					foreach( $googleSearchAnalyticsDates['datesWithNoData'] as $date ) {
						echo '<li domain="'.$domain.'" date="'.$date.'"><div class="button" onclick="ajaxScript(\'googleSearchAnalytics\', \'data-capture-run.php\', \''.$domain.'\', \''.$date.'\', \'postGoogleSearchAnalyticsAjax\')">Import data for: ' . $date . ' ></div></li>'."\n";
					}
				echo "</ul>";
			} else {
				echo "<p>The database is up to date.</p>";
			}
			echo '</ul>';
		}
		
	?>
	<hr>

<?php include_once('inc/html/_foot.php'); ?>