    <h1>Modifier Utilisateur</h1>
    <form action="/car-location/dashboard/users/modifier" method="POST">
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" value="<?= $user['pseudo']; ?>">


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" ><br>

        <!-- <label for="statut">Statut:</label>
        <select id="statut" name="statut">
            <option value="">Administrateur</option>
            <option value="">Utilisateur</option>
        </select><br> -->

        <input class="btn btn-primary" type="submit" value="Enregistrer">
    </form>
