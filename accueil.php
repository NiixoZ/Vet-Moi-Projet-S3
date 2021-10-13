<?php
declare(strict_types=1);

require "autoload.php";
Session::start();

$webPage = new WebPage("Accueil");
$webPage->appendToHead(<<< HTML
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    HTML);

$html= <<< HTML
<div class="d-flex justify-content-center" xmlns="http://www.w3.org/1999/html">
    <h3 style="font-weight: bold;">Une Urgence ?</h3>
</div>
<div class="d-flex justify-content-center mb-3">
    <a href="#" class="btn m-1" style="font-weight: bold;background-color: #C20D0D; color: #FFFFFF">En ligne</a>
    <a href="tel:+33325563596" class="btn m-1" style="font-weight: bold;background-color: #C20D0D; color: #FFFFFF">03 25 56 35 96</a>
</div>
<div class="d-flex flex-row">
    <div class="d-flex flex-column align-items-center mt-5 ml-5 pl-5">
        <h2 style="font-weight: bold;">Bienvenue sur le site de la clinique Vet&Moi !</h2>
        <h4 style="font-weight: bold;">Prenez rendez-vous n'importe quand</h4>
        <a href="#" class="btn m-1" style="font-weight: bold;background-color: #02897A; color: #FFFFFF">Prenez rendez-vous</a>
    </div>
    <img src="img/dog_cat.png" class="mx-auto w-25" alt="">
</div>

<div class="d-flex justify-content-center">
    <div class="d-flex flex-column text-center mt-5">
        <h1 style="font-weight: bold;">Espace</h1>
        <div class="d-flex flex-row mt-3">
            <a href="#"><img src="img/partChien.png" alt="" height="200"></a> 
            <a href="#"><img src="img/partCat.png" alt="" height="200"</a> 
            <a href="#"><img src="img/partNac.png" alt="" height="200"></a> 
        </div>
        <h4 style="font-weight: bold;">Voulez-vous tout savoir sur votre animal ?</h4>
        <h6 style="font-weight: bold;">cliquez sur le type d’animal pour en apprendre plus !</h6>
        <div class="d-flex flex-column mt-5">
            <div class="d-flex flex-row">
                {$webPage->getSVGMiniLogo()}
                <h4 style="font-weight: bold; color: #055945; border-bottom: 8px solid #02897A;">Nos Derniers Conseils</h4>
            </div>
            <div class="d-flex flex-row mt-3">
                <a href="#"><img src="img/carre_gris.png" alt="" height="200" class="p-2"></a> 
                <a href="#"><img src="img/carre_gris.png" alt="" height="200" class="p-2"></a> 
                <a href="#"><img src="img/carre_gris.png" alt="" height="200" class="p-2"></a> 
            </div>
            <h4 style="font-weight: bold;">Voulez-vous plus de conseils ?</h4>
            <h6 style="font-weight: bold;">Nous en avons d'autres, aussi croustillants les uns que les autres !</h6>
            <a href="./conseils.php" class="btn m-1 align-self-center" style="font-weight: bold;background-color: #02897A; color: #FFFFFF">Voir les autres conseils</a>
        </div>
    </div>
</div>

<!-- Section: Contact v.1 -->
<section class="my-5">
  <h2 class="h1-responsive font-weight-bold text-center my-5">Contactez-nous</h2>
  <div class="row mr-3 ml-3">
    <div class="col-lg-5 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body" style="font-weight: bold;background-color: #DDDDDD;">
          <div class="form-header blue accent-1">
            <h3 class="mt-2"><i class="fas fa-envelope"></i> Ecrivez-nous !</h3>
          </div>
          <div class="md-form">
            <label for="form-name">Votre nom</label>
            <input type="text" id="form-name" class="form-control" style="outline: 0; border:0;background-color: #C9C9C9;">
          </div>
          <div class="md-form">
            <label for="form-email">Votre mail</label>
            <input type="text" id="form-email" class="form-control" style="outline: 0; border:0;background-color: #C9C9C9;">
          </div>
          <div class="md-form">
            <label for="form-Subject">Sujet</label>
            <input type="text" id="form-Subject" class="form-control" style="outline: 0; border:0;background-color: #C9C9C9;">
          </div>
          <div class="md-form">
          <label for="form-text">Votre message</label>
            <textarea id="form-text" class="form-control md-textarea" rows="3" style="outline: 0; border:0;background-color: #C9C9C9;"></textarea>
          </div>
          <div class="text-center mt-4">
            {$webPage->getHTMLButton(true, "Envoyer", "#")}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 100%">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2604.5102262308587!2d4.048937015569729!3d49.24777437932755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e9743696b72967%3A0x16942c3d585b4b98!2s226%20Bd%20Pommery%2C%2051100%20Reims!5e0!3m2!1sfr!2sfr!4v1634032967797!5m2!1sfr!2sfr" frameborder="0"
          style="border:0" allowfullscreen loading="lazy"></iframe>
      </div>
    </div>
  </div>
</section>

HTML;

$webPage->appendContent($html);
echo $webPage->toHTML();