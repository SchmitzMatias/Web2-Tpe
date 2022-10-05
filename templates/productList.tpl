{include file = "header.tpl"}
{include file = "forms.tpl"}

<ul class="list-group">
    {foreach $products as $product}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b><a href='product/{$product->id}'>{$product->name}</a></b> - {$product->description|truncate:500} - {$product->price} - {$product->id_category_fk}</span>
            <div class="ml-auto">
                <a href='product/delete/{$product->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
            </div>
        </li>
    {/foreach}
</ul>

{include file="footer.tpl"}