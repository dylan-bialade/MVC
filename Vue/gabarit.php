<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <title><?=$titre ?></title>
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1>Application Garbadge</h1></a>
        <p><?=$banniere ?></p>
      </header>
      <section>
        <?=$contenu ?>
      </section>
      <footer>
        Association ECLAT - <?= date("Y"); ?>
      </footer>
    </div>
  </body>
</html>
