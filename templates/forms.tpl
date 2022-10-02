<div class="forms-row">
    {* form category *}
    <form action="category/add" method="POST" class="my-4">
        <div class="form-group">
            <label>Nombre</label>
            <input name="name" type="text" class="form-control" placeholder="inserte nombre categoria">
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="description" class="form-control" rows="3" placeholder="inserte descripcion"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Agregar</button>
    </form>

    {* form product *}
    <form action="product/add" method="POST" class="my-4">
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label>Nombre</label>
                    <input name="name" type="text" class="form-control" placeholder="inserte nombre producto">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Precio</label>
                    <input name="price" type="number" step="0.01" class="form-control">
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control" name="category">
                        {foreach $categories as $category}
                            <option value="{$category->id}">{$category->name}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="description" class="form-control" rows="3" placeholder="inserte descripcion"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Agregar</button>
    </form>
</div>