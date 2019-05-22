<?php include 'inc/header2.php';?>

<a id="skippy" class="sr-only sr-only-focusable" href="#content">
      <div class="container">
        <span class="skiplink-text">Skip to main content</span>
      </div>
    </a>

    <a href="https://getbootstrap.com" class="d-block px-3 py-2 text-center text-bold text-white old-bv">There's a newer version of Bootstrap 4!</a>

#skippy {
    display: block;
    padding: 1em;
    color: #fff;
    background-color: #563d7c;
    outline: 0;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0,0,0,0);
    white-space: nowrap;
    -webkit-clip-path: inset(50%);
    clip-path: inset(50%);
    border: 0;
}

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
  </a>
</nav>

<form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>


<div class="navbar navbar-dark fixed-top" role="navigation">
    <div class="navbar-header">
        <div class="navbar-header"><a class="navbar-brand" href="#">Brand</a>

        </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>

            <span class="icon-bar"></span> <span class="icon-bar"></span>

        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
            <li><a href="#" class="">esgraphicdesign1@gmail.com</a>

            </li>
            <li><a href="#" class="info-phone"><span id="info-phone" class="">800-123-4567</span></a>

            </li>
            <li class="social-icon social-facebook"></li>
            <li><a href="https://facebook.com/elegantthemes/" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>

            </li>
            <li class="social-icon social-twitter"></li>
            <li><a href="https://twitter.com/elegantthemes/" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>

            </li>
            <li class="social-icon social-google-plus"></li>
            <li><a href="https://plus.google.com/+elegantthemes/" class="icons-sm gplus-ic"><i class="fa fa-google-plus"></i></a>

            </li>
        </ul>
    </div>
</div>
<div class="navbar navbar-dark static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>

            <span class="icon-bar"></span>  <span class="icon-bar"></span>

        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
            <li><a href="#" class="">Home</a>

            </li>
            <li><a href="#" class="">Services</a>

            </li>
            <li><a href="#" class="">Our Work</a>

            </li>
            <li><a href="#" class="">Blog</a>

            </li>
            <li><a href="#" class="">Contact Us</a>

            </li>
        </ul>
    </div>
</div>


<?php include 'inc/footercpfcnpj.php';?>

