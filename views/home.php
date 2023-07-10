<?php
require 'header.php';

?>
<?php

require_once '../controllers/Database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../controllers/Database.php';
require_once '../controllers/BaseController.php'; // Nouveau
require_once '../controllers/Utils.php'; // Nouveau

?>

<?php
    // Connexion à la base de données
    $db = new Database();
    $conn = $db->connect();

    // Récupération des produits
    $sql = "SELECT * FROM products WHERE category = 'featured'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
.product {
    display: flex;
    width: 50vw;
    margin-left: 12vw;
    margin-right: 12vw;
    margin-top: 3vw;
}

.product .images {
    width: 27vw;
}

.product .images img {
    max-width: 100%;
    height: auto;
    margin-bottom: 2rem;
    border-radius: 5%;
}

.product .images .sub-images img {
    /* width: 6.75vw; updated this line */
    margin-right: 0.5em;
    cursor: pointer; /* Indicate that the images are clickable */
}

.product .images .sub-images img:last-child {
    margin-right: 0;
}

.product .information {
    width: 50%;
    padding-left: 1em;
}

.sub-images {
    display: flex;
    width: 27vw;
}

@keyframes fade-in {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

.fade-in {
  animation-name: fade-in;
  animation-duration: 2s;
}
</style>


<?php foreach ($products as $product) : ?>
    <div class="product">
        <div class="images">
            <img id="mainImage" src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">

            <div class="sub-images">
            <?php 
            // Exécutez une autre requête ici pour récupérer les images supplémentaires pour ce produit
            $sql = "SELECT image_url, hq_image_url FROM product_images WHERE product_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$product['id']]);
            $sub_images = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Cette ligne récupère uniquement la colonne image_url

            foreach ($sub_images as $sub_image) : ?>
                <img class="subImage" src="<?php echo htmlspecialchars($sub_image['image_url']); ?>" data-hq="<?php echo htmlspecialchars($sub_image['hq_image_url']); ?>" alt="Supplementary image for <?php echo htmlspecialchars($product['name']); ?>">
            <?php endforeach; ?>
            </div>
        </div>

        <div class="information">
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <p><?php echo htmlspecialchars($product['price']); ?>€</p>
        </div>
    </div>
<?php endforeach; ?>
<script>
    // Nous utilisons des écouteurs d'événements pour définir le comportement lorsqu'une image est cliquée
    document.querySelectorAll('.subImage').forEach(img => {
        img.addEventListener('click', function(e) {
            // Mettre à jour l'image principale avec l'image de haute qualité
            let mainImage = document.querySelector('#mainImage');
            mainImage.classList.remove('fade-in'); // remove the class
            void mainImage.offsetWidth; // trigger a reflow
            mainImage.classList.add('fade-in'); // add the class back
            mainImage.src = e.target.dataset.hq;

            // Enlever la bordure de toutes les sous-images
            document.querySelectorAll('.subImage').forEach(img => {
                img.style.border = 'none';
            });

            // Ajouter une bordure orange à l'image sélectionnée
            e.target.style.border = '2px solid orange';
        });
    });

    // Sélectionner la première sous-image et lui ajouter la bordure orange
    window.onload = function() {
        let firstSubImage = document.querySelector('.subImage');
        if (firstSubImage) {
            firstSubImage.style.border = '2px solid orange';
        }
    }

    function setSubImageWidths() {
    let mainImageWidth = document.querySelector('#mainImage').offsetWidth;
    let subImages = document.querySelectorAll('.subImage');
    let numberOfSubImages = subImages.length;

    // If there are no sub-images, there's nothing to do
    if (numberOfSubImages === 0) {
        return;
    }

    // Calculate the width for each sub-image, accounting for the margins
    let subImageWidth = (mainImageWidth - (numberOfSubImages - 1) * 8) / numberOfSubImages;

    // Set the width of each sub-image
    subImages.forEach(img => {
        img.style.width = subImageWidth + 'px';
    });
}

// Call this function once when the page loads
window.addEventListener('load', setSubImageWidths);

// Call this function again whenever the window is resized
window.addEventListener('resize', setSubImageWidths);

</script>





