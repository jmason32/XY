<?php 
    session_start();
    require 'splashheader.php';
    
?>

<body class="welcome">
  <span id="splash-overlay" class="splash"></span>
  <span id="welcome" class="z-depth-4"></span>
 
  <header class="navbar-fixed"> 
    <nav class="row deep-purple darken-3">
      <div class="col s12">
        <ul class="right">
          <li class="right">
            <a href="" target="_blank" class="fa fa-facebook-square fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
          </li>
          <li class="right">
            <a href="" target="_blank" class="fa fa-github-square fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="valign-wrapper">
    <span class="container grey-text text-lighten-1 ">

      <p class="flow-text">Welcome to</p>
      <h1 class="title grey-text text-lighten-3">Black Business Central</h1>

      <blockquote class="flow-text">A place to study for your High School Equivalency Diploma</blockquote>

      <div class="center-align">
        <!-- Dropdown Trigger -->
        <a class="btn dropdown-button" href="<?php $_SERVER["DOCUMENT_ROOT"]?>/php/DMV/login.php">Login<i class="material-icons right"></i></a>

        <!-- Dropdown Structure -->
        <!-- <ul id="exams" class="dropdown-content">
          <li><a href="#!">GED&trade; Exam</a></li>
          <li><a href="#!">HiSET&trade; Exam</a></li>
          <li><a href="#!">TASC&trade; Exam</a></li>
        </ul> -->
        <!-- Dropdown Trigger -->
        <a class="btn dropdown-button" href="<?php $_SERVER["DOCUMENT_ROOT"]?>/php/DMV/signup.php">Create an Account<i class="material-icons right"></i></a>

        <!-- Dropdown Structure -->
        <!-- <ul id="study" class="dropdown-content">
          <li><a href="#!">mathematics</a></li>
          <li><a href="#!">reading</a></li>
          <li><a href="#!">science</a></li>
          <li><a href="#!">social studies</a></li>
          <li><a href="#!">writing</a></li>
        </ul> -->
      </div>

    </span>
  </main>

  <div class="fixed-action-btn">
    <a href="#message" class="modal-trigger btn btn-large btn-floating amber waves-effect waves-light">
      <i class="large material-icons">message</i>
    </a>
  </div>

  <div id="message" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Contact</h4>
      <p>coming soon...</p>
    </div>
    <div class="modal-footer">
      <a href="" class="modal-action modal-close waves-effect btn-flat">close</a>
    </div> 
  </div> 

  <footer class="page-footer deep-purple darken-3">
    <div class="footer-copyright deep-purple darken-4">
      <div class="container">
        <time datetime="{{ site.time | date: '%Y' }}">&copy; 2016 Jason</time>
      </div>
    </div>
  </footer>
    </body>
</html>