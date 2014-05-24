




				<!-- !!!! PHP VERSION: CURRENTLY INCOMPLETE !!!! -->

<li <?php
	$currentPage;

	switch ($currentPage){
		case "studioOverview.php":
			echo '<a href="https://samweb.nordstrom.net/help.php?section=Studio%20Dashboard&title=Studio%20Overview">';
			break;
		case "studioOverview.php":
			echo '<a href="https://samweb.nordstrom.net/help.php?section=Studio%20Dashboard&title=Studio%20Overview">';
			break;
		default:
			echo '<a href="mailto:studioncst@exchange.nordstrom.com?subject=SAMWeb Support - <?=$ticket_timestamp?>&body=<?=$contactBody?>">';
		}
	?>
>
		<i class="fa fa-envelope-o"></i>
		<span class="title">Contact Us</span>
		<span class="badge badge-roundless badge-success">New</span>
	</a>
</li>

				<!-- !!!! JavaScript VERSION !!!! -->

<li onclick="contactUs();">
	<i class="fa fa-envelope-o"></i>
	<span class="title">Contact Us</span>
	<span class="badge badge-roundless badge-success">New</span>
</li>

<script>
	function contactUs() {
	var pathArray = window.location.pathname.split( '/' );
	var currentPage = pathArray[pathArray.length-1];
	switch (currentPage){
		case "studioOverview.php":
		location.href="help.php?section=Studio%20Dashboard&title=Studio%20Overview";
		break;
		case "studioOverview.php?studio":
		location.href="help.php?section=Studio%20Dashboard&title=Individual%20Studio";
		break;
		case "setdetail.php":
		location.href="help.php?section=Studio%20Dashboard&title=Set%20Detail";
		break;
		case "iptOverview.php":
		location.href = "help.php?section=IPT%20Dashboard&title=IPT%20Overview";
		break;
		case "iptOverview.php?studio":
		location.href="help.php?section=IPT%20Dashboard&title=Individual%20IPT";
		break;
		case "iptdetail.php":
		location.href="help.php?section=IPT%20Dashboard&title=IPT%20Detail";
		break;
		case "imageReview.php":
		location.href="help.php?section=Image%20Review";
		break;
		case "reporting.php":
		location.href="help.php?section=Reporting";
		break;
		case "dashboard.php#tabDashboard":
		location.href="help.php?section=General";
		break;
		case "dashboard.php":
		location.href="help.php?section=Vendor";
		break;
		case "vendorImages.php?status=assign":
		location.href="help.php?section=Vendor&title=Assigning%20Images";
		break;
		case "vendorImages.php?status=pendingipt":
		location.href="help.php?section=Vendor&title=IPT%20image%20review";
		break;
		case "vendorImages.php?status=pendingad":
		location.href="help.php?section=Vendor&title=AD%20image%20review";
		break;
		default:
		location.href="mailto:studioncst@exchange.nordstrom.com?subject=SAMWeb Support - <?=$ticket_timestamp?>&body=<?=$contactBody?>";
	}
</script>
