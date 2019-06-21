  <section id="content-wrapper" class="form-elements" style="background-color:#ffc">
		<div class="site-content-title">
			<h2 class="float-xs-left content-title-main">Admin Mailbox</h2>
		 
			<ol class="breadcrumb float-xs-right">
				<li class="breadcrumb-item">
					<span class="fs1" aria-hidden="true" data-icon="?"></span>
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item"><?= $_GET['link']; ?></li>
			</ol>
		 
		</div>

		<div class="col-md-12 mailbox_main">
			<div class="row">
				<div class="col-xl-2 col-lg-4 col-md-4 sidebar_block">
					<button aria-controls="collapseExample" aria-expanded="false" data-target="#collapseExample" data-toggle="collapse" type="button" class="mail-toggle">
						Mailbox Menu
						<span class="icon arrow_carrot-down float-xs-right"></span>
					</button>
					<div class="mail-divider-sm"></div>
					<div class="sidebar_contain collapse" id="collapseExample">
						<div class="mail_btn">
							<button type="button" class="btn btn-primary btn-block" onclick="goTo('?link=_sendmail')">Compose</button>
						</div>
						<ul class="mailbox_sidebar_contain">
							<li><a href="?link=inbox">Admin Inbox</a><span class="badge float-xs-right "><?= msgCount('ADMIN')+1; ?></span></li>
							<li><a href="#">Draft</a></li>
							<li><a href="#">Sent</a></li>
							<li><a href="#">Archive</a></li>
							<li><a href="#">Trash</a></li>
						</ul>
					</div>
        </div>
        
        <div class="col-xl-10 col-lg-8 col-md-8 right-sidebar_block">
					<div class="content right_sidebar_contain">
						<div class="mailbox_right_contain">
              <div style="padding:20px; font-weight:bold; color:#c00">
                  <form onSubmit="return false">
                      <div class="form-group">
                        <label class="control-label">SEND TO: </label>
                        <?php if (isset($_GET['replyTo'])){ $sendTo = ucwords(getUsername($_GET['replyTo'])); }else{ $sendTo = "ALL USERS";} ?>
                        <input type="text" id="to" name="to" value="<?= $sendTo; ?>" class="form-control" disabled >
                      </div>
                      <div class="form-group">
                        <label class="control-label">SUBJECT: </label>
                        <input type="text" id="subj" name="subject" class="form-control" required>
                      </div>
                    
                      <div style="color:red; font-weight:bold" id="cmp"></div>
                    
                      <div class="form-group">
                        <label class="control-label">MESSAGE: </label>
                        <textarea rows="5" name="message" id="msg" class="form-control" data-spell-checker="true" required></textarea>
                      </div>

                      <div class="compose_btn">
                        <button type="submit" class="btn btn-primary" id="cmp_btn" name="compose" onClick="inbx()">Send</button>
                        <button type="reset" class="mail_trash float-xs-right"><i class="icon icon_trash_alt"></i></button>
                      </div>
                  </form>
              </div>
						</div>
					</div>
        </div>
        
      </div>
		</div>
	</section>