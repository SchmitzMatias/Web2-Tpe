{include file="header.tpl"}

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{$product->name}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$product->category}</h6>
        <p class="card-text">{$product->description}</p>
        <p>{$product->price}$ (el gramo)</p>
    </div>
</div>

{include file="footer.tpl"}