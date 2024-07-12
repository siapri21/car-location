<h1>Liste des véhicules</h1>
<table>
<div >
        <table >
            <thead>
                <tr>
                    <th>id</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </tfoot>
            <tbody>

        <?php
        foreach($vehicules as $vehicule){
        ?>
        <tr>
            <td><?= $vehicule['Description'] ?></td>
            <td><?= $vehicule['price'] ?></td>
            <td><?= $vehicule['Couleur'] ?></td>
            <td><img src="<?= $vehicule['ImageUrl'] ?>" alt="Image du véhicule" ></td>
            <td><?= $vehicule['Modele'] ?></td>
            <td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
