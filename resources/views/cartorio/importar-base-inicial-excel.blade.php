@extends('layouts.app')
@section('js')
<script type="text/javascript" src="{{ asset('js/importar_xls.js') }}?<?=time();?>"></script>
@endsection
@section('content')
<form method="post" name="frmExcel" id="frmExcel" enctype="multipart/form-data" action="{{ route('cadastro.importar.excel.processar') }}">
    {{csrf_field()}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">IMPORTAR CARGA INICIAL EXCEL</div>
                    <div class="card-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="control-label" for="arquivo">Arquivo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="file">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" />
                                            <label class="custom-file-label" for="file">Escolher o arquivo</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="buttons form-group mt-2 text-right">
                            <button type="reset" class="cancelar-importacao btn btn-outline-danger">Cancelar</button>
                            <button class="btn btn-primary" id="btnProcessarArquivo" name="btnProcessarArquivo"> Processar Arquivo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
