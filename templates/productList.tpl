{include file = "header.tpl"}
{include file = "forms.tpl"}

<ul class="list-group">
    {foreach $products as $product}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b>{$product->name}</b> - {$product->description|truncate:500}</span>
            <div class="ml-auto">
                <a href='delete/{$product->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
            </div>
        </li>
    {/foreach}
</ul>

{include file="footer.tpl"}