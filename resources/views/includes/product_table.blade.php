<div class="products b p-10">
    <img class="image" src="storage/images/products/{{ $pimage }}"/>
    <span class="name">
        <a href="{{ route('product.show') }}?pid={{ $pid }}">{{ $pname }}</a>
    </span>
    <span class="short">{{ $pshort }}</span>
    <span class="price">{{ $pprice }} &#x20bd;</span>
    @php
        $incoming_count = $incoming->where('ProductID', $pid)->sum('Count') ?? 0;
        $outgoing_count = $outgoing->where('ProductID', $pid)->sum('Count') ?? 0;
        $total_count = $incoming_count - $outgoing_count;
    @endphp
    @if ($favcount <= 0)
        <form action="{{ route('fav.addToFav') }}" method="POST" class="fav">
            @csrf
            <input type="hidden" value="{{ $product->ID }}" name="ID">
            <button type="submit" class="button"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
        </form>
    @else
        <form action="{{ route('fav.delFav') }}" method="POST" class="fav">
            @csrf
            <input type="hidden" value="{{ $pid }}" name="ID">
            <button type="submit" class="button activated"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
        </form>
    @endif
    @if ($total_count <= 0)
        <div class="buy">
            <button type="submit" class="button" disabled="disabled">
                Нет на складе
            </button>
        </div>
    @elseif ($cartscount <= 0)
        <form action="{{ route('cart.addToCart') }}" method="POST" class="buy">
            @csrf
            <input type="hidden" value="{{ $pid }}" name="ID">
            <button type="submit" class="button">
                Купить
            </button>
        </form>
    @else
        <a href="cart" class="buy">
            <button type="submit" class="button activated">
                В корзине
            </button>
        </a>
    @endif
    @if ($comparecount == 0)
    <form action="{{ route('compare.add') }}" method="POST" class="compare-form b">
        @csrf
        <input type="hidden" name="ID" value="{{$pid}}">
        <label>
            <input onChange="this.form.submit(); $(this).prop('disabled', true);" id="compare" type="checkbox" name="compare" class="submit">
            Сравнить
        </label>
    </form>
    @else
    <form action="{{ route('compare.del') }}" method="POST" class="compare-form b">
        @csrf
        <label>
            <input onChange="this.form.submit(); $(this).prop('disabled', true);" id="compare" type="checkbox" name="compare" class="submit" checked>
            Сравнить
        </label>
        <input type="hidden" name="ID" value="{{$pid}}">
    </form>
    @endif
    <span class="count">На складе: {{  $total_count  }} шт.</span>
</div>