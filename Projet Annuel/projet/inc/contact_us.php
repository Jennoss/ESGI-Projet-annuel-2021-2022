
<head>
    <link rel='stylesheet' href='../src/css/contact_us.css'>
    <style>@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;700&display=swap');</style>
</head>

<?php require('./mon_espace.php') ?>

<div class="contact-container">
  <div class="left-col">
    <img class="logo" src="../src/img/header/logo.png"/>
  </div>
  <div class="right-col">
    <div class="theme-switch-wrapper">

    </div>
    
    <h1>Contactez-nous</h1>
    <p>You need more informations or you have a lot of money ? Don't worry, we will find you a solution to spend your money</p>
    
    <form id="contact-form" method="post">
        <label for="name">Nom complet</label>
        <input type="text" id="name" name="name" placeholder="Nom complet" required style="width: 100%">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Votre adresse Email" required style="width: 100%">
        <label for="message">Message</label>
        <textarea rows="6" placeholder="Votre message" id="message" name="message" required style="width: 100%"></textarea>
      <!--<a href="javascript:void(0)">--><button type="submit" id="submit" name="submit">Send</button><!--</a>-->
    </form>
<div id="error"></div>
<div id="success-msg"></div>
  </div>
</div>