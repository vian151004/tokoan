@extends('layouts.app')

@section('title', 'Detail Pembelian')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Detail Pembelian</li>
@endsection

<style>
    .form-control.left-rounded {
            border-top-left-radius: 3px !important;
            border-bottom-left-radius: 3px !important;
    }
    
    .input-group .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .label-bold {
        font-weight: bold;
        font-size: medium;
    }

    table tr td {
        padding: 10px;
    }
</style>

@section('content')
<div class="row layout-spacing">
    <div class="col-xl-12">
        <div class="statbox widget box box-shadow">
            <x-card>
                <x-slot name="header" class="widget-header">
                    <table>
                        <tr>
                            <td>Supplier</td>
                            <td>:</td>
                            <td>{{ $supplier->name }}</td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <td>{{ $supplier->phone }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $supplier->address }}</td>
                        </tr>
                    </table>
                </x-slot>
                
                <form action="" method="POST" id="table-product">
                    @csrf

                    <div class="form-group row">
                        <label for="product_code" class="label-bold col-lg-2">Kode Produk</label>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <input type="hidden" name="purchase_id" id="purchase_id" value="{{ $purchase_id }}">
                                <input type="hidden" name="product_id" id="product_id">
                                <input type="text" class="form-control left-rounded" name="product_code" id="product_code">
                                <span class="input-group-append">
                                    <button onclick="showProduct()" class="btn btn-outline-primary btn-flat" type="button">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                <x-table class="table-purchase_detail">
                    <x-slot name="thead" >                        
                        <th class="checkbox-column text-center" width="5%">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th width="15%">Jumlah</th>
                        <th>Subtotal</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </x-slot>
                </x-table>

                {{-- <div class="row">
                    <div class="col-lg-8">
                        <div class="tampil-bayar bg-primary"></div>
                        <div class="tampil-terbilang"></div>
                    </div>
                    <div class="col-lg-4">
                        <form action="{{ route('pembelian.store') }}" class="form-pembelian" method="post">
                            @csrf
                            <input type="hidden" name="id_pembelian" value="{{ $id_pembelian }}">
                            <input type="hidden" name="total" id="total">
                            <input type="hidden" name="total_item" id="total_item">
                            <input type="hidden" name="bayar" id="bayar">

                            <div class="form-group row">
                                <label for="totalrp" class="col-lg-2 control-label">Total</label>
                                <div class="col-lg-8">
                                    <input type="text" id="totalrp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diskon" class="col-lg-2 control-label">Diskon</label>
                                <div class="col-lg-8">
                                    <input type="number" name="diskon" id="diskon" class="form-control" value="{{ $diskon }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bayar" class="col-lg-2 control-label">Bayar</label>
                                <div class="col-lg-8">
                                    <input type="text" id="bayarrp" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </x-card>
        </div>
    </div>
</div>

@includeIf('purchase_detail.show_product')
@endsection

@includeIf('includes.datatable')
@push('scripts')
    <script>
        let modal = '#modal-form';
        let table;

        table = $('#customer-info-detail-3').DataTable({
                    processing: true,
                    autoWidth: false,

                    // ajax: {
                    //     url: '{{ route('purchase.data') }}'
                    // },
                    
                    columns: [
                        {data: 'DT_RowIndex', searchable: false, sortable: false},
                        {data: 'created_at'},
                        {data: 'name'},
                        {data: 'total_item'},
                        {data: 'total_price'},
                        {data: 'discount'},
                        {data: 'pay'},
                        {data: 'action', searchable: false, sortable: false},
                    ],
                });

        // function addForm() {
        //     $('.modal').modal('show');
        // };

        // function submitForm(originalForm) {
        //     $.post({
        //         url: $(originalForm).attr('action'),
        //         data: new FormData(originalForm),
        //         dataType: 'json',
        //         contentType: false,
        //         cache: false,
        //         processData: false
        //     })
        //     .done(response => {
        //         $('.modal').modal('hide');
        //         showAlert(response.message, 'success');
        //         table.ajax.reload();
        //     })
        //     .fail(errors => {
        //         if (errors.status == 422) {
        //             loopErrors(errors.responseJSON.errors);
        //             return;
        //         }

        //         showAlert(errors.responseJSON.message, 'danger');
        //     });
        // }

        function showProduct() {
            $('.modal').modal('show');
        };

        function hideProduct() {
            $('.modal').modal('hide');
        };

        function chooseProduct(id, code) {
            $('#product_id').val(id);
            $('#product_code').val(code);
            
            hideProduct();
            addProduct();
        };

        function addProduct() {
            $.post('{{ route('purchase_detail.store') }}', $('#table-product').serialize())
                .done(response => {
                    $('.modal').modal('hide');
                    showAlert(response.message, 'success');
                    table.ajax.reload();
                })
                .fail(errors => {
                    if (errors.status == 422) {
                        loopErrors(errors.responseJSON.errors);
                        return;
                    }
                });
        };

        function deleteData(url) {
            if (confirm('Yakin data akan dihapus?')) {
                $.post(url, {
                        '_method': 'delete'
                    })
                    .done(response => {
                        showAlert(response.message,'success');
                        table.ajax.reload();
                    })
                    .fail(errors => {
                        showAlert('Tidak dapat menghapus data!');
                        return;
                    });
            }
        }
    </script>
@endpush