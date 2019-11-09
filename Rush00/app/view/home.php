<div id="left">
    <ul class="menu">
        <li class="violet"><a href="#">Catégories</a>
            <ul>
                <li>
                    <?php
                    require('app/model/product_class.php');
                    $list = add_list_categorie();

                    $list = mysqli_fetch_all($list);
                    foreach ($list as $key => $elem) {
                        $link = "index.php?categorie=" . $elem[0];
                        echo "<li>";
                        echo "<a href='" . $link . "' class=\"link_categorie\">" . $elem[0] . "</a>";
                        echo "</li>";
                    }
                    $list = mysqli_fetch_assoc($list);
                    foreach ($list as $elem) {
                        $link = "index.php?categorie=" . $elem;
                        echo "<a href='" . $link . "'>" . $elem . "</a>";
                    }
                    ?>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div id="middle">
    <?php if (isset($_GET['categorie'])) : ?>
        <h2>Catégorie <?= $_GET['categorie']; ?></h2>
        <div class="img_middle">
            <div class="list_item">
                <?php

                    $item = add_product_categorie($_GET['categorie']);
                    foreach ($item as $var) {
                        echo "<div class='img_middle_home'><p>";
                        echo "<a href=\"index.php?view=product&ref=" . $var['ref'] . "\" id=\"" . $var['ref'] . "\">";
                        echo "<img class=\"img_mid\" alt=\"t-shirt\" src=\" " . $var['src_img'] . "\"\>";
                        echo "</a>" . $var['price'] . "&#8364</p></div>";
                    }

                    ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!isset($_GET['categorie'])) : ?>
        <br />
        <h2>Nos produits coup de <img class="img_emo" alt="coeur" src="https://www.stockholmpourlesenfants.com/wp-content/uploads/2016/03/coeur.png" /></h2>
        <div class="img_middle">
            <div class="list_item">
                <?php

                    $item = add_all_product();
                    foreach ($item as $var) {
                        echo "<div class='img_middle_home'><p>";
                        echo "<a href=\"index.php?view=product&ref=" . $var['ref'] . "\" id=\"" . $var['ref'] . "\">";
                        echo "<img class=\"img_mid\" alt=\"t-shirt\" src=\" " . $var['src_img'] . "\"\>";
                        echo "</a>" . $var['price'] . "&#8364</p></div>";
                    }

                    ?>

            </div>
        </div>
        <h2>Chaussure de Sport</h2>
        <div class="img_middle">
            <div class="list_item">
                <?php

                    $item = add_product_categorie("sport");
                    foreach ($item as $var) {
                        echo "<div class='img_middle_home'><p>";
                        echo "<a href=\"index.php?view=product&ref=" . $var['ref'] . "\" id=\"" . $var['ref'] . "\">";
                        echo "<img class=\"img_mid\" alt=\"t-shirt\" src=\" " . $var['src_img'] . "\"\>";
                        echo "</a>" . $var['price'] . "&#8364</p></div>";
                    }

                    ?>

            </div>
        </div>
    <?php endif; ?>


</div>