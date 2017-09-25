<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
         <ul class="nav navbar-nav" style="float: right;">
          <form class="navbar-form navbar-left" method="POST" action="menu.php">
            <div class="form-group">
              <input type="text" class="form-control" required placeholder="Search" name="searchMail">
            </div>
            <button type="submit" class="btn btn-primary" name="search">Submit</button>
        </form>
            <li class="nav-item active">
               <a class="nav-link" href="profile.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
               <a class="nav-link" href="photos.php">Photos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="messsages.php">Messages</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="friends.php">Friend Requests</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="logOut.php">Logout</a>
            </li>
            <!--  <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Dropdown link
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item" href="#">Action</a>
                 <a class="dropdown-item" href="#">Another action</a>
                 <a class="dropdown-item" href="#">Something else here</a>
               </div>
               </li> -->
         </ul>
      </nav>


  <?php 
    if (isset($_POST["search"])) {
      $searchMail=$_POST["searchMail"];
      header("Location:user.php?search=".$searchMail);
    }
  ?>


