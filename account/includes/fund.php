	<section id="content-wrapper" class="form-elements">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Dashboard</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><a href="#">Main</a></li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>
		
		<div class="contain-inner dashboard-v1 col-md-12">
				<!-- BEGIN PAGE CONTENT-->
				<div class="col-md-4">
					<a href="javascript:;" onClick="toggleElement('p1','p2','p3','p4','p5','p6')" class="list-group-item">
						<h4 class="list-group-item-heading">Pay With Bitcoin</h4>
						<p class="list-group-item-text">
							 Click to generate your payment invoice for this payment option.
							 <div id="p1" style="display:none">
								<img src="assets/img/bitcoin.jpg" style="max-height:200px;"/>
								<hr/>
								<p>Payment Option: <b>BITCOIN</b></p>
								<p>Reference ID: #ECT247-<?= rand(2345876, 9897969); ?>BTC</p>
								<p>Wallet Address: <b style="color:red">1C82wtuHXMkiFKgVYUjVG4k61H27BrBteQ</b></p>
							 </div>
						</p>
					</a>
				</div>
				<!--div class="col-md-4">
					<a href="javascript:;" onClick="toggleElement('p2','p1','p3','p4','p5','p6')" class="list-group-item">
						<h4 class="list-group-item-heading">Pay With Luno Bitcoin</h4>
						<p class="list-group-item-text">
							 Click to generate your payment invoice for this payment option.
							 <div id="p2" style="display:none">
								Username: <?= $user['username']; ?> <br/>
								Email: <?= $user['email']; ?> <br/>
								<hr/>
								<p>Payment Option: <b>LUNO BITCOIN</b></p>
								<p>Reference ID: #PO-<?= rand(2345876, 9897969); ?>LBT</p>
								<p>Wallet Address: <b style="color:red">1Edh1ZvyG8PoZjRs4cKTQamUSrDrSTsBhJ</b></p>
							</div>
						</p>
					</a>
				</div>
				<div class="col-md-4">
					<a href="javascript:;" onClick="toggleElement('p3','p1','p2','p4','p5','p6')" class="list-group-item">
						<h4 class="list-group-item-heading">Pay With Coinbase</h4>
						<p class="list-group-item-text">
							 Click to generate your payment invoice for this payment option.
							 <div id="p3" style="display:none">
								Username: <?= $user['username']; ?> <br/>
								Email: <?= $user['email']; ?> <br/>
								<hr/>
								<p>Payment Option: <b>COINBASE</b></p>
								<p>Reference ID: #PO<?= rand(2345876, 9897969); ?>CO</p>
								<p>Payment Address: <b style="color:red">352ZFTQMRArHqV7cf6xrdEQDG3M6Sqxgmx</b></p>
							</div>
						</p>
					</a>
				</div>
				<div class="col-md-4">
					<a href="javascript:;" onClick="toggleElement('p4','p1','p2','p3','p5','p6')" class="list-group-item">
						<h4 class="list-group-item-heading">Pay With Etherium</h4>
						<p class="list-group-item-text">
							 Click to generate your payment invoice for this payment option.
							 <div id="p4" style="display:none">
								<img src="assets/img/eth.png" style="max-height:200px;"/>
								<hr/>
								<p>Payment Option: <b>ETHERIUM</b></p>
								<p>Reference ID: #ECT<?= rand(2345876, 9897969); ?>ETH</p>
								<p>Payment Address: <b style="color:red">0xa695d5ff07883f7c043612937329ea68118b7182</b></p>
							</div>
						</p>
					</a>
				</div>
				<div class="col-md-4">
					<a href="javascript:;" onClick="toggleElement('p5','p4','p1','p2','p3','p6')" class="list-group-item">
						<h4 class="list-group-item-heading">Pay With Litecoin</h4>
						<p class="list-group-item-text">
							 Click to generate your payment invoice for this payment option.
							 <div id="p5" style="display:none">
								Username: <?= $user['username']; ?> <br/>
								Email: <?= $user['email']; ?> <br/>
								<hr/>
								<p>Payment Option: <b>LITECOIN</b></p>
								<p>Reference ID: #PO<?= rand(2345876, 9897969); ?>LTC</p>
								<p>Payment Address: <b style="color:red">MDraLx38radmjgorXscwbYqgyKv7qyq88Q</b></p>
							</div>
						</p>
					</a>
				</div>
				<div class="col-md-4">
					<a href="javascript:;" onClick="toggleElement('p6','p5','p4','p1','p2','p3')" class="list-group-item">
						<h4 class="list-group-item-heading">Pay With Bitcoin Cash</h4>
						<p class="list-group-item-text">
							 Click to generate your payment invoice for this payment option.
							 <div id="p6" style="display:none">
								<img src="assets/img/bitcash.jpg" style="max-height:200px;"/>
								<hr/>
								<p>Payment Option: <b>BITCOIN CASH</b></p>
								<p>Reference ID: #ECT<?= rand(2345876, 9897969); ?>BTc</p>
								<p>Payment Address: <b style="color:red">qp0xnahr33s7unsdw3vlhcjv4re4mk72pgxasx7wjs</b></p>
							</div>
						</p>
					</a>
				</div>
				<!--div class="col-md-4">
					<a href="#creditCard" data-toggle="modal" class="list-group-item">
						<h4 class="list-group-item-heading">Pay With Credit Card</h4>
						<p class="list-group-item-text">
							 Click to pay.
						</p>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#otherPay" data-toggle="modal" class="list-group-item">
						<h4 class="list-group-item-heading">Other Payment Methods</h4>
						<p class="list-group-item-text">
							 Click to Select
						</p>
					</a>
				</div-->
				
				<div class="col-md-12">
					<br/>
					<div id="m_body">
						<h6>For quick confirmation of your payment, please click the button below after funds transfer is complete.</h6>
					</div>
					<button class="btn btn-primary" onClick="sendMail('admin')" id="m_btn">Request Payment Confirmation </button>
				</div>
			</div>
			
	</section>