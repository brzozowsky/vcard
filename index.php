<?php

    require_once('inc/class.LanguageMenuOption.php');
    require_once('inc/class.ContentInjector.php');

    $contentInjector = new ContentInjector();
    $contentInjector->loadJSON('content/content.json');

    LanguageMenuOption::setActiveClassName($contentInjector->content('css_active_language_menu_option'));
    LanguageMenuOption::setInactiveClassName($contentInjector->content('css_inactive_language_menu_option'));

    $displayLanguage = $contentInjector->getDisplayLanguage();
    $contentInjector->setContentLanguage($displayLanguage);
?>
<!doctype html>
<html lang="<?=$contentInjector->getDisplayLanguage()?>">
      <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="<?=$contentInjector->content('meta_description')?>">

            <title><?=$contentInjector->content('meta_title')?></title>

            <link rel="stylesheet" href="<?=$contentInjector->content('style_src')?>">
            <link rel="canonical" href="<?=$contentInjector->content('canonical')?>">

            <link rel="apple-touch-icon" sizes="180x180" href="appdata/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="appdata/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="appdata/favicon-16x16.png">
            <link rel="manifest" href="appdata/site.webmanifest">
            <link rel="mask-icon" href="appdata/safari-pinned-tab.svg" color="#5bbad5">

            <meta name="msapplication-TileColor" content="#0c1727">
            <meta name="theme-color" content="#181b2d">   
         
            <script defer src="src/index.js"></script>
      </head>
      <body <?=$contentInjector->getBodyData()?>>
            <div id="overlay"></div>
            <div class="vcard-container">
                  <nav class="nav-languages">
                        <ul class="nav-languages-list">
                            <?php $contentInjector->renderLanguageMenuOptions() ?>
                        </ul>
                  </nav>
                  <main class="vcard-wrapper">
                        <aside class="vcard-aside">
                              <div class="vcard-avatar-wrapper">
                                    <img class="vcard-avatar" src="<?=$contentInjector->content('avatar_src')?>"  alt="Avatar image">
                              </div>
                              <div class="social-icon-wrapper">
                                    <?php $contentInjector->injectExternalLinks() ?>
                              </div>
                        </aside>
                        <article>
                              <h1 class="vcard-header vcard-header-top color-def">
                                    <span id="name">
                                        <?=$contentInjector->content('name')?>
                                    </span>
                              </h1>
                              <p class="vcard-header vcard-header-description color-gray">
                                    <span id="shortdesc">
                                          <?=$contentInjector->content('short_description')?>
                                    </span>
                              </p>
                              <p class="vcard-content color-def">
                                  <span id="longdesc">
                                        <?=$contentInjector->content('long_description')?>
                                  </span>
                              </p>
                        </article>
                  </main>
                  <footer>
                        <address class="vcard-email">
                              <a id="email" class="color-dark" href="#">
                                    <?=$contentInjector->content('bot_safe_email')?>
                              </a>
                        </address>
                  </footer>
            </div>
      </body>
</html>