<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IOT</title>
    <link href="assets/utils.css" rel="stylesheet">
</head>
<body>
    <section class="container bg-gray-200 px-8 py-10">
        <h1 class="text-4xl mb-8">Ajouter des images en base de données</h1>
        <div class="w-100">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="add.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Nom des sprites
                    </label>
                    <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" placeholder="Nom">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Ajouter des images
                    </label>
                    <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="images" name="images[]" type="file" placeholder="Images" multiple>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Envoyer
                </button>


            </form>
        </div>
    </section>
</body>
</html>