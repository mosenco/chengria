<?php 
    include 'php/session.php';  
?>



<!DOCTYPE html>
<html lang="it">
<head>
    
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <title>Benvenuti a GamingDevNet</title>
</head>
<body>
    
    
    <?php 
        include 'php/navbar.php';
    
      if(empty($_SESSION["username"])){
        
    }else{
         echo'<h1 class="display-1 font-weight-bold text-danger text-center">Qualcosa è andato storto e_e</h1>
            <p class=" text-muted text-center">cosa hai fatto..</p>';
        return;
    }
    ?>
    
        <div class="container-fluid p-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/584117-6-reasons-why-pc-gaming-is-better-than-console-gaming.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First slide label</h5>
                      <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/China-Brefing-Chinas-New-Gaming-Regulations-What-it-Means-for-Investors.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/gaming-disorder-500x334.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container">
          <div data-spy="scroll" data-target="#navigazione" data-offset="0">
              <div class="row m-5 p-5" id="cosafacciamo">
                <div class="col text-center">
                  <img src="images/rick.gif" class="img-fluid">
                  <h1 class="display-1 font-weight-bold text-danger">GAMINGDEVNET</h1>
                  <img src="images/icongdn.png" class="img-fluid">
                  <p class="m-3 font-weight-bold text-muted mt-5">GamingDevNet è una piattaforma
                  dove developers possono pubblicare i propri giochi e ricevere assistenza, consigli
                  da altri developers. Potrai sia caricare sia giocare e recensire i giochi degli altri. 
                  Una community fresca fresca per crescere in compagnia e ricevere un primo impatto
                  prima di pubblicare il proprio gioco sul mercato vero e proprio</p>
                </div>
              </div>
              <div class="row">
                  <div class="col-8"><img src="images/148910_preview.png" alt="..."></div>
                  <div class="col-4 text-center">
                      <p class="m-3 font-weight-bold text-muted mt-5">VISUALIZZAZIONI MENSILI:</p>
                      <h1 class="display-1 font-weight-bold text-danger">100K</h1>

                      <p class="m-3 font-weight-bold text-muted mt-5">ACCOUNT ISCRITTI QUEST&rsquo;ANNO:</p>
                      <h1 class="display-1 font-weight-bold text-danger">90K</h1>

                      <p class="m-3 font-weight-bold text-muted mt-5">VIDEOGIOCHI CREATI:</p>
                      <h1 class="display-1 font-weight-bold text-danger">900K</h1>

                  </div>
              </div>

              <br>
              <br>
              <br>
              <br>
              <br>

              <h1 class="display-1 font-weight-bold text-danger text-center">COSA STAI ASPETTANDO</h1>

              <br>
              <br>
              <br>
              <p class=" m-0 text-muted text-center">Developers, condividono</p>
              <p class=" text-muted text-center">insieme ad una community sempre attiva</p>
              <br>
              <br>
              <br>
              <div class="row">
                  <div class="col">
                      <h1 class="display-1 font-weight-bold text-danger text-center">20K</h1>
                      <p class=" text-muted text-center">significa ventimila</p>
                  </div>
                  <div class="col">
                      <h1 class="display-1 font-weight-bold text-danger text-center">AU</h1>
                      <p class=" text-muted text-center">sarebbe l&rsquo;oro nella tavola periodica</p>
                  </div>
                  <div class="col">
                      <h1 class="display-1 font-weight-bold text-danger text-center">19.9K</h1>
                      <p class=" text-muted text-center">developers che hanno avuto successo</p>
                  </div>
              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <div id="chisiamo" class="row m-5">
                <div class="col">
                  <img src="images/office.jpg" class="img-fluid">
                </div>
                <div class="col">
                  <h1 class="display-3 font-weight-bold text-danger text-center">JeggerStroy</h1>
                  <p class=" text-muted text-center">Noi JeggerStroy, abbiamo creato GamingDevNet pensando
                  a developers come noi, per voi. Nata nel paese di Mahala in USA nel 1934, JeggerStroy ha fatto
                  successo, sia per i vari precedenti, ma sopratutto per la opera MHL. Framework di grande interesse.
                  Ha spostato la sua sede a NY, nel cuore della grande mela americana e ha aperto varie sede in
                  varie parte del varie del mondo.
                  Oggi si contano piu di 10M uffici sparsi per il mondo.</p>
                </div>
            

              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <div id="dovesiamo" class="row m-5">
            
                <div class="col">
                  <h1 class="display-3 font-weight-bold text-danger text-center">La nostra sede</h1>
                  <p class=" text-muted text-center">La sede e situata nel cuore di NY
                  esattamente dove vede il puntino nella immagine. Venite a trovarci. Il nostro ufficio
                  e sempre disponibile per visite gratuite, accompagnate da un genitore.
                  dove vi mostreremo la bellezza di come lavoriamo duramente per tutti voi.</p>
                </div>
                <div class="col">
                  <img src="images/map.png" class="img-fluid">
                </div>

              </div>
              <br>
              <br>
              <br>
              <br>
              <br>

              <div class="row m-5" id="contatti">
                <div class="col text-center">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Contatti</h5>
                        <h6 class="card-subtitle mb-2 text-muted">gamingdevnet@jeggerstroy.en</h6>
                        <p class="card-text">Contattaci in caso di necessita o lascia la tua email nel seguente form per newsletter e offerte!</p>
                        
                      </div>
                    </div>
                    </div>
              </div>
              <div class="row m-5 align-items-center">
                <div class="col-auto text-center">

                  <input type="text" class="form-control mb-2" id="inlineFormInput">
                </div>
                <div class="col-auto">

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroup">
                    <button type="button" class="btn btn-outline-danger">Invia</button>
                  </div>
                </div>
              </div>
          </div>
        </div>
  
    
  
    
    
    <script src="js/indexControl.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>