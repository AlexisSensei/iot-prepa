<?php 
require_once 'connect.php';
require_once 'func.php';

if(isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    $data = $database->prepare("SELECT * FROM sprites WHERE slug = :slug");
    $data->execute([
        'slug' => $slug
    ]);
    $sprites = $data->fetch(PDO::FETCH_ASSOC);
    $spritesImg = json_decode($sprites['images']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/utils.css" rel="stylesheet">
</head>
<body>
    <?php if(!empty($sprites)) : ?>
        <div class="container py-4">
            <h1 class="text-bold text-3xl text-bold mb-6"><?= $sprites['name']; ?></h1>
            <div class="flex gap-4 py-2">
                <?php foreach($spritesImg as $img) : ?>
                    <img src="<?= $img ?>" alt="">
                <?php endforeach; ?>
            </div>
            <div class="py-2">
                <img src="" alt="" class="animatedSprites">
            </div>
        </div>
    <?php else : ?>
    <div class="container">
        <h1>Nothing to show</h1>
    </div>
    <?php endif; ?>
    <script>
        let images = []
        <?php foreach($spritesImg as $img) : ?>
            images.push('<?= $img ?>')
        <?php endforeach; ?>
        console.table(images)
        let target = document.querySelector('.animatedSprites')
        function animate(sprites) {
            sprites.forEach(el => {
                console.log(el)
                //target.src = el
                setTimeout(function() {
                    target.src = el
                }, 200)
            })
        }
        setInterval(animate(images), images.length*100)
    </script>
</body>
</html>