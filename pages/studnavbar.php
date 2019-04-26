    <div id="navigation">
			<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
				  <a class="navbar-brand" href="homepage.php">ERSBS</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
							<span class="navbar-toggler-icon"></span>
				  </button>


				  <div class="collapse navbar-collapse justify-content-end" 
						id="myNavbar">
						<form class="form-inline ml-auto search-custom">
							<div class="input-group">
							  <input	type="text" 
										class="form-control" 
										placeholder="Search an event" 
										aria-label="Recipient's username" 
										aria-describedby="basic-addon2">
							  <div class="input-group-append">
							    <button class="btn btn-outline-light" 
										type="button">
									<i class="fa fa-search"></i>
								</button>
							</div>
							</div>
						</form>

						<ul class="navbar-nav ml-auto">
		            <li class="nav-item">
		                <a href="homepage.php" 
							class="nav-link m-1 menu-item nav-active text-white">
							Home
						</a>
		            </li>
					<li class="nav-item">
		                <a href="profile.php" 
							class="nav-link m-1 menu-item text-white">
						My Profile</a>
		            </li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle m-1 text-white" 
							href="#" id="navbarDropdownMenuLink" 
							role="button" 
							data-toggle="dropdown" 
							aria-haspopup="true" 
							aria-expanded="false">
							Events
						</a>
						<div class="dropdown-menu dropdown-custom" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item text-white" 
								href="viewproposal.php">
								My Events
							</a>
							<a class="dropdown-item text-white" 
								href="form.php">
								Create Event
							</a>
						</div>
					</li>
					<li class="nav-item">
		                <a href="schedule.php" 
						class="nav-link m-1 menu-item text-white">
						Schedule</a>
		            </li>

					<button type="button" 
							class="btn btn-outline-light m-1 inline" 
							button onclick="location.href='logout.php'">
							Sign Out
					</button>
					</ul>
				  </div>
			</nav>
		</div>