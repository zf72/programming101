<?php
$currentPage = strtolower($_SERVER['PHP_SELF']);
$pcActive = "";
$studioActive = "";
$iptActive = "";
$releasePage = (isset($_GET['pg']) ? $releasePage : "");
$studioName = (isset($studioName) ? $studioName : "");
$ticket_timestamp = "Ticket: ".date("m-d-y-H:i:s");
$contactBody = rawurlencode("\n\n\n\n If applicable please include information to help us resolve the issue you’re experiencing e.g.:\nStyle Groups_color codes:\n Look #s:\n Link to items: \nScreenshots:");
if (strpos($currentPage,'studiooverview') !== false || strpos($currentPage,'setdetail') !== false || strpos($currentPage,'historysearch') !== false) { $studioActive = "active";}
if (strpos($currentPage,'iptoverview') !== false || strpos($currentPage,'iptdetail') !== false) {$iptActive = "active";}

?>		<div class="page-sidebar-wrapper">
		  <div class="page-sidebar navbar-collapse collapse">
	         <!-- BEGIN SIDEBAR MENU -->
	         <ul class="page-sidebar-menu">
	            <li>
	               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	               <div class="sidebar-toggler hidden-phone"></div>
	               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	            </li>
	            <!--<li class="start ">
	               <a href="index.html">
	               <i class="fa fa-home"></i>
	               <span class="title">Dashboard</span>
	               </a>
	            </li> -->
	            <li <?php if (strpos($currentPage,'samsearch') !== false){ print "class='active'";}?>>
	               <a href="samsearch.php">
	               <i class="fa fa-search"></i>
	               <span class="title">SAM Search</span>
	               <span class="selected"></span>
	               </a>
	            </li>
	            <li class="<?php print $studioActive;?>">
	               <a href="javascript:;">
	               <i class="fa fa-camera"></i>
	               <span class="title">Studio</span>
	               <span class="selected"></span>
	               <span class="arrow <?php if ($studioActive){print "open";}?>"></span>
	               </a>
	               <ul class="sub-menu">
	               	  <li <?php if (strpos($currentPage,'studiooverview') !== false && $studioName == ""){ print "class='active'";}?>>
	                     <a href="studioOverview.php">
							 Overview</a>
	                  </li>
	                  <li <?php if ($studioName == "Georgetown" && strpos($currentPage,'studiooverview') !== false){ print "class='active'";}?>>
	                     <a href="studioOverview.php?studio=Georgetown">
							 Georgetown</a>
	                  </li>
	                  <li <?php if ($studioName == "SODO" && strpos($currentPage,'studiooverview') !== false){ print "class='active'";}?>>
	                     <a href="studioOverview.php?studio=SODO">
	                     SODO</a>
	                  </li>
	                  <li <?php if ($studioName == "Studio C" && strpos($currentPage,'studiooverview') !== false){ print "class='active'";}?>>
	                     <a href="studioOverview.php?studio=Studio C">
	                     Studio C</a>
	                  </li>
	                  <li <?php if ($studioName == "New York" && strpos($currentPage,'studiooverview') !== false){ print "class='active'";}?>>
	                     <a href="studioOverview.php?studio=New York">
	                     New York</a>
	                  </li>
	                  <li>
	                     <a href="imageReview.php">
	                     Image Review</a>
	                  </li>
	                  <li <?php if (strpos($currentPage,'historysearch') !== false){ print "class='active'";}?>>
	                     <a href="historySearch.php">
	                     History Search</a>
	                  </li>
	               </ul>
	            </li>
              <li class="<?php print $iptActive;?>">
                 <a href="javascript:;">
                 <i class="fa fa-crop"></i>
                 <span class="title">IPT</span>
                 <span class="selected"></span>
                 <span class="arrow <?php if ($iptActive){print "open";}?>"></span>
                 </a>
                 <ul class="sub-menu">
                 	  <li <?php if (strpos($currentPage,'iptoverview') !== false && $studioName == ""){ print "class='active'";}?>>
                       <a href="iptOverview.php">
  						 Overview</a>
                    </li>
                    <li <?php if ($studioName == "Seattle IPT" && strpos($currentPage,'iptoverview') !== false){ print "class='active'";}?>>
                       <a href="iptOverview.php?studio=Seattle IPT">
  						 Seattle IPT Combined</a>
                    </li>
                    <li <?php if ($studioName == "Georgetown" && strpos($currentPage,'iptoverview') !== false){ print "class='active'";}?>>
                       <a href="iptOverview.php?studio=Georgetown">
  						 Georgetown</a>
                    </li>
                    <li <?php if ($studioName == "SODO" && strpos($currentPage,'iptoverview') !== false){ print "class='active'";}?>>
                       <a href="iptOverview.php?studio=SODO">
                       SODO</a>
                    </li>
                    <li <?php if ($studioName == "Studio C" && strpos($currentPage,'iptoverview') !== false){ print "class='active'";}?>>
                       <a href="iptOverview.php?studio=Studio C">
                       Studio C</a>
                    </li>

                    <li>
                       <a href="imageReview.php">
                       Image Review</a>
                    </li>
                 </ul>
              </li>
	            <!-- <li class="<?php print $pcActive;?>">
	               <a href="" target="_blank">
	               <i class="fa fa-random"></i>
	               <span class="title">Product Coordination</span>
				   <span class="arrow <?php if ($pcActive){print "open";}?>"></span>
	               </a>
	               <ul class="sub-menu">

	                  <li >
	                     <a href="#">
	                     <span class="badge badge-roundless badge-default">coming soon</span>Look Quotas</a>
	                  </li>
	               </ul>
	            </li> -->
              <li <?php if (strpos($currentPage,'imagereview') !== false){ print "class='active'";}?>>
                 <a href="imageReview.php">
                 <i class="fa fa-picture-o"></i>
                 <span class="title">Image Review</span>
  			   				</a>
              </li>
              <li <?php if (strpos($currentPage,'reporting') !== false){ print "class='active'";}?>>
                 <a href="reporting.php">
                 <i class="fa fa-bar-chart-o"></i>
                 <span class="title">Reporting</span>
  			   				</a>
              </li>
              <li <?php if (strpos($currentPage,'dashboard') !== false || strpos($currentPage,'vendor') !== false){ print "class='active'";}?>>
                 <a href="dashboard.php">
                     <i class="fa fa-upload"></i>
                     <span class="title">Vendor Images</span>
                     <span class="badge badge-roundless badge-danger">New</span>
                  </a>
              </li>
	            <!--
	            <li class="">
	               <a href="javascript:;">
	               <i class="fa fa-shopping-cart"></i>
	               <span class="title">Site Coordination</span>
			   	   </a>
	            </li>
	            <li class="">
	               <a href="javascript:;">
	               <i class="fa fa-align-center"></i>
	               <span class="title">Copy</span>
				   </a>
	            </li>
	            <li class="">
	               <a href="javascript:;">
	               <i class="fa fa-usd"></i>
	               <span class="title">Finance</span>
				   </a>
	            </li>
	            <li class="">
	               <a href="javascript:;">
	               <i class="fa fa-gift"></i>
	               <span class="title">Buyers</span>
	   			   </a>
	            </li>
							-->
             <li class="<?php if ($releasePage != ""){print "active";}?>">
                <a href="javascript:;">
                <i class="fa fa-info-circle "></i>
                <span class="title">Release Notes</span>
                <span class="arrow <?php if ($releasePage != ""){print "open";}?>"></span>
              </a>
               <ul class="sub-menu">
               	  <li <?php if ($releasePage == "web"){ print "class='active'";}?>>
                     <a href="releaseNotes.php?pg=web">
						 SAM Web</a>
                  </li>
                  <li <?php if ($releasePage == "app"){ print "class='active'";}?>>
                     <a href="releaseNotes.php?pg=app">
						 SAM Application</a>
                  </li>
               </ul>
    			   </a>
             </li>

             <li <?php if (strpos($currentPage,'help') !== false){ print "class='active'";}?>>
                <a href="help.php">
                <i class="fa fa-question"></i>
                <span class="title">Help</span>
 			   				</a>
             </li>

			<!-- AARON'S CODE FOR CHECKING CURRENT PAGE AND ROUTING TO CORRESPONDING HELP PAGE -->

			<?php
				// Need to add the following
				$queryString = strtolower($_SERVER['QUERY_STRING']);
				$status = (isset($_GET['status'])) ? $_GET['status'] : "";
				$currentPageParts = explode('/' , $currentPage);

				$helpLink = "";

				switch(end($currentPageParts)) {
				// Using strtolower on each value to integrate seamlessly with established page logic for $currentPage
					case strtolower('studioOverview.php'):
						switch($studioName) {
							case strtolower('Georgetown'): //is this the best way to call the studios
								$helpLink = 'help.php?section=Studio%20Dashboard&title=Individual%20Studio';
								break;
							default:
								$helpLink = 'help.php?section=Studio%20Dashboard&title=Studio%20Overview';
								break;
						}
						break;
					case strtolower('setdetail.php'):
						$helpLink = 'help.php?section=Studio%20Dashboard&title=Set%20Detail';
						break;
					case strtolower('iptOverview.php'):
						switch($studioName) {
							case strtolower('Georgetown'): //is this the best way to call the studios
								$helpLink = 'help.php?section=IPT%20Dashboard&title=Individual%20IPT';
								break;
							default:
								$helpLink = 'help.php?section=IPT%20Dashboard&title=IPT%20Overview';
								break;
						}
						break;
					case strtolower('iptdetail.php'):
						$helpLink = 'help.php?section=IPT%20Dashboard&title=IPT%20Detail';
						break;
					case strtolower('imageReview.php'):
						$helpLink = 'help.php?section=Image%20Review';
						break;
					case strtolower('reporting.php'):
						$helpLink = 'help.php?section=Reporting';
						break;
					case strtolower('dashboard.php'):
						switch($status) {
							case 'assign':
								$helpLink = "help.php?section=Vendor&title=Assigning%20Images";
								break;
							case 'pendingipt':
								$helpLink = "help.php?section=Vendor&title=IPT%20image%20review";
								break;
							case 'pendingad':
								$helpLlink = "help.php?section=Vendor";
								break;
							default:
								$helpLink = "help.php?section=Vendor&title=AD%20image%20review";
								break;
						}
						break;
					/*  =======  HASHTAGS DO NOT SEEM TO WORK IN PHP PERHAPS THE JAVASCRIPT BELOW WILL HELP
					case strtolower('dashboard.php#tabDashboard'):
						$helpLink = 'help.php?section=General";
						break;
					*/
					default:
						$helpLink = 'mailto:studioncst@exchange.nordstrom.com?subject=SAMWeb Support - <?=$ticket_timestamp?>&body=<?=$contactBody?>';
						break;
				}
			?>

			<li>
				<a id="helpContact" href="<?php echo $helpLink; ?>">
					<i class="fa fa-question"></i>
					<span class="title">Contact Us</span> <!-- RENAME 'CONTACT US' TO SOMETHING LIKE "HELP & CONTACT" -->
				</a>
			</li>

			<script>
				var pathArray = window.location.pathname.split( '/' );
				var currentPage = pathArray[pathArray.length-1];

				switch (currentPage) {
					case 'dashboard.php':
						var hash = window.location.hash,
							a = document.getElementById('help'), // document.getElementById('help');
							helpLink = "mailto:studioncst@exchange.nordstrom.com?subject=SAMWeb Support - <?=$ticket_timestamp?>&body=<?=$contactBody?>";
						switch (hash) {
							case '#tabDashboard':
								helpLink = "help.php?section=General";
								break;
							default:
								// is a link needed here
								break;
						}
						break;
					default:

						break;
					}

				a.href = helpLink;
			</script>


	         </ul>
	         <!-- END SIDEBAR MENU -->
	      </div>
	    </div>