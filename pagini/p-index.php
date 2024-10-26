        

        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" style="width: 15px; height: 15px" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div> 
                <strong>Bun venit pe site-ul Crăciunului!</strong> Navigare Plăcută! 
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="mb-3"></div>
        <div class="box1">
          <h1 class="h11">Fie ca Sfintele Sărbători să vă lumineze sufletele și casa, să aveți parte de sănătate, belșug și fericire!</h1>
        </div>
        <div class="box2">
          <h1 class="h12">Sărbătorile să-ţi aducă un strop de fericire, un strop de iubire, un strop de noroc şi, dacă se poate, toate la un loc</h1>
        </div>
        <div class="box3">
          <h1 class="h13">Aceasta e o noapte specială, în care poţi întâlni o persoană specială! Este vorba despre copilul care ai fost. Uită pentru o noapte grijile și retrăiește miracolul nopții de sărbătoare!</h1>
        </div>

        <div class="box4">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="video/wewish.gif" class="d-block w-100" alt="Urare de sărbători">
              </div>
              <div class="carousel-item">
                <img src="video/brad.gif" class="d-block w-100" alt="Bradul de Crăciun">
              </div>
              <div class="carousel-item">
                <img src="video/santa.gif" class="d-block w-100" alt="Mai mulți Moși Crăciuni">
              </div>
              <div class="carousel-item">
                <img src="video/ninge.gif" class="d-block w-100" alt="Un sat care ninge">
              </div>
              <div class="carousel-item">
                <img src="video/idk.gif" class="d-block w-100" alt="Șosete de Crăciun">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>



    <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>