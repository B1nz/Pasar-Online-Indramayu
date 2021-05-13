@extends('layouts.front')

@section('content')

<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(/assets/img/ban/ban2.png)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2> Belanja</h2>
            <ul>
                <li><a href="{{url('/')}}">home</a></li>
                <li>search</li>
            </ul>
        </div>
    </div>
</div>

<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3" id="sidebar">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-45">
                        <a href="{{route('produk.search')}}"><h3 class="sidebar-title">Semua Produk</h3></a>
                        <h3 class="sidebar-title">Kategori</h3>
                        <div class="sidebar-categories">
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{route('produk.index', ['category_id'=>$category->id])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">tag</h3>
                        <div class="product-tags">
                            <ul>
                                @foreach ($categories as $category)
                                @php
                                    $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                                @endphp

                                @foreach ($children as $child)
                                    <li><a href="{{route('produk.index', ['category_id'=>$child->id])}}">{{$child->name}}</a></li>

                                    @php
                                        $grandchild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                    @endphp

                                    @foreach ($grandchild as $c)
                                        <li><a href="{{route('produk.index', ['category_id'=>$c->id])}}">{{$c->name}}</a></li>
                                    @endforeach

                                @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <p><span>{{$produks->total()}}</span> Produk Ditemukan</p>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar1" class="tab-pane fade active show">
                                <div class="row">

                                    @foreach ($produks as $produk)
                                        @if (!empty($produk))
                                            @include('produk._single_product')
                                        @else
                                            <h3>Produk Tidak Ditemukan</h3>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$produks->appends(['query'=>request('query')])->render()}}
            </div>
        </div>
    </div>
</div>

<style>
    #sidebar.fixed > div{position:fixed;}
</style>

<script>
    var el = $('#sidebar'),
    pos = el.position().top;

    $(window).scroll(function() {
        el.toggleClass('fixed', $(this).scrollTop() >= pos);
    });
</script>

@endsection
