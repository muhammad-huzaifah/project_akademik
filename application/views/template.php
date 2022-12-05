<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico"/>
	<title>Learn Academic | </title>

	<link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon/vendors/nprogress/nprogress.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
		  rel="stylesheet">

	<link href="https://colorlib.com/polygon/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

	<link href="https://colorlib.com/polygon/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon/build/css/custom.min.css" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<meta name="robots" content="index, nofollow">
	<script nonce="69429be2-da0f-428b-98b0-1e5c100b7e62">(function (w, d) {
			!function (cM, cN, cO, cP) {
				cM.zarazData = cM.zarazData || {};
				cM.zarazData.executed = [];
				cM.zaraz = {deferred: [], listeners: []};
				cM.zaraz.q = [];
				cM.zaraz._f = function (cQ) {
					return function () {
						var cR = Array.prototype.slice.call(arguments);
						cM.zaraz.q.push({m: cQ, a: cR})
					}
				};
				for (const cS of ["track", "set", "debug"]) cM.zaraz[cS] = cM.zaraz._f(cS);
				cM.zaraz.init = () => {
					var cT = cN.getElementsByTagName(cP)[0], cU = cN.createElement(cP),
						cV = cN.getElementsByTagName("title")[0];
					cV && (cM.zarazData.t = cN.getElementsByTagName("title")[0].text);
					cM.zarazData.x = Math.random();
					cM.zarazData.w = cM.screen.width;
					cM.zarazData.h = cM.screen.height;
					cM.zarazData.j = cM.innerHeight;
					cM.zarazData.e = cM.innerWidth;
					cM.zarazData.l = cM.location.href;
					cM.zarazData.r = cN.referrer;
					cM.zarazData.k = cM.screen.colorDepth;
					cM.zarazData.n = cN.characterSet;
					cM.zarazData.o = (new Date).getTimezoneOffset();
					if (cM.dataLayer) for (const cZ of Object.entries(Object.entries(dataLayer).reduce(((c_, da) => ({...c_[1], ...da[1]}))))) zaraz.set(cZ[0], cZ[1], {scope: "page"});
					cM.zarazData.q = [];
					for (; cM.zaraz.q.length;) {
						const db = cM.zaraz.q.shift();
						cM.zarazData.q.push(db)
					}
					cU.defer = !0;
					for (const dc of [localStorage, sessionStorage]) Object.keys(dc || {}).filter((de => de.startsWith("_zaraz_"))).forEach((dd => {
						try {
							cM.zarazData["z_" + dd.slice(7)] = JSON.parse(dc.getItem(dd))
						} catch {
							cM.zarazData["z_" + dd.slice(7)] = dc.getItem(dd)
						}
					}));
					cU.referrerPolicy = "origin";
					cU.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(cM.zarazData)));
					cT.parentNode.insertBefore(cU, cT)
				};
				["complete", "interactive"].includes(cN.readyState) ? zaraz.init() : cM.addEventListener("DOMContentLoaded", zaraz.init)
			}(w, d, 0, "script");
		})(window, document);</script>
</head>
<body class="nav-md">
<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="https://colorlib.com/polygon/gentelella/index.html" class="site_title"><i
								class="fa fa-paw"></i> <span>TK Baiturrahim</span></a>
				</div>
				<div class="clearfix"></div>

				<div class="profile clearfix">
					<div class="profile_pic">
						<img src="https://colorlib.com/polygon/gentelella/images/img.jpg" alt="..."
							 class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Welcome,</span>
						<h2>Abang Ujeb</h2>
					</div>
				</div>

				<br/>

				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<ul class="nav side-menu">
							<!--awal area menu dinamis-->

							<?php
							$main_menu = $this->db->get_where('tabel_menu', array('is_main_menu' => 0))->result();
							foreach ($main_menu as $main) {
								// check apakah ada submenu?
								$submenu = $this->db->get_where('tabel_menu', array('is_main_menu' => $main->id));
								if ($submenu->num_rows() > 0) {
									// tampilkan submenu disini
									echo "<li>
												<a href='javascript:void(0)'>
													<span class='fa fa-chevron-down'></span>
													<i class='" . $main->icon . "'></i>
													<span class='title'>" . $main->nama_menu . "</span>
													<span class='selected'></span>
												</a>
												<ul class='nav child_menu'>";
									foreach ($submenu->result() as $sub) {
										echo "<li>" . anchor($sub->link, "<i class='" . $sub->icon . "'></i>" . $sub->nama_menu) . "</li>";
									}
									echo "</ul>
										   </li>";
								} else {
									//tampilkan main menu
									echo "<li>" . anchor($main->link, "<i class='" . $main->icon . "'></i> $main->nama_menu</li>");
								}
							}
							?>

						</ul>
						<!--Akhir area menu dinamis-->
					</div>
				</div>


				<div class="sidebar-footer hidden-small">
					<a data-toggle="tooltip" data-placement="top" title="Settings">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="FullScreen">
						<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="Lock">
						<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="Logout"
					   href="https://colorlib.com/polygon/gentelella/login.html">
						<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
					</a>
				</div>

			</div>
		</div>

		<div class="top_nav">
			<div class="nav_menu">
				<div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				</div>
				<nav class="nav navbar-nav">
					<ul class=" navbar-right">
						<li class="nav-item dropdown open" style="padding-left: 15px;">
							<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
							   id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
								<img src="https://colorlib.com/polygon/gentelella/images/img.jpg" alt="">Abang Ujeb
							</a>
							<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="javascript:;"> Profile</a>
								<a class="dropdown-item" href="javascript:;">
									<span class="badge bg-red pull-right">50%</span>
									<span>Settings</span>
								</a>
								<a class="dropdown-item" href="javascript:;">Help</a>
								<a class="dropdown-item" href="https://colorlib.com/polygon/gentelella/login.html"><i
											class="fa fa-sign-out pull-right"></i> Log Out</a>
							</div>
						</li>
						<li role="presentation" class="nav-item dropdown open">
							<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
							   data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-envelope-o"></i>
								<span class="badge bg-green">6</span>
							</a>
							<ul class="dropdown-menu list-unstyled msg_list" role="menu"
								aria-labelledby="navbarDropdown1">
								<li class="nav-item">
									<a class="dropdown-item">
										<span class="image"><img
													src="https://colorlib.com/polygon/gentelella/images/img.jpg"
													alt="Profile Image"/></span>
										<span>
<span>Abang Ujeb</span>
<span class="time">3 mins ago</span>
</span>
										<span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="dropdown-item">
										<span class="image"><img
													src="https://colorlib.com/polygon/gentelella/images/img.jpg"
													alt="Profile Image"/></span>
										<span>
<span>Abang Ujeb</span>
<span class="time">3 mins ago</span>
</span>
										<span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="dropdown-item">
										<span class="image"><img
													src="https://colorlib.com/polygon/gentelella/images/img.jpg"
													alt="Profile Image"/></span>
										<span>
<span>Abang Ujeb</span>
 <span class="time">3 mins ago</span>
</span>
										<span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="dropdown-item">
										<span class="image"><img
													src="https://colorlib.com/polygon/gentelella/images/img.jpg"
													alt="Profile Image"/></span>
										<span>
<span>Abang Ujeb</span>
<span class="time">3 mins ago</span>
</span>
										<span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
</span>
									</a>
								</li>
								<li class="nav-item">
									<div class="text-center">
										<a class="dropdown-item">
											<strong>See All Alerts</strong>
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>

		<!--page content-->
		<?php echo $contents; ?>
		<!--/page content-->


		<footer>
			<div class="pull-right">
				Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
			</div>
			<div class="clearfix"></div>
		</footer>

	</div>
</div>

<!--<script src="https://colorlib.com/polygon/vendors/jquery/dist/jquery.min.js"></script>-->

<script src="https://colorlib.com/polygon/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://colorlib.com/polygon/vendors/fastclick/lib/fastclick.js"></script>

<script src="https://colorlib.com/polygon/vendors/nprogress/nprogress.js"></script>

<script src="https://colorlib.com/polygon/vendors/Chart.js/dist/Chart.min.js"></script>

<script src="https://colorlib.com/polygon/vendors/gauge.js/dist/gauge.min.js"></script>

<script src="https://colorlib.com/polygon/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

<script src="https://colorlib.com/polygon/vendors/iCheck/icheck.min.js"></script>

<script src="https://colorlib.com/polygon/vendors/skycons/skycons.js"></script>

<script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.js"></script>
<script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.pie.js"></script>
<script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.time.js"></script>
<script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.stack.js"></script>
<script src="https://colorlib.com/polygon/vendors/Flot/jquery.flot.resize.js"></script>

<script src="https://colorlib.com/polygon/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="https://colorlib.com/polygon/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="https://colorlib.com/polygon/vendors/flot.curvedlines/curvedLines.js"></script>

<script src="https://colorlib.com/polygon/vendors/DateJS/build/date.js"></script>

<script src="https://colorlib.com/polygon/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="https://colorlib.com/polygon/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="https://colorlib.com/polygon/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

<script src="https://colorlib.com/polygon/vendors/moment/min/moment.min.js"></script>
<script src="https://colorlib.com/polygon/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="https://colorlib.com/polygon/build/js/custom.min.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
		integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
		data-cf-beacon='{"rayId":"77171b8b2fe67d1f","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}'
		crossorigin="anonymous"></script>
</body>
</html>
