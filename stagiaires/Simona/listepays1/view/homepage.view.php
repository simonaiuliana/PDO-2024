<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les pays du monde</title>
</head>
<body>
    <h1>Les pays du monde</h1>
    <h3>Nombre de pays dans notre liste : <=$nbPays?></h3>
    <p>utilisation de la boucle while avec fetch pour lister toutes les pays.</p>
    <pre><code>
        <div>
            <?php
        while($item = $query->fetch(PDO::FETCH_ASSOC))
        {
          echo "$item";
        }
        ?>
        <p><?=$item['nom']?></p>
        <?php
        endwhile;
        ?>
        </div>

    </code></pre>

</body>
</html>