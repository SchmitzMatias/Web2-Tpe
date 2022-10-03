{include file = "header.tpl"}
{include file = "forms.tpl"}

<ul class="list-group">
    {foreach from=$categories item=$category}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b>{$category->name}</b> - {$category->description|truncate:500}</span>
            <div class="ml-auto">
                <a href='remove/{$category->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
            </div>
        </li>
    {/foreach}
</ul>

{include file="footer.tpl"}