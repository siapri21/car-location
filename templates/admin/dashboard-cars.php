<h1>Liste des véhicules</h1> 


<a href="<?= SITE_NAME; ?>/dashboard/cars/ajouter" class="btn btn-success my-3">Ajouter un nouveau véhicules</a>




<table>

<div >
        <table >
            <thead>
                <tr>
                    <th>id</th>
                    <th>Model</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Couleur</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Model</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Couleur</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </tfoot>
            <tbody>

        <?php
        foreach($vehicules as $vehicule){
        ?>
        <tr>
            <td><?= $vehicule['VehiculeID'] ?></td>
            <td><?= $vehicule['Modele'] ?></td>
            <td><?= $vehicule['Marque'] ?></td>
            <td><?= $vehicule['price'] ?></td>
            <td><?= $vehicule['Couleur'] ?></td>
            <td><img src="<?= $vehicule['ImageUrl'] ?>" alt="Image du véhicule" style="width: 10px; height: auto;"></td>
            <td><?= $vehicule['Description'] ?></td> 
            <td><a class="btn btn-primary" href="/car-location/dashboard/users/modifier/<?= $vehicule['VehiculeID']; ?>">modifier</a></td>
            <td><a  class=" btn btn-danger" href="">Supprimer</a></td>


            <td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
