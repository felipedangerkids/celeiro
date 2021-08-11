@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SEUS <br> PEDIDOS</h1>
        </div>
        <div class="text-center pt-4">
            <a href="{{route('user.pedidos')}}" class="btn btn-continuar">Voltar</a>
        </div>
    </div>

    <div class="pedido my-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center ">
                        <p>PEDIDO #{{str_pad($pedido->id, 3, '0', STR_PAD_LEFT)}}</p>
                    </div>

                    <div class="col-12 col-md-6 text-center font">
                        <h4>Endereço</h4>
                        <p><strong>Rua:</strong> {{ $pedido->adress->endereco }}, {{ $pedido->adress->numero }}</p>
                        <p><strong>Bairro:</strong> {{ $pedido->adress->bairro }}</p>
                        <p><strong>Cidade:</strong> {{ $pedido->adress->cidade }}</p>
                        <p><strong>CEP:</strong> {{ $pedido->adress->cep }}</p>
                    </div>

                    <div class="col-12 col-md-6 text-center font">
                        <h4>Entrega</h4>
                        @if ($pedido->ship->data == 'Agendar Pedido')
                            <p><strong>Data:</strong> {{ $pedido->ship->horario }}</p>
                            <p><strong>Data:
                                Data:</strong> {{ $pedido->ship->data }}</p>
                        @else
                            <p><strong>Data:</strong> {{ $pedido->ship->data }}</p>
                        @endif
            
                        <p>Tipo: {{ $pedido->ship->tipo }}</p>
            
                    </div>

                    <div class="col-12 col-md-6 text-center font">
                        <h4>Comprador</h4>
                        <p><strong>Nome:</strong> {{ $pedido->users->name }}</p>
                        <p><strong>Email:</strong> {{ $pedido->users->email }}</p>
                        <p><strong>WhatsApp:</strong> {{ $pedido->users->whatsapp }}</p>
                    </div>

                    <div class="col-12 col-md-6 text-center font">
                        <h4>Pagamento</h4>
                        <p><strong>Forma de Pagamento:</strong> {{ $pedido->pagamento }}</p>
                        <p><strong>Troco:</strong> R${{ $pedido->troco ?? 'Cartão' }} </p>
                        <p>
                            <strong>STATUS:</strong>
                            @if ($pedido->status == '0')
                                Aguardando
                            @elseif($pedido->status == '1')
                                Preparando
                            @elseif($pedido->status == '2')
                                Saiu para entrega
                            @elseif($pedido->status == '3')
                                Entregue
                            @elseif($pedido->status == '4')
                                Cancelado
                            @endif
                        </p>
                    </div>

                    <div class="col-12 text-center font">
                        <h4>Pedidos</h4>
                        @foreach ($items as $item)
                            <div>
                                <p><strong>Title:</strong> {{ $item->title }}</p>
                                <p><strong>Preço:</strong> {{ 'R$ ' . number_format($item->unit_price, 2, ',', '.') }} </p>
                                <p><strong>Quantidade:</strong> {{ $item->quantity }}</p>
                            </div>
                        @endforeach
            
                    </div>
                </div>
            </div>
    </div>



@endsection
