{include file = "header.tpl"}

<ul class="list-group">
    {foreach $products as $product}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b><a href='product/{$product->id}'>{$product->name}</a></b> - {$product->description|truncate:500} - {$product->price} - {$product->category}</span>
            {if isset($smarty.session.IS_LOGGED)}
                <div class="ml-auto">
                    <a href='product/update/{$product->id}' type='button' class='btn btn-primary ml-auto'>Actualizar</a>
                    <a href='product/delete/{$product->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                </div>
            {/if}
        </li>
    {/foreach}
</ul>

{include file="footer.tpl"}