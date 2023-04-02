<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->name }}
            @if(count($child->childs))
                @include('categories.childs',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>