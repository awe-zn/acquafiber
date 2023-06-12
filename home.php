<?php
$theme = get_bloginfo("template_url");
?>

<?php get_header(); ?>

<style>
  #main-home .swiper-main .swiper-main-next,
  #main-home .swiper-main .swiper-main-prev {
    background: #ffffff80;
    border-radius: 50%;
    background-image: url(<?= $theme; ?>/dist/img/svg/next-prev-arrow-2.svg);
    background-position: center;
    background-repeat: no-repeat;
  }

  #piscinas #detalhes {
    border: 1px solid #f2f3f5;
    box-shadow: 0px 15px 15px #fff7f2;
    padding: 0;
    margin-top: 45px;
    border-radius: 20px;
    background: url(<?= $theme; ?>/dist/img/svg/blue-arrow.svg) no-repeat center;
    background-position-y: -10px;
  }

  #piscinas #detalhes img.img-detalhe {
    border-radius: 10px;
    box-shadow: 10px 25px 25px -25px rgba(80, 64, 128, 0.5);
  }

  .emphasis {
    background: url(<?= $theme; ?>/dist/img/svg/waves.svg) no-repeat bottom;
  }
</style>

<main id="main-home">
  <div class="swiper-main position-relative overflow-hidden">
    <div class="swiper-wrapper">

      <?php
      $args = array(
        'post_type' => 'slides',
        'posts_per_page' => -1, // Exibir todos os slides
      );

      $slides_query = new WP_Query($args);

      if ($slides_query->have_posts()) {
        while ($slides_query->have_posts()) {
          $slides_query->the_post();
          ?>
          <div class="swiper-slide" style="background: url(<?= get_field('cover_image'); ?>) no-repeat; background-size: cover;">
            <div style="background: linear-gradient(270deg, rgba(33, 184, 217, 0) 0%, #063266 100%); padding: 180px 0 0 0;">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-8">
                    <?php
                    $title = get_the_title();
                    $title_regex = '/\*\*(.*?)\*\*/';
                    $formatted_title = preg_replace($title_regex, '<span class="text-yellow-2">$1</span>', $title);
                    ?>
                    <h1 class="fz-32 fz-sm-44 fw-bold ff-ubuntu text-white">
                      <?= $formatted_title; ?>
                    </h1>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="py-5 ff-nunito text-white fz-20">
                      <p>
                        <?= get_field('descricao'); ?>
                      </p>
                    </div>
                    <?php
                    if (get_field('has_button')) { ?>
                      <a href="<?= get_field('button_link'); ?>" class="btn btn-gradient-2 text-white fz-16 fw-semi-bold text-uppercase d-inline-flex align-items-center justify-content-center gap-2">
                        <img src="<?= $theme; ?>/dist/img/svg/btn-arrows.svg" alt="">
                        <?= get_field('button_text'); ?>
                      </a>
                    <?php }
                    ?>
                  </div>
                  <div class="col-12 d-flex gap-3 justify-content-end pt-awe-64 pb-awe-12">
                    <div class="swiper-main-prev"></div>
                    <div class="swiper-main-next"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        wp_reset_postdata();
      } else { ?>
        Ainda não há slides por aqui
      <?php }
      ?>
    </div>
  </div>
</main>

<section id="introducao-piscinas">
  <div class="container pt-awe-108 pb-awe-64">
    <div class="row">
      <div class="col-12">
        <h2 class="text-uppercase text-black-5 fz-18 ff-open-sans">
          O MELHOR CATÁLOGO DE PISCINAS
        </h2>
      </div>
      <div class="col-12 col-md-10 col-lg-5 pt-awe-16">
        <h3 class="text-black-2 ff-ubuntu fz-">
          Aqui você encontra o formato de piscina ideal para sua necessidade
        </h3>
      </div>
      <div class="col-12 col-lg-6 offset-lg-1 text-end">
        <div class="text-black-5 fz-18 ff-open-sans pt-awe-32 pb-awe-16 text-start">
          <p>
            Consulte a lista de modelos de piscinas abaixo e descubra qual se encaixa melhor no seu espaço. Temos o
            modelo ideal para você.
          </p>
        </div>
        <a href="<?= get_field('catalogo_link', get_option('home_page_id')); ?>" target="_blank" class="text-orange fz-18 ff-open-sans fw-bold">
          Baixe nosso catálogo completo
        </a>
      </div>
    </div>
  </div>
</section>


<section id="piscinas" class="container pt-awe-64 pb-awe-56 px-0">
  <div class="position-relative ps-awe-40 pb-awe-32">
    <h4 class="text-blue ff-ubuntu fz-24 fw-regular">
      Principais modelos
    </h4>
  </div>

  <?php
  $args = array(
    'post_type' => 'piscinas',
    'posts_per_page' => -1, // Exibir todos os slides
  );

  $piscinas_query = new WP_Query($args);

  if ($piscinas_query->have_posts()) { ?>

    <div class="carrossel-linhas overflow-hidden px-awe-32 px-lg-0">
      <div class="swiper-wrapper d-lg-flex flex-lg-wrap gap-lg-awe-32">


        <?php
        while ($piscinas_query->have_posts()) {
          $piscinas_query->the_post();
          $modelos = CFS()->get('modelos_piscina');
          if (get_field('is_highlighted') == 'sim') {
            ?>

            <a id="modelo-<?= get_the_ID(); ?>" href="#detalhes" class="swiper-slide is-active" data-modelo>
              <div>
                <img src="<?= get_field('miniatura'); ?>" class="img-fluid" alt="">
              </div>
              <span class="ff-open-sans fz-18 pt-awe-12 d-block">
                Linha
                <span class="text-uppercase fw-bold">
                  <?php the_title(); ?>
                </span>
              </span>
              <span class="text-black-6 fz-14 ff-open-sans d-inline-flex gap-2">
                <div>
                  <img src="<?= $theme; ?>/dist/img/svg/escada.svg" alt="">
                </div>
                <span>
                  <?= Count($modelos); ?>
                  modelos
                </span>
              </span>
            </a>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </div>
    </div>
    <?php
  } else {
    echo 'Nenhuma piscina cadastrada.';
  }
  ?>

  <div id="detalhes" class="pt-awe-108 overflow-hidden">
    <?php
    $args = array(
      'post_type' => 'piscinas',
      'posts_per_page' => -1, // Exibir todos os slides
    );

    $piscinas_query = new WP_Query($args);

    if ($piscinas_query->have_posts()) { ?>

      <div class="carrossel-linhas overflow-hidden px-awe-32 px-lg-0">
        <div class="swiper-wrapper d-lg-flex flex-lg-wrap gap-lg-awe-32">


          <?php
          while ($piscinas_query->have_posts()) {
            $piscinas_query->the_post();
            $modelos = CFS()->get('modelos_piscina');

            if (get_field('is_highlighted') == 'sim') {
              ?>

              <div id="detalhe-<?= get_the_ID(); ?>" class="container-fluid d-none" data-detalhe>
                <div class="row px-awe-32">
                  <div class="col-12 col-lg-6 pt-awe-32 pt-lg-0">
                    <img src="<?= get_field('imagem_principal'); ?>" class="img-fluid img-detalhe" alt="">
                  </div>
                  <div class="col-12 col-lg-5 order-first order-lg-last">
                    <div class="d-block pb-awe-16">
                      <h3 class="emphasis-2 p-1 d-inline text-black-2 fz-24 ff-ubuntu fw-regular">
                        Linha
                        <span class="fw-bold">
                          <?php the_title(); ?>
                        </span>
                      </h3>
                    </div>
                    <span class="text-black-6 d-inline-flex gap-2">
                      <img src="<?= $theme; ?>/dist/img/svg/escada.svg" alt="">
                      <?= Count($modelos); ?> modelos
                    </span>
                    <div class="ff-open-sans fz-16 text-black-4 pt-awe-16">
                      <?php the_content(); ?>
                    </div>
                    <p class="text-orange fz-16 ff-open-sans">
                      Ficou interessado? Venha conversar com nosso atendimento.
                    </p>
                    <a href="#orcamento" class="btn btn-blue-2 mt-awe-16 d-block d-md-inline-block">
                      Fazer Orçamento
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 d-flex justify-content-between px-awe-32 pt-awe-56 pb-3">
                    <h5 class="text-black-2 ff-ubuntu fz-24">
                      Nossos modelos
                    </h5>
                    <div class="d-flex gap-awe-16">
                      <button class="swiper-prev">
                        <img src="<?= $theme; ?>/dist/img/svg/next-prev-arrow.svg" alt="">
                      </button>
                      <button class="swiper-next">
                        <img src="<?= $theme; ?>/dist/img/svg/next-prev-arrow.svg" alt="">
                      </button>
                    </div>
                  </div>
                  <div class="col-12 p-0">
                    <div class="carrossel-tamanhos pt-awe-56 pb-awe-64 px-awe-32">
                      <div class="swiper-wrapper">
                        <?php
                        if ($modelos) {
                          foreach ($modelos as $modelo) { ?>

                            <div class="swiper-slide">
                              <h5 class="text-black-2 ff-open-sans fz-16 text-uppercase text-center">
                                <?= $modelo['nome_do_modelo'] ?>
                              </h5>
                              <div class="py-awe-12">
                                <img src="<?= $modelo['imagem_modelo'] ?>" alt="">
                              </div>
                              <div class="text-black-4 ff-open-sans fz-14 px-2 position-absolute bottom-0">
                                <span>Largura
                                  <?= $modelo['largura'] ?> | Prof.
                                  <?= $modelo['profundidade'] ?>
                                </span>
                              </div>
                            </div>

                          <?php }
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            } else { ?>
              <div id="detalhe-<?= get_the_ID(); ?>" class="container-fluid d-none" data-detalhe>
                <div class="row px-awe-32">
                  <div class="col-12 order-first order-lg-last">
                    <div class="d-block pb-awe-16">
                      <h3 class="emphasis-2 p-1 d-inline text-black-2 fz-24 ff-ubuntu fw-regular">
                        Linha
                        <span class="fw-bold">
                          <?php the_title(); ?>
                        </span>
                      </h3>
                    </div>
                    <span class="text-black-6 d-inline-flex gap-2">
                      <img src="<?= $theme; ?>/dist/img/svg/escada.svg" alt="">
                      <?= Count($modelos); ?> modelos
                    </span>
                    <div class="ff-open-sans fz-16 text-black-4 pt-awe-16">
                      <?php the_content(); ?>
                    </div>
                    <p class="text-orange fz-16 ff-open-sans">
                      Ficou interessado? Venha conversar com nosso atendimento.
                    </p>
                    <a href="#orcamento" class="btn btn-blue-2 mt-awe-16 d-block d-md-inline-block">
                      Fazer Orçamento
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 d-flex justify-content-between px-awe-32 pt-awe-56 pb-3">
                    <h5 class="text-black-2 ff-ubuntu fz-24">
                      Nossos modelos
                    </h5>
                    <div class="d-flex gap-awe-16">
                      <button class="swiper-prev">
                        <img src="<?= $theme; ?>/dist/img/svg/next-prev-arrow.svg" alt="">
                      </button>
                      <button class="swiper-next">
                        <img src="<?= $theme; ?>/dist/img/svg/next-prev-arrow.svg" alt="">
                      </button>
                    </div>
                  </div>
                  <div class="col-12 p-0">
                    <div class="carrossel-tamanhos pt-awe-56 pb-awe-64 px-awe-32">
                      <div class="swiper-wrapper">
                        <?php
                        if ($modelos) {
                          foreach ($modelos as $modelo) { ?>

                            <div class="swiper-slide">
                              <h5 class="text-black-2 ff-open-sans fz-16 text-uppercase text-center">
                                <?= $modelo['nome_do_modelo'] ?>
                              </h5>
                              <div class="py-awe-12">
                                <img src="<?= $modelo['imagem_modelo'] ?>" alt="">
                              </div>
                              <div class="text-black-4 ff-open-sans fz-14 px-2 position-absolute bottom-0">
                                <span>Largura
                                  <?= $modelo['largura'] ?> | Prof.
                                  <?= $modelo['profundidade'] ?>
                                </span>
                              </div>
                            </div>

                          <?php }
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          wp_reset_postdata();
          ?>
        </div>
      </div>
      <?php
    } else {
      echo 'Nenhuma piscina cadastrada.';
    }
    ?>
  </div>
</section>

<section id="mais-piscinas">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-between px-awe-32 pt-awe-56">
        <div class="position-relative ps-awe-22">
          <h4 class="text-black-4 ff-ubuntu fz-24 fw-regular">
            Outros modelos
          </h4>
        </div>
        <div class="d-flex gap-awe-16">
          <button class="swiper-prev-2">
            <img src="<?= $theme; ?>/dist/img/svg/next-prev-arrow.svg" alt="">
          </button>
          <button class="swiper-next-2">
            <img src="<?= $theme; ?>/dist/img/svg/next-prev-arrow.svg" alt="">
          </button>
        </div>
      </div>
      <div class="col-12 p-0">
        <div class="carrossel-outras-linhas pt-awe-32 pb-awe-64 px-awe-32 overflow-hidden">
          <div class="swiper-wrapper">
            <?php
            $args = array(
              'post_type' => 'piscinas',
              'posts_per_page' => -1, // Exibir todos os slides
            );

            $piscinas_query = new WP_Query($args);

            if ($piscinas_query->have_posts()) { ?>

              <div class="carrossel-linhas overflow-hidden px-awe-32 px-lg-0">
                <div class="swiper-wrapper d-lg-flex flex-lg-wrap gap-lg-awe-32">


                  <?php
                  while ($piscinas_query->have_posts()) {
                    $piscinas_query->the_post();
                    $modelos = CFS()->get('modelos_piscina');
                    if (get_field('is_highlighted') == 'nao') { ?>

                      <a id="modelo-<?= get_the_ID(); ?>" href="#detalhes" class="swiper-slide" data-modelo>
                        <span class="ff-open-sans fz-18 d-block text-uppercase text-black-4">
                          Linha
                          <span class="text-uppercase fw-bold">
                            <?php the_title(); ?>
                          </span>
                        </span>
                        <span class="text-black-6 fz-14 ff-open-sans">
                          <?= Count($modelos); ?> modelos
                        </span>
                      </a>
                    <?php }
                  }
                  wp_reset_postdata();
                  ?>
                </div>
              </div>
              <?php
            } else {
              echo 'Nenhuma piscina cadastrada.';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="duvidas">
  <div class="duvidas-normal">
    <div class="container py-awe-108 py-lg-awe-64">
      <div class="row">
        <div class="col-12 col-lg-1 d-flex justify-content-center justify-content-lg-start pb-awe-32 pb-lg-0 position-relative gotas">
          <div class="pt-awe-6">
            <img width="60" src="<?= $theme; ?>/dist/img/svg/whatsapp.svg" alt="">
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="pb-awe-16">
            <h5 class="ff-ubuntu fz-32 text-white text-center text-lg-start">
              Ficou com dúvida ou podemos te ajudar de outra forma?
            </h5>
          </div>
          <div class="pt-awe-16 pb-awe-64 pb-lg-0 pt-lg-0">
            <p class="ff-open-sans fz-18 text-white text-center text-lg-start">
              Temos consultores preparados para te ajudar no que você precisar. Entre em contato e descubra como podemos
              te surpreender.
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-5 d-flex justify-content-center justify-content-lg-end align-items-center">
          <a href="<?= get_field('whatsapp_link', get_option('home_page_id')); ?>" class="btn btn-blue-2 text-white text-uppercase fz-16 fw-semi-bold ff-open-sans">
            fale com nosso atendimento
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="duvidas-fixo">
    <div class="container py-awe-16">
      <div class="row">
        <div class="col-1">
          <img width="60" src="<?= $theme; ?>/dist/img/svg/whatsapp.svg" alt="">
        </div>
        <div class="col-3 px-0 d-flex align-items-center">
          <h5 class="ff-open-sans fz-18 text-white">
            Ficou com dúvida ou podemos te ajudar de outra forma?
          </h5>
        </div>
        <div class="col-8 d-flex justify-content-end align-items-center">
          <a href="<?= get_field('whatsapp_link', get_option('home_page_id')); ?>" class="btn btn-blue-2 text-white text-uppercase fz-16 fw-semi-bold ff-open-sans">
            fale com nosso atendimento
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="sobre" class="container pt-awe-96 pb-awe-150">
  <div class="row justify-content-between">
    <div class="col-12">
      <h3 class="text-uppercase text-black-5 fz-18 ff-open-sans">
        Sobre nós
      </h3>
    </div>
    <div class="col-12 col-lg-5">
      <?php
      $title = get_field('sobre_titulo', get_option('home_page_id'));
      $title_regex = '/\*\*(.*?)\*\*/';
      $formatted_title = preg_replace($title_regex, '<span class="emphasis">$1</span>', $title);
      ?>
      <h2 class="text-black-3 fw-light ff-ubuntu fz-44">
        <?= $formatted_title; ?>
      </h2>
    </div>
    <div class="col-12 col-lg-6 py-awe-32 py-lg-0">
      <div class="fz-18 ff-open-sans text-black-3 sobre-nos">
        <?= get_field('sobre_nos', get_option('home_page_id')); ?>
      </div>
    </div>
  </div>
</section>

<section id="orcamento">
  <div class="container">
    <div class="row justify-content-center justify-content-lg-start">
      <div class="col-12 col-lg-4 text-black-4" id="#contatos">
        <h4 class="fz-24 fw-bold ff-ubuntu">
          Nossos contatos
        </h4>
        <div class="pt-awe-64 d-flex flex-lg-column flex-wrap gap-awe-32">
          <div>
            <h5 class="ff-open-sans fz-16 fw-semi-bold">
              Endereço
            </h5>
            <p class="ff-open-sans fz-14">
              <?= get_field('endereco_empresa', get_option('home_page_id')); ?> <br> CEP:
              <?= get_field('cep_empresa', get_option('home_page_id')); ?>
            </p>
          </div>
          <div>
            <h5 class="ff-open-sans fz-16 fw-semi-bold">
              Fale pelo telefone
            </h5>
            <p class="ff-open-sans fz-14">
            <p class="text-black-3 text-orange-hover text-decoration-none d-inline">
              <?= get_field('telefone_empresa_1', get_option('home_page_id')); ?>
            </p> |
            <p class="text-black-3 text-orange-hover text-decoration-none d-inline">
              <?= get_field('telefone_empresa_2', get_option('home_page_id')); ?>
            </p> <br>
            <a href="mailto:<?= get_field('email_atendimento', get_option('home_page_id')); ?>" class="text-black-3 text-orange-hover text-decoration-none">
              <?= get_field('email_atendimento', get_option('home_page_id')); ?>
            </a>
            </p>
          </div>
          <div>
            <h5 class="ff-open-sans fz-16 fw-semi-bold">
              Nossas mídias
            </h5>
            <span class="d-inline-flex gap-3">
              <a target="_blank" href="<?= get_field('instagram_link', get_option('home_page_id')); ?>" class="">
                <img src="<?= $theme; ?>/dist/img/svg/instagram-dark.svg" alt="">
              </a>
              <a target="_blank" href="<?= get_field('whatsapp_link', get_option('home_page_id')); ?>" class="">
                <img src="<?= $theme; ?>/dist/img/svg/whatsapp-dark.svg" alt="">
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-10 col-lg-6 offset-lg-2 order-first order-lg-last px-lg-awe-32 pb-awe-64 pb-lg-0">
        <?= do_shortcode('[contact-form-7 id="5" title="Formulário de orçamento"]'); ?>
        <!-- <div class="ff-open-sans">
          <h3 class="text-blue ff-ubuntu fz-32 text-center">
            Solicite um orçamento
          </h3>
          <p class="text-center text-black-3 fz-18">
            Preencha os campos abaixo para realizarmos um orçamento com o melhor custo-benefício do mercado.
          </p>
          <div class="d-flex flex-column gap-awe-22 fz-14 text-black-2 pt-awe-32 pb-awe-56">
            <div>
              <label>Nome</label>
              <input type="text" placeholder="Digite seu nome">
            </div>
            <div>
              <label>Telefone</label>
              <input type="number" placeholder="Digite um número de telefone">
            </div>
            <div>
              <label>E-mail</label>
              <input type="email" placeholder="Digite seu e-mail">
            </div>
            <div>
              <label>Cidade/UF</label>
              <input class="form-control" type="text" placeholder="Digite a cidade e estado de instalação da piscina">
            </div>
          </div>
          <button type="submit">Solicitar atendimento</button>
        </div> -->
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>