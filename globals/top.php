
<!-- Navbar (sit on top) -->

<style>
    .container{
        line-height: 40px;
        
    }
/* Style for the top bar */
.top-bar {
    background-image:  url('images/d.jpeg');
   
    /* object-fit: cover; */
    /* background-size: 90% 90%; */
  display: flex;
  justify-content: space-between;
  align-items: right;
  background-color: #333;
  color: #fff;
  padding: 10px;
}

/* Style for the logo */
.logo a{
  font-size: 24px;
  font-weight: bold;
  color: #fff;
  text-decoration: none;
}

/* Style for the menu */
.menu {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.menu li {
  margin: 0 2px;
}

.menu li a {
  color: #fff;
  text-decoration: none;
 border-radius: 15px;
    margin-bottom: 5px;
    margin-left: 5px;
    color: rgb(255, 255, 255);
    padding: 5px 8px;
    
    
    font-family: cursive;
}

/* Media query for small screens */
@media (max-width: 768px) {
  .top-bar {
    flex-direction: column;
    align-items: center;
  }
  
  .menu {
    margin-top: 10px;
    display: block;
    text-align: center;
  }
  
  .menu li {
    margin: 10px 0;
  }
}


</style>
<nav class="top-bar">
  <div class="logo">
    <a href="#">DRONE</a>
  </div>
  <ul class="menu">
    <li><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
       
        <li><a class="nav-link" href="showmap.php">Show Map</a></li>
        <li><a class="nav-link" href="possiblepath.php">Possible Path</a></li>
        <li><a class="nav-link" href="navigation.php">Navigation</a></li>
        <li><a class="nav-link" href="localisation.php">Localisation</a></li>
        <li><a class="nav-link" href="object.php">Object Recognition</a></li>
   
  </ul>
</nav>
