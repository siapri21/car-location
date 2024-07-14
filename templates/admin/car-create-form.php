<section>
    <div class="w-75 mx-auto mt-5 p-4 border rounded">
        <form action="<?= SITE_NAME; ?>/dashboard/cars/create-car" method="post">

            <div class="mb-3">
                <label for="name" class="form-label">Model</label>
                <input type="text" id="name" class="form-control" name="user_pseudo">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <input type="submit" value="Envoyer" class="btn btn-primary">
        </form>
    </div>
</section>