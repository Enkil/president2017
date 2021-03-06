<?php

    require_once ('vendor/autoload.php');
    require_once ('settings.php');

    // UTM
    use UtmCookie\UtmCookie;
    UtmCookie::init();
    UtmCookie::setName('president_utm');
    UtmCookie::setOverwrite(true);
    $dateInterval = DateInterval::createFromDateString('1 day');
    UtmCookie::setLifetime($dateInterval);
?>

<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
  <!-- Head-->
  <head>
    <title><?php echo $app['title']; ?></title>
    <!-- Main Meta information-->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="<?php echo $app['description'] ?>">
    <meta name="author" content="">
    <!-- Meta Information-->
    <meta name="robots" content="index, follow">
    <meta name="language" content="Russian">
    <meta name="msapplication-tooltip" content="<?php echo $app['title']; ?>">
    <meta name="msapplication-starturl" content="<?php echo $app['domain']; ?>">
    <meta name="msapplication-tap-highlight" content="no">
    <!-- OpenGraph microformat-->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $app['title']; ?>">
    <meta property="og:site_name" content="<?php echo $app['title']; ?>">
    <meta property="og:url" content="<?php echo $app['domain']; ?>">
    <meta property="og:description" content="<?php echo $app['description']; ?>">
    <meta property="og:image" content="">
    <!-- Twitter microformat-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="<?php echo $app['domain']; ?>">
    <meta name="twitter:creator" content="">
    <meta name="twitter:url" content="">
    <meta name="twitter:title" content="<?php echo $app['title']; ?>">
    <meta name="twitter:description" content="<?php echo $app['description']; ?>">
    <meta name="twitter:image" content="">
    <meta name="twitter:domain" content="<?php echo $app['domain']; ?>">
    <!-- Site verification-->
    <meta name="google-site-verification" content="<?php echo $app['googleSiteVerification']; ?>">
    <meta name="yandex-verification" content="<?php echo $app['yandexVerification']; ?>">
    <link rel="canonical" href="/">
    <link rel="image_src" href="#">
    <link rel="shortlink" href="#">
    <link type="text/plain" rel="author" href="humans.txt">
    <link rel="stylesheet" href="css/style.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


    <!-- VK Pixel Code-->
    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=JZQssUmff1VuaxaqeavgMPG4NgagpZTPwRXvtyaVSktC2QhipHcb9WAn9eQVYGktyfBUFjtnHEnNF/8WIbGQpSL7gMvHUQqgVDekEktrFkQvjLADHC2DDY*T6Gr2rZCkImpTeFd1IGn416hJX8yMBlli03JIjxrLtNPP2vod7dc-&pixel_id=1000061616';</script>
      <!-- Facebook Pixel Code -->
    <script>
          !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
              n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
              n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
              t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
              document,'script','https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '<?php echo $app['facebookPixel']; ?>', {
              em: 'insert_email_variable,'
          });
          fbq('track', 'PageView');
          fbq('track', 'Lead');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $app['facebookPixel']; ?>&ev=PageView&noscript=1"/></noscript>
      <!-- DO NOT MODIFY -->
      <!-- End Facebook Pixel Code -->

  </head>
  <body>
    <main>
      <!-- Banner-->
      <section class="banner">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-lg-4 offset-lg-8">
              <div class="banner__text-wrapper">
                <div class="banner__text">
                  <div class="banner__logo">
                    <img src="img/logo.png" alt="logo" title="logo">
                  </div>
                  <div class="banner__slogan">Календарь «Президент 2017» — это подарок бизнес-класса. </div>
                  <div class="banner__appeal">Закажи эксклюзивный подарок на Новый Год!</div>
                  <div class="banner__now">
                    <div class="ttu">Только сейчас!</div>Бесплатная доставка по европейской территории России! </div>
                  <div class="banner__btn">
                    <a class="btn js-btn" href="#">Заказать</a>
                  </div>
                </div>
                <div class="banner__price">
                  <div class="banner__price-old">3500 руб.</div>
                  <div class="banner__price-new">1999 руб.</div>
                  <div class="banner__issue">тираж ограниченный</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Reasons-->
      <section class="reasons">
        <div class="container">
          <h2 class="reasons__title">Почему покупка сейчас - отличное решение?</h2>
          <div class="row">
            <div class="reason-item col-xs-12 col-lg-3">
              <h3 class="reason-item__title">Оригинально</h3>
              <div class="reason-item__text">Авторский календарь “Президент 2017” выпущен ограниченным тиражом. </div>
            </div>
            <div class="reason-item col-xs-12 col-lg-3">
              <h3 class="reason-item__title">Стильно</h3>
              <div class="reason-item__text">Эксклюзивные иллюстрации нарисованы талантливым российским иллюстратором. Такой подарок не будет пылиться на полке, он станет украшением любого интерьера.</div>
            </div>
            <div class="reason-item col-xs-12 col-lg-3">
              <h3 class="reason-item__title">Практично</h3>
              <div class="reason-item__text">Мы создали календарь универсального размера, который вы сможете повесить в любом месте ваших апартаментов, сохранив при этом читабельность. </div>
            </div>
            <div class="reason-item col-xs-12 col-lg-3">
              <h3 class="reason-item__title">Универсально</h3>
              <div class="reason-item__text">Наш календарь можно преподнести:
                <ul>
                  <li>деловому партнеру</li>
                  <li>руководителю</li>
                  <li>коллеге</li>
                  <li>отличившемуся сотруднику</li>
                  <li>членам своей семьи</li>
                  <li>друзьям</li>
                  <li>себе любимому</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-lg-7 offset-lg-4">
              <div class="order-now">
                <h2 class="order-now__title">Закажи сейчас и получи скидку в 25%</h2>
                <div class="order-now__description">Процесс заказа займет не более 30 сек.</div>
                <form class="order-now__form" method="post" action="form.php" onsubmit="yaCounter<?php echo $app['yandexMetrika'] ?>.reachGoal('orderOnPage'); return true;">
                  <input class="order-now__input" type="tel" name="phone" placeholder="Ваш телефон" required="required" />
                  <input class="order-now__input" type="hidden" name="formname" value="Заявка с формы на странице"/>
                  <button class="btn btn--form" type="submit" id="pageForm">Заказать</button>
                  <span class="form__success">Спасибо, заявка принята! Наши сотрудники свяжутся с Вами в ближайшее время!</span>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Actions-->
      <section class="actions">
        <div class="container">
          <div class="actions__inner">
            <div class="actions__title">Ваши действия:</div>
            <div class="actions__step">Вы оставляете заявку на приобретение календаря</div>
            <div class="actions__step">Оператор уточнит детали заказа</div>
            <div class="actions__step">В течении 2-5 дней курьер доставит заказ</div>
            <div class="actions__step">Оплата при получении!</div>
            <div class="actions__smile"></div>
          </div>
        </div>
      </section>
      <!-- Cabinet-->
      <section class="cabinet">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-lg-4">
              <div class="cabinet-blue">
                <div class="cabinet-blue__text">
                  <p>Мы с заботой подготовили для Вас календарь, соответствующий самым притязательным вкусам. </p>
                  <p>Качественная печать на высококлассной плотной бумаге. </p>
                  <p>Светлые, яркие цвета. </p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-lg-4 offset-lg-4">
              <div class="cabinet-order">
                <div class="cabinet-order__text">Наш календарь — идеальное дополнение к любому интерьеру!</div>
                <div class="cabinet-order__btn">
                  <a class="btn js-btn" href="#">Заказать</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Gallery-->
      <section class="gallery">
        <div class="container">
          <div class="row row-xs-middle">
            <div class="col-xs-12 col-xl-6">
              <div class="gallery__text">
                <div class="gallery__text-blue">
                  <p>Хочешь, чтобы о твоем подарке помнили весь год? </p>
                </div>
                <div class="gallery__text-black">
                  <p>Не упусти уникальную возможность</p>
                </div>
                <div class="gallery__btn">
                  <a class="btn btn--pay js-btnpay" id="btn--pay" href="#">Оплатить</a>
                </div>
                  <div class="gallery__text-pay">
                      <p>Оплати сразу и сэкономь дополнительно. Стоимость по предоплате 1800р</p>
                  </div>
              </div>
            </div>
            <div class="col-xs-12 col-xl-6">
              <div class="gallery__pics">
                <a class="gallery__img" href="#">
                  <img src="img/pics/img1.jpg" alt="img1" title="img1">
                </a>
                <a class="gallery__img" href="#">
                  <img src="img/pics/img2.jpg" alt="img2" title="img2">
                </a>
                <a class="gallery__img" href="#">
                  <img src="img/pics/img3.jpg" alt="img3" title="img3">
                </a>
                <a class="gallery__img" href="#">
                  <img src="img/pics/img4.jpg" alt="img4" title="img4">
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Properties-->
      <section class="properties">
        <div class="container">
          <div class="row">
            <div class="properties__text-wrapper col-xs-12 col-lg-3">
              <div class="properties__text">Высочайшее качество печати</div>
            </div>
            <div class="properties__text-wrapper col-xs-12 col-lg-3">
              <div class="properties__text">Бесплатная доставка по европейской территории РФ</div>
            </div>
            <div class="properties__text-wrapper col-xs-12 col-lg-2">
              <div class="properties__text">Оплата при получении</div>
            </div>
          </div>
          <div class="opt row">
            <div class="col-xs-12 col-lg-5">
              <div class="opt__text">Если Вы хотите приобрести несколько экземпляров, мы с удовольствием предоставим уникальные и выгодные условия! </div>
            </div>
            <div class="col-xs-12 col-lg-3">
              <div class="opt__btn">
                <a class="btn btn--opt js-btn" href="#">Заказать оптом</a>
              </div>
              <div class="opt__btn-text">со скидкой до 40%</div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- Footer-->
    <footer class="footer">
      <div class="container">
        <div class="row row-xs-middle">
          <div class="col-xs-12 col-lg-3">
            <div class="footer__logo">
              <img src="img/logo.png" alt="logo" title="logo">
            </div>
          </div>
          <div class="col-xs-12 col-lg-3">
            <a class="footer__link footer__link--email" href="dk@regnum.ru" target="_blank">dk@regnum.ru </a>
          </div>
          <div class="col-xs-12 col-lg-3">
            <a class="footer__link footer__link--tel" href="tel:+74959270130" target="_blank">8 495 927 01 30</a>
          </div>
          <div class="col-xs-12 col-lg-3">
            <a class="footer__link footer__link--vk" href="#" target="_blank"></a>
            <a class="footer__link footer__link--fb" href="#" target="_blank"></a>
          </div>
        </div>
      </div>
      <div class="container">
          <div class="row row-xs-middle">
              <div class="col-xs-12">
                  <p class="footer__ogrn">
                      НКО Фонд «РЕГНУМ» Юридический адрес: 123001, Улица Садовая-Кудринская, дом 22/21, стр. 1-2<br>
                      Адрес местонахождения (фактический): 119 072, г. Москва, Берсеневский пер., д. 2, стр. 1. ОГРН 1167700060637
                  </p>
              </div>
          </div>
      </div>
    </footer>
    <div class="overlay js-overlay">
      <div class="overlay__bg"></div>
      <div class="overlay__wrapper">
        <a class="overlay__close" href="#"></a>
        <form class="form" method="post" action="form.php" onsubmit="yaCounter<?php echo $app['yandexMetrika'] ?>.reachGoal('orderInModal'); return true;">
          <input class="form__input" type="text" name="name" placeholder="Ваше имя" required="required" />
          <input class="form__input" type="tel" name="phone" placeholder="Ваш телефон" required="required" />
<!--          <input class="form__input" type="text" name="promo" placeholder="Промокод" />-->
          <input class="form__input" type="hidden" name="formname" value="Заявка с формы в модальном окне"/>
          <button class="btn btn--form" type="submit" id="modalForm">Заказать</button>
          <span class="form__success">Спасибо, заявка принята! <br>Наши сотрудники свяжутся с Вами в ближайшее время!</span>
        </form>
      </div>
    </div>

    <!-- Yandex Money Form   -->
    <div class="overlay overlay--pay">
        <div class="overlay__bg"></div>
        <div class="overlay__wrapper">
            <a class="overlay__close" href="#"></a>
            <form class="form form--pay js-payform" method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" onsubmit="yaCounter<?php echo $app['yandexMetrika'] ?>.reachGoal('payInModal'); return true;">

                <div class="payfor">
                    <h3>Оплатить календарь "Президент"</h3>
                    <p>После оплаты оператор свяжется с вами и уточнит удобное время доставки</p>
                    <p>При нажатии кнопки "Оплатить" вы будете перенаправлены на сайт платежной системы.</p>
                </div>

                <div>
                    <p>Выберите регион доставки:</p>
                    <label ><input type="radio" name="region" data-price="0" id="rf-euro">Доставка по европейской территории РФ - бесплатно</label>
                    <label ><input type="radio" name="region" data-price="300" id="rf-all">Остальная территория РФ - 300 руб</label>
                    <label ><input type="radio" name="region" data-price="500" id="world">Международная доставка" - 500 руб</label>
                </div>

                <input type="hidden" name="receiver" value="41001750055565">
                <input type="hidden" name="quickpay-form" value="shop">
                <input type="hidden" name="targets" value="Regnum: Предоплата календаря 'Президент 2017'">

                <div class="ym">
                    <p>Выбирите тип оплаты:</p>
                    <label><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>
                    <label><input type="radio" name="paymentType" value="AC">Банковской картой</label>
                </div>


                <input type="hidden" name="sum" value="1800" data-type="number" class="js-ym-sum">

                <input type="hidden" name="formcomment" value="НКО Фонд «РЕГНУМ»">
                <input type="hidden" name="successURL" value="https://president.regnum.ru">
                <input type="hidden" name="short-dest" value="Regnum: Предоплата календаря 'Президент 2017'">

                <input type="hidden" name="comment" value="">
                <input type="hidden" name="need-fio" value="true">
                <input type="hidden" name="need-email" value="false">
                <input type="hidden" name="need-phone" value="true">
                <input type="hidden" name="need-address" value="true">

                <p class="pricefor">Общая стоимость с учетом скидки: <span class="js-pricepay">1999</span>руб</p>

                <input type="submit" value="Оплатить">
            </form>
        </div>
    </div>
    <script src="js/script.min.js"></script>

    <!--  CallbackKiller  -->
    <link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
    <script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=<?php echo $app['CallbackkillerID']?>" charset="UTF-8" async></script>
    <!-- Yandex.Metrika counter-->
    <script>
      (function(d, w, c)
      {
        (w[c] = w[c] || []).push(function()
        {
          try
          {
            w.yaCounter<?php echo $app['yandexMetrika'] ?> = new Ya.Metrika(
            {
              id: 41772859,
              clickmap: true,
              trackLinks: true,
              accurateTrackBounce: true,
              webvisor: true
            });
          }
          catch (e)
          {}
        });
        var n = d.getElementsByTagName("script")[0],
          s = d.createElement("script"),
          f = function()
          {
            n.parentNode.insertBefore(s, n);
          };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]")
        {
          d.addEventListener("DOMContentLoaded", f, false);
        }
        else
        {
          f();
        }
      })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
      <div>
        <img src="https://mc.yandex.ru/watch/<?php echo $app['yandexMetrika'] ?>" style="position:absolute; left:-9999px;" alt="" />
      </div>
    </noscript>
    <!-- Google Analytics counter-->
    <script>
      (function(i, s, o, g, r, a, m)
      {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function()
        {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
      ga('create', '<?php echo $app['googleAnalytics'] ?>', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>