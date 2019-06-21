<aside id="sidebar">
	<div class="sidebar-search">
		<input id="live-search-box" type="search" class="form-control input-sm" placeholder="Search...">
		<a href="javascript:void(0)"><i class="search-close icon_search"></i></a>
	</div>
	<div class="sidebar-menu">
		<ul class="nav site-menu live-search-list" id="site-menu" data-plugin="custom-scroll" data-suppress-scroll-x="true" data-height="100%">
			<li class="menu-title"><i class="icon_compass_alt"></i><span>Main Menu</span>
				<ul class="main-menu">
					<li class="sub-item"><a href="./">Home (Dashboard)</a></li>
					<li class="sub-item"><a href="?link=fund">Fund My Account</a></li>
					<li class="sub-item"><a href="?link=withdraw">Make Withdrawal</a></li>
				</ul>
			</li>
			<li class="menu-title"><i class="icon_document_alt"></i><span>User Pages</span>
				<ul class="main-menu">
					<li class="sub-item">
						<a href="javascript:void(0)">
							<span>Profile</span>
							<span class="float-xs-right"><i class="icon_plus"></i></span>
						</a>
						<ul class="sub-menu">
							<li><a href="?link=profile">My Profile</a></li>
							<li><a href="?link=edit_profile">Edit Profile</a></li>
							<li><a href="?link=change_pass">Change Password</a></li>
						</ul>
					</li>
					<li class="sub-item">
						<a href="javascript:void(0)">
							<span>Messaging</span>
							<span class="float-xs-right"><i class="icon_plus"></i></span>
						</a>
						<ul class="sub-menu">
							<li><a href="?link=inbox">View Inbox</a></li>
							<li><a href="?link=inbox&adm=1">Message Support</a></li>
						</ul>
					</li>
					
				</ul>
			</li>
			<li class="menu-title"><i class="icon_document_alt"></i><span>External Pages</span>
				<ul class="main-menu">
					<li class="sub-item">
						<a href="javascript:void(0)">
							<span>Information Media</span>
							<span class="float-xs-right"><i class="icon_plus"></i></span>
						</a>
						<ul class="sub-menu">
							<li><a href="https://www.youtube.com/watch?v=fOMVZXLjKYo"><span class="title"><i class="fa fa-globe"></i>What is Cryptocurrency?</span></a></li>
							<li><a href="https://blockgeeks.com/guides/cryptocurrency-wallet-guide/"><span class="title"><i class="fa fa-globe"></i>Cryptocurrency Wallets</span></a></li>
							<li><a href="https://www.youtube.com/watch?v=B5EDct7WFTA"><span class="title"><i class="fa fa-globe"></i>Trading for Beginners</span></a></li>
							<li><a href="https://youtu.be/V2-hayqtyuw"><span class="title"><i class="fa fa-globe"></i>How to Sell Bitcoins</span></a></li>
							<li><a href="https://www.bitcoin.com/buy-bitcoin"><span class="title"><i class="fa fa-globe"></i>Where to Buy Bitcoins</span></a></li>
						</ul>
					</li>
				</ul>
			</li>
		<?php if ($user['isAdmin'] == 1) { ?>
			<li class="menu-title"><i class="icon_document_alt"></i><span>Admin Pages</span>
				<ul class="main-menu">
					<li class="sub-item"><a href="?link=_system">System Overview</a></li>
					
					<li class="sub-item">
						<a href="javascript:void(0)">
							<span>Manage Users</span>
							<span class="float-xs-right"><i class="icon_plus"></i></span>
						</a>
						<ul class="sub-menu">
							<li><a href="?link=_users">View all Users</a></li>
							<li><a href="?link=_credit_users">Credit/Debit Users</a></li>
							<li><a href="?link=_withdraw">Withdrawal Requests</a></li>
						</ul>
					</li>
					
					<li class="sub-item"><a href="?link=_transactions">System Transactions</a></li>
					<li class="sub-item"><a href="?link=_mailbox">Admin Mailbox</a></li>
					<li class="sub-item"><a href="?link=_add_admin">Add Admin</a></li>
					
				</ul>
			</li>
		<?php } ?>
		</ul>
	</div>
	<div class="sidebar-extra">
	<a href="?link=logout" title="Logout"><i class="icon_lock_alt"></i></a>
	<a href="#"><i class="icon_key_alt"></i></a>
	<a href="?link=change_pass" title="Change Password"><i class="icon_lock-open_alt"></i></a>
	</div>
</aside>