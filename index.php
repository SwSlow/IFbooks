<?php
session_start();

// verifica se há algum usuário logado 
if (!isset($_SESSION["userID"])) {
  // Usuário não logado! Redireciona para a página de login
  header("Location: ./login.php");
  // Notifica o usuário que não há nenhuma sessão iniciada
  $_SESSION['loginErro'] = "<script>alert('Faça login para acessar a página!');</script>";
  exit;

  $_SESSION['id'] = $user['userID'];
  $_SESSION['name'] = $user['name'];
  $_SESSION['avatar'] = $user['avatar'];

  switch ($user['permissionLevel']) {
    case 'admin':
      $_SESSION['permission'] = 'Administrador';
      break;
    case 'employee':
      $_SESSION['permission'] = 'Funcionário';
      break;
    case 'moderator':
      $_SESSION['permission'] = 'Moderador';
      break;
    default:
      $_SESSION['permission'] = 'Leitor';
  }
}

include('./db/config.php');

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/stylePrincipal.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- swiper link -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />


</head>
<meta charset="utf-8">

<title>| Bem-Vindo!</title>

<body>
  <header class="nav-down">
    <img class="logoBib" src="imagens/Logo.png">

    <div class="dropDownIMG">

      <img class="UserBib" src="imagens/User.png">

      <div class="dropdownContent">
        <a onclick="sairAlert()">LogOff</a>
        <a onclick="controlPanel()">Painel de Controle</a>
      </div>
    </div>
    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Digite sua pesquisa">
      <a class="search-btn" href="#">
        <i class="fas fa-search"></i>
      </a>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Categorias</button>
      <div class="dropdown-content">
        <a href="#ebooksLink">Ebooks</a>
        <a href="#educacionaisLink">Educacionais</a>
        <a href="#romanceLink">Romance</a>
        <a href="#aventuraLink">Aventura</a>
        <a href="#suspenseLink">Suspense</a>
        <a href="#terrorLink">Terror</a>
        <a href="#biografiaLink">Biografia</a>
        <a href="#contosLink">Contos</a>
      </div>
    </div>


    </div>
  </header>


  <br><br><br><br>


  <h4 class="swiper-title">Sua lista</h4>

  <div class="form">

    <section class="swiper-container">

      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          <?php
          include('./db/config.php');

          $sqlCode = "SELECT * FROM item ORDER BY itemID DESC LIMIT 18";
          $sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

          while ($item = $sql_query->fetch_assoc()) {
            $id = $item["itemID"];
            $cover = $item["cover"];
            $title = $item["title"];

            $itemArticle = "
            <div class=\"swiper-slide\">
            <a href=\"./item/?item=$id\" class=\"\"><img src=\"$cover\" alt=\"Capa:$title\"></a>
            <h6>$title</h6>
            </div>";

            echo ($itemArticle);
          }
          if ($itemArticle == 0){
              echo("Sem livros em sua lista!");
          };
          ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>


    <br><br><br><br>

    <!-- slide -->

    <h4 class="swiper-title">Recomendações</h4>

    <div class="form">

      <section class="swiper-container">

        <div class="swiper mySwiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>

            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>
            </div>
            <div class="swiper-slide"><img src="imagens/example.PNG">
              <h6>Call of Cthulu</h6>

            </div>
          </div>

          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>


        </div>
      </section>


      <br><br><br><br>

      <!-- slide -->


      <a id="ebooksLink"></a>

      <h4 class="swiper-title">Ebooks</h4>

      <div class="form">

        <section" class="swiper-container">


          <div class="swiper mySwiper">
            <div class="swiper-wrapper">


              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>

              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>

              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>

              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>

              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>

              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>

              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>

              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>
              </div>
              <div class="swiper-slide"><img src="imagens/example.PNG">
                <h6>Call of Cthulu</h6>

              </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

          </div>
          </section>


          <br><br><br><br>

          <!-- slide -->


          <a id="educacionaisLink"></a>

          <h4 class="swiper-title">Educacionais</h4>



          <div class="form">

            <section class="swiper-container">

              <div class="swiper mySwiper">
                <div class="swiper-wrapper">


                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>

                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>

                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>

                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>

                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>

                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>

                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>

                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>
                  </div>
                  <div class="swiper-slide"><img src="imagens/example.PNG">
                    <h6>Call of Cthulu</h6>

                  </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

              </div>
            </section>


            <br><br><br><br>

            <!-- slide -->


            <a id="romanceLink"></a>

            <h4 class="swiper-title">Romançe</h4>

            <div class="form">

              <section class="swiper-container">

                <div class="swiper mySwiper">
                  <div class="swiper-wrapper">


                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>

                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>

                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>

                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>

                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>

                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>

                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>

                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>
                    </div>
                    <div class="swiper-slide"><img src="imagens/example.PNG">
                      <h6>Call of Cthulu</h6>

                    </div>
                  </div>

                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>

                </div>
              </section>


              <br><br><br><br>

              <!-- slide -->


              <a id="aventuraLink"></a>


              <h4 class="swiper-title">Aventura</h4>

              <div class="form">

                <section class="swiper-container">

                  <div class="swiper mySwiper">
                    <div class="swiper-wrapper">


                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>

                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>

                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>

                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>

                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>

                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>

                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>

                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>
                      </div>
                      <div class="swiper-slide"><img src="imagens/example.PNG">
                        <h6>Call of Cthulu</h6>

                      </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                  </div>
                </section>


                <br><br><br><br>

                <!-- slide -->


                <a id="suspenseLink"></a>

                <h4 class="swiper-title">Suspense</h4>

                <div class="form">

                  <section class="swiper-container">

                    <div class="swiper mySwiper">
                      <div class="swiper-wrapper">


                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>

                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>

                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>

                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>

                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>

                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>

                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>

                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>
                        </div>
                        <div class="swiper-slide"><img src="imagens/example.PNG">
                          <h6>Call of Cthulu</h6>

                        </div>

                      </div>

                      <div class="swiper-button-next"></div>
                      <div class="swiper-button-prev"></div>

                    </div>

                  </section>


                  <br><br><br><br>

                  <!-- slide -->


                  <a id="terrorLink"></a>

                  <h4 class="swiper-title">Terror</h4>

                  <div class="form">

                    <section class="swiper-container">

                      <div class="swiper mySwiper">
                        <div class="swiper-wrapper">


                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>

                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>

                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>

                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>

                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>

                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>

                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>

                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>
                          </div>
                          <div class="swiper-slide"><img src="imagens/example.PNG">
                            <h6>Call of Cthulu</h6>

                          </div>

                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                      </div>

                    </section>


                    <br><br><br><br>

                    <!-- slide -->


                    <a id="biografiaLink"></a>

                    <h4 class="swiper-title">Biografia</h4>

                    <div class="form">

                      <section class="swiper-container">

                        <div class="swiper mySwiper">
                          <div class="swiper-wrapper">


                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>

                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>

                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>

                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>

                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>

                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>

                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>

                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>
                            </div>
                            <div class="swiper-slide"><img src="imagens/example.PNG">
                              <h6>Call of Cthulu</h6>

                            </div>

                          </div>

                          <div class="swiper-button-next"></div>
                          <div class="swiper-button-prev"></div>

                        </div>

                      </section>


                      <br><br><br><br>

                      <!-- slide -->


                      <a id="contosLink"></a>

                      <h4 class="swiper-title">Contos</h4>

                      <div class="form">

                        <section class="swiper-container">

                          <div class="swiper mySwiper">
                            <div class="swiper-wrapper">


                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>

                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>

                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>

                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>

                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>

                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>

                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>

                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>
                              </div>
                              <div class="swiper-slide"><img src="imagens/example.PNG">
                                <h6>Call of Cthulu</h6>

                              </div>

                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                          </div>


                          <!-- cabeçalho interativo -->

                          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

                          <script>
                            var didScroll;
                            var lastScrollTop = 0;
                            var delta = 5;
                            var navbarHeight = $('header').outerHeight();

                            $(window).scroll(function(event) {
                              didScroll = true;
                            });

                            setInterval(function() {
                              if (didScroll) {
                                hasScrolled();
                                didScroll = false;
                              }
                            }, 250);

                            function hasScrolled() {
                              var st = $(this).scrollTop();

                              if (Math.abs(lastScrollTop - st) <= delta)
                                return;


                              if (st > lastScrollTop && st > navbarHeight) {
                                $('header').removeClass('nav-down').addClass('nav-up');
                              } else {
                                if (st + $(window).height() < $(document).height()) {
                                  $('header').removeClass('nav-up').addClass('nav-down');
                                }
                              }

                              lastScrollTop = st;
                            }
                          </script>

                          <!-- swiper script -->
                          <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

                          <script>
                            var swiper = new Swiper(".mySwiper", {

                              slidesPerView: 6,
                              autoResize: false,
                              spaceBetween: 70,
                              centeredSlides: true,
                              loop: true,
                              setWrapperSize: true,
                              followFinger: true,
                              setWrapperSize: true,
                              slidesPerGroup: 3,
                              speed: 800,

                              keyboard: {
                                enabled: true,
                                onlyInViewport: true,
                              },

                              breakpoints: {
                                320: {
                                  slidesPerView: 2,
                                  spaceBetween: 15
                                },
                                600: {
                                  slidesPerView: 3,
                                  spaceBetween: 25
                                },
                                900: {
                                  slidesPerView: 4,
                                  spaceBetween: 35
                                },

                                1300: {
                                  slidesPerView: 6,
                                  spaceBetween: 65
                                },

                                1500: {
                                  slidesPerView: 6,
                                  spaceBetween: 65
                                },

                                1800: {
                                  slidesPerView: 6,
                                  spaceBetween: 70
                                },


                              },
                              navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',

                              },

                            });
                          </script>



</body>




<footer>
  <img class="fundos" src="imagens/ondaas.PNG">
</footer>


</html>
<script>
  function sairAlert() {
    location.href = "auth/logout.php";
    alert("Deslogado com sucesso!")
  }

  function controlPanel() {
    location.href = "./controlPanel.php";
  }
</script>