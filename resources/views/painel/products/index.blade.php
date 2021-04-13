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
                        <th scope="col">PC</th>
                        <th scope="col">PV</th>
                        <th scope="col">Ações</th>
                  </tr>
            </thead>
            <tbody>

                  <tr>
                        <th>TEste</th>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                        <td>
                              <div class="icons d-flex justify-content-around">
                                    <div class="edit">
                                          <i class="far fa-edit"></i>
                                    </div>
                                    <div class="trash">
                                          <i class="far fa-trash-alt"></i>
                                    </div>
                                    <div class="block">
                                          <i class="fas fa-ban"></i>
                                    </div>
                              </div>
                        </td>
                  </tr>

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
                        <form>
                              <div class="row">
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" placeholder="Nome do Produto">

                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" placeholder="Nome Resumido">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" placeholder="Fornecedor">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <textarea type="text" class="form-control" placeholder="Descrição"
                                                rows="4"></textarea>
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" placeholder="Contato">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" placeholder="Nome do Contato">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="file" class="form-control" placeholder="Foto do Produto">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" placeholder="Preço de Compra">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" placeholder="Preço de Venda">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" placeholder="Amargor">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" placeholder="Temperatura">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" placeholder="IBV">
                                    </div>
                                    <div class="form-group col-md-3">

                                          <input type="text" class="form-control" placeholder="Tipo">
                                    </div>
                                    <div class="col-md-3">
                                   <div class="form-group">
                                          <label for="happy" class="col-sm-4 col-md-4 control-label text-right text-white">Destaque?</label>
                                          <div class="col-sm-7 col-md-7">
                                                <div class="input-group">
                                                      <div id="radioBtn" class="btn-group">
                                                            <a class="btn btn-add btn-sm active" data-toggle="happy" data-title="Y">SIM</a>
                                                            <a class="btn btn-add btn-sm notActive" data-toggle="happy" data-title="N">NÂO</a>
                                                      </div>
                                                      <input type="hidden" name="happy" id="happy">
                                                </div>
                                          </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                          <button type="submit" class="btn btn-orange">Cadastrar Produto</button>
                                    </div>
                                    <div class="col-md-6">
                                          <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-orange">Fechar e Não Salvar</button>
                                    </div>
                              </div>
                        </form>


                  </div>

            </div>
      </div>
</div>
@endsection