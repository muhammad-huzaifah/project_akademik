<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Learn Akademik | </title>

	<link href="https://colorlib.com/polygon//vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon//vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon//vendors/nprogress/nprogress.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon//vendors/animate.css/animate.min.css" rel="stylesheet">

	<link href="https://colorlib.com/polygon//build/css/custom.min.css" rel="stylesheet">
	<meta name="robots" content="noindex, follow">
	<script nonce="7163740c-16c7-4c06-8df9-6a60a4dc0a37">(function (w, d) {
			!function (dk, dl, dm, dn) {
				dk[dm] = dk[dm] || {};
				dk[dm].executed = [];
				dk.zaraz = {deferred: [], listeners: []};
				dk.zaraz.q = [];
				dk.zaraz._f = function (dp) {
					return function () {
						var dq = Array.prototype.slice.call(arguments);
						dk.zaraz.q.push({m: dp, a: dq})
					}
				};
				for (const dr of ["track", "set", "debug"]) dk.zaraz[dr] = dk.zaraz._f(dr);
				dk.zaraz.init = () => {
					var ds = dl.getElementsByTagName(dn)[0], dt = dl.createElement(dn),
						du = dl.getElementsByTagName("title")[0];
					du && (dk[dm].t = dl.getElementsByTagName("title")[0].text);
					dk[dm].x = Math.random();
					dk[dm].w = dk.screen.width;
					dk[dm].h = dk.screen.height;
					dk[dm].j = dk.innerHeight;
					dk[dm].e = dk.innerWidth;
					dk[dm].l = dk.location.href;
					dk[dm].r = dl.referrer;
					dk[dm].k = dk.screen.colorDepth;
					dk[dm].n = dl.characterSet;
					dk[dm].o = (new Date).getTimezoneOffset();
					if (dk.dataLayer) for (const dy of Object.entries(Object.entries(dataLayer).reduce(((dz, dA) => ({...dz[1], ...dA[1]}))))) zaraz.set(dy[0], dy[1], {scope: "page"});
					dk[dm].q = [];
					for (; dk.zaraz.q.length;) {
						const dB = dk.zaraz.q.shift();
						dk[dm].q.push(dB)
					}
					dt.defer = !0;
					for (const dC of [localStorage, sessionStorage]) Object.keys(dC || {}).filter((dE => dE.startsWith("_zaraz_"))).forEach((dD => {
						try {
							dk[dm]["z_" + dD.slice(7)] = JSON.parse(dC.getItem(dD))
						} catch {
							dk[dm]["z_" + dD.slice(7)] = dC.getItem(dD)
						}
					}));
					dt.referrerPolicy = "origin";
					dt.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(dk[dm])));
					ds.parentNode.insertBefore(dt, ds)
				};
				["complete", "interactive"].includes(dl.readyState) ? zaraz.init() : dk.addEventListener("DOMContentLoaded", zaraz.init)
			}(w, d, "zarazData", "script");
		})(window, document);</script>
</head>
<body class="login">
<div>
	<a class="hiddenanchor" id="signup"></a>
	<a class="hiddenanchor" id="signin"></a>
	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<!--<form>-->
					<?php echo form_open('auth/checkLogin', 'class="login_content"'); ?>
					<h1>Login Form</h1>
					<h1>Sistem Informasi Akademik</h1>
					<div>
						<input type="text" class="form-control" name="username" placeholder="Username" required=""/>
					</div>
					<div>
						<input type="password" class="form-control" name="password" placeholder="Password" required=""/>
					</div>
					<div>
						<button type="submit" name="submit" class="btn btn-danger">
							login
						</button>
					</div>
					<div class="clearfix"></div>
					<div class="separator">
						<div class="clearfix"></div>
						<br/>
						<div>
							<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
							<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
								Terms</p>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
</div>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
		integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
		data-cf-beacon='{"rayId":"7c364fb54916df8f","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
		crossorigin="anonymous"></script>
</body>
</html>
