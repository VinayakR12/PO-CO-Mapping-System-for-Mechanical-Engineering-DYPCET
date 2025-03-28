<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    @import url('https://fonts.googleapis.com/css?family=Noto+Serif+SC&display=swap');
@import url(responsive.css);
body
{
    margin: 0;
    padding: 0;
    font-family: 'Noto+Serif+SC',sans-serif;
    background: url(bg.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size:cover;
    background-position:center;
    box-sizing: border-box;
    color: #fff

}
header
{
    position: relative;
    padding: 10px;
    background: #FFF;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0,0,0,.2);
}

nav
{
    float:right;
}
.clear
{
    clear: both;
}
nav ul
{
    margin: 0;
    padding: 0;
    display: flex;
}
nav ul li
{
    list-style: none;

}
nav ul li a
{
    display: block;
    margin: 10px 0;
    padding: 10px 20px;
    text-decoration: none;
    color: #fff

}


@media (max-width: 768px)
{
    .mean-toggle
    {
        display: block;
        width: auto;
        height: auto;
        margin: 10px;
        float: right;
        cursor: pointer;
        text-align: center;
        font-size: 30px;
        color: #069370;
    }
    .mean-toggle:before
    {
        content: '\f0c9';
        font-family: fontAwesome;
        line-height: 40px;
    }
    .mean-toggle.active:before
    {
        content: '\f00d';
    }
    nav
    {
        display:none;
    }
    nav.active
    {
        display:block;
        width :100%;
    }
    nav.active ul
    {
        display: block;
    }
    nav.active ul li 
    {
        margin: 0;
        text-align: center;
    }
}

.home-link {
    color: var(--navbar-text-color);
    text-decoration: none;
    display: flex;
    font-weight: 400;
    align-items: center;
  }



  .navbar-logo {
    margin-right: 0.5em;
    align-items: center;
  }
  
  .navbar-logo img {
    border-radius: 50%;
    height: 30px;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #095899;
    border-radius: none;
}
nav{
    position: absolute;
    right: 10px;
}
</style>
<body>
    <header>
    <a href="/prathamproject/home.php" class="home-link">
      <div class="navbar-logo">
        <img src="/prathamproject/img/logo.jpg" alt="">
      </div>
      DYPCET
    </a>
        <div class="mean-toggle"></div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Term</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="settings.php">Settings</a></li>
            </ul>
        </nav>
        <div class="clear"></div>
    </header>
    
     <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>
  <script type="text/javascript">
      $(document).ready(function()
      {
          $('.mean-toggle').click(function()
        {
              $('.mean-toggle').toggleClass('active')
              $('nav').toggleClass('active')
        })
      })
    </script>

</body>