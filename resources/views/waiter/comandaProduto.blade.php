@extends('layouts.waiter')
@section('content')
    <div class="container vh-100 d-flex flex-column">
        <div class="text-center mt-5">
            <a href="{{route('waiter.comanda')}}"><img src="{{asset('assets/img/arrow-left.png')}}" alt=""></a>
            <h2 class="ms-2 inline-block text-white">VOLTAR</h2>
        </div>

        <div class="mt-2">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <h5>CLIENTE: <span class="text-orange">{{mb_convert_case($comanda->client->name, MB_CASE_UPPER)}}</span></h5>
                </div>
                <div class="col-10 text-center">
                    <h5>MESA: <span class="text-orange">{{$comanda->table->name}}</span></h5>
                </div>

                <div class="col-8 gastos text-center mt-2">
                    <h5 class="">GASTOU ATÉ AGORA</h5>
                    <h5 class="text-orange">R$ {{number_format($comanda->total_value, 2, ',', '.')}}</h5>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="notDelivered-tab" data-bs-toggle="tab" data-bs-target="#notDelivered" type="button" role="tab" aria-controls="notDelivered" aria-selected="true">NÃO ENTREGUE</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered" type="button" role="tab" aria-controls="delivered" aria-selected="false">ENTREGUE</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="notDelivered" role="tabpanel" aria-labelledby="notDelivered-tab">
                    @foreach ($comanda->products as $product)
                        @if ($product->status == 1)
                            <div class="row comanda-produto" id="produto-{{$product->id}}">
                                <div class="col-4 my-2 mt-3">
                                    <div class="fundo-branco ">
                                        <div class="text-center">
                                            <div class="lata">
                                                <a href="#">
                                                    <img style="width: 100%; object-fit: cover;" src="{{asset('storage/produtos/'.$product->product->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title col-6 my-2">
                                    <div class="nome_">
                                        <span>{{$product->product->name}}</span> <br>
                                    </div>
                                    <div class="unid">
                                        <span>{{$product->quantity}} UNID</span> <br>
                                    </div>
                                    <div class="preco">
                                        <h2>{{ 'R$ ' . number_format($product->total_value, 2, ',', '.') }} </h2> <br>
                                    </div>
                                </div>
                                <div class="d-block col-2">
                                    <div class="edit mt-5">
                                        <button type="button" class="btn btn-entregue-comandaProduto text-white" data-id="{{$product->id}}" data-route="{{route('waiter.comanda.pedido.entregue')}}"><i class="fas fa-check-square text-size-2"></i></button>
                                    </div>
                                </div>
    
                                <div class="my-3 linha-horizontal"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
                    @foreach ($comanda->products as $product)
                        @if ($product->status == 2)
                            <div class="row comanda-produto" id="produto-{{$product->id}}">
                                <div class="col-4 my-2 mt-3">
                                    <div class="fundo-branco ">
                                        <div class="text-center">
                                            <div class="lata">
                                                <a href="#">
                                                    <img style="width: 100%; object-fit: cover;" src="{{asset('storage/produtos/'.$product->product->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title col-6 my-2">
                                    <div class="nome_">
                                        <span>{{$product->product->name}}</span> <br>
                                    </div>
                                    <div class="unid">
                                        <span>{{$product->quantity}} UNID</span> <br>
                                    </div>
                                    <div class="preco">
                                        <h2>{{ 'R$ ' . number_format($product->total_value, 2, ',', '.') }} </h2> <br>
                                    </div>
                                </div>
                                <div class="my-3 linha-horizontal"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="my-3">
            <div class="row justify-content-center">
                <div class="row">
                    @foreach ($comanda->products as $product)
                        @if ($product->status == 0)
                            <div class="col-4 my-2 mt-3">
                                <div class="fundo-branco ">
                                    <div class="text-center">
                                        <div class="lata">
                                            <a href="#">
                                                <img style="width: 100%; object-fit: cover;" src="{{asset('storage/produtos/'.$product->product->image)}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title col-6 my-2">
                                <div class="nome_">
                                    <span>{{$product->product->name}}</span> <br>
                                </div>
                                <div class="unid">
                                    <span>{{$product->quantity}} UNID</span> <br>
                                </div>
                                <div class="preco">
                                    <h2>{{ 'R$ ' . number_format($product->total_value, 2, ',', '.') }} </h2> <br>
                                </div>
                            </div>
                            <div class="d-block col-2">
                                <div class="edit mt-5">
                                    <a href="{{ route('mesa.produto.remove', $product->id) }}"><button type="button" class="btn btn-lixeira"> <img src="{{ url('assets/img/lixeira.png') }}" alt=""></button></a>
                                </div>
                            </div>

                            <div class="my-3 linha-horizontal"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
