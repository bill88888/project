@extends('Home.indexPublic')
@section('title','歪秀购物')
@section('main')
</header>
<div class="containers">

    <div>
        <div class="pc-nav-title"></div>

                @if(count($shop))
                <div class="pc-nav-digit clearfix ">
                    <ul>
                        @foreach($shop as $row)
                        <li>
                            <div style="border:1px solid #e0e0e0e0;width:190px;">
                            <div>
                                <a href="/index/{{$row['id']}}"><img src="{{$row['pic']}}" height="147" width="190px"></a>
                            </div>
                            <div class="brand-price">{{$row['name']}}</div>
                            <div class="brand-title"><a href="#">{!!$row['descr']!!}</a></div>
                            <div class="brand-price">{{$row['price']}}</div>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
                @else
                <div class="pc-nav-digit clearfix" style="text-align: center;font-size:20px">
                抱歉!暂无此关键字商品!
                </div>
                @endif
    </div>
</div>
<section>
@endsection