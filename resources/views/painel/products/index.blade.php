@extends('layouts.app')


@section('content')
<div class="my-4 float-right">
      <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn-add"><i class="fas fa-plus"></i>
            Adicionar</button>
</div>

<div>
      <table class="table table-dark">
            <thead>
                  <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Contato</th>
                        <th scope="col">Preço de Compra</th>
                        <th scope="col">Preço de Venda</th>
                        <th scope="col">Ações</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($products as $product)
                  <tr>
                        <th>{{ $product->name }}</th>
                        <td>{{ $product->provider }}</td>
                        <td>{{ $product->provname }}</td>
                        <td>{{  'R$ '.number_format($product->buyprice, 2, ',', '.') }}</td>
                        <td>{{  'R$ '.number_format($product->sellprice, 2, ',', '.') }}</td>
                        <td>
                              <div class="icons d-flex justify-content-around">
                                    <a href="{{ url('produtos-edit/'. $product->id) }}">
                                          <div class="edit">
                                                <i class="far fa-edit"></i>
                                          </div>
                                    </a>
                                    <a onclick="deleteItem(this)" data-id="{{ $product->id }}">
                                          <div class="trash">
                                                <i class="far fa-trash-alt"></i>
                                          </div>
                                    </a>
                                    <div class="block">
                                          <i class="fas fa-ban"></i>
                                    </div>
                              </div>
                        </td>
                  </tr>
                  @endforeach
            </tbody>
      </table>

</div>

{{-- modal --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Adicionar Produto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <form method="POST" action="{{ url('/produtos-store') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" name="name"
                                                placeholder="Nome do Produto">

                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" name="resume"
                                                placeholder="Nome Resumido">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" name="provider"
                                                placeholder="Fornecedor">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <textarea type="text" class="form-control" name="description"
                                                placeholder="Descrição" rows="4"></textarea>
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" id="phone" name="provphone"
                                                placeholder="Contato">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" name="provname"
                                                placeholder="Nome do Contato">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="file" class="form-control" name="image"
                                                placeholder="Foto do Produto">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" id="buyprice" name="buyprice"
                                                placeholder="Preço de Compra">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" id="sellprice" name="sellprice"
                                                placeholder="Preço de Venda">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" name="bitterness"
                                                placeholder="Amargor">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" name="temperature"
                                                placeholder="Temperatura">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" name="ibv" placeholder="IBV">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" name="type" placeholder="Tipo">
                                    </div>
                                    <div class="col-md-3">
                                          <div class="form-group">
                                                <label for="happy"
                                                      class="col-sm-4 col-md-4 control-label text-right text-white">Destaque?</label>
                                                <div class="col-sm-7 col-md-7">
                                                      <div class="input-group">
                                                            <div id="radioBtn" class="btn-group">
                                                                  <a class="btn btn-add btn-sm " data-toggle="happy"
                                                                        data-title="1">SIM</a>
                                                                  <a class="btn btn-add btn-sm" data-toggle="happy"
                                                                        data-title="2">NÂO</a>
                                                            </div>
                                                            <input type="hidden" name="spotlight" id="happy">
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <button type="submit" class="btn btn-orange">Cadastrar Produto</button>
                                    </div>
                                    <div class="col-md-6">
                                          <button type="button" data-dismiss="modal" aria-label="Close"
                                                class="btn btn-orange">Fechar e Não Salvar</button>
                                    </div>
                              </div>
                        </form>


                  </div>

            </div>
      </div>
</div>
<script type="application/javascript">
      function deleteItem(e) {
        
                    let id = e.getAttribute('data-id');
        
                    const swalWithBootstrapButtons = Swal.mixin({
                          customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger'
                          },
                          buttonsStyling: false
                    });
        
                    swalWithBootstrapButtons.fire({
                          title: 'Você tem certeza?',
                          text: "Está deletando permanentemente!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Sim, delete!',
                          cancelButtonText: 'Não, cancelar!',
                          reverseButtons: true
                    }).then((result) => {
                          if (result.value) {
                                if (result.isConfirmed) {
        
                                      $.ajax({
                                            type: 'DELETE',
                                            url: '{{url('produtosDelete')}}/' + id,
                                            data: {
                                                  "_token": "{{ csrf_token() }}",
                                            },
                                            success: function (data) {
                                                  if (data.success) {
                                                        swalWithBootstrapButtons.fire(
                                                              'Deletado!',
                                                              'Seu produto foi deletado!',
                                                              "success"
                                                           
                                                        );
                                                     
                                                  }
        
                                            }
                                      });
        
                                }
        location.reload();
                          } else if (
                                result.dismiss === Swal.DismissReason.cancel
                          ) {
                                swalWithBootstrapButtons.fire(
                                      'Cancelado',
                                      'Este produto está seguro!)',
                                      'error'
                                );
                          }
                    });
        
              }
        
</script>




@endsection