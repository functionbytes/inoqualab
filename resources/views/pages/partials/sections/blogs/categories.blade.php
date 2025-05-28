@if (count($categories) > 0)

<div class="widget__category "  >
    <h2 class="widget__title-2">CATEGORIAS</h2>
    <ul>
      @foreach ($categories as $categorie)
        
      <li><a href="{{ route('blogs.categories', $categorie->slug) }}">{{ $categorie->label }}<span>({{ count($categorie->blogs) }})</span></a></li>
      @endforeach
    </ul>
</div>

@endif
