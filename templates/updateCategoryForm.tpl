{include file = "header.tpl"}
<form action="category/save/{$id}" method="POST" class="my-4">
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
{include file = "footer.tpl"}