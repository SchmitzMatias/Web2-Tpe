{include file = "header.tpl"}

<div class='my-4'>
    <div class='categoryAdd'>
        <a href='category/new' type='button' class='btn btn-success'>Nueva</a>
    </div>

    <ul class="list-group">
        {foreach from=$categories item=$category}
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                <span><b><a href='category/{$category->id}'>{$category->name}</a></b> - {$category->description|truncate:500}</span>
                {if isset($smarty.session.IS_LOGGED)}
                    <div class="ml-auto">
                        <a href='category/update/{$category->id}' type='button' class='btn btn-primary ml-auto'>Actualizar</a>
                        <a href='category/remove/{$category->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                    </div>
                {/if}
            </li>
        {/foreach}
    </ul>
</div>

{include file="footer.tpl"}