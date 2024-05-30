@extends('layouts.app')

@section('title', 'Produk')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Produk</li>
@endsection

@section('content')
<div class="row layout-spacing">
    <div class="col-xl-12">
        <div class="statbox widget box box-shadow">
            <x-card>
                <x-slot name="header" class="widget-header">
                    <button onclick="addForm(`{{ route('product.store') }}`)" class="btn btn-outline-primary mt-2 mb-3 mr-2">
                        <i class="fas fa-plus-circle"></i>
                        Tambah
                    </button>
                    <button onclick="deleteSelected(`{{ route('product.delete_selected') }}`)" class="btn btn-outline-danger mt-2 mb-3 mr-2">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                    <button onclick="printBarcode(`{{ route('product.print_barcode') }}`)" class="btn btn-outline-info mt-2 mb-3 mr-2">
                        <i class="fas fa-barcode"></i>
                        Cetak Barcode
                    </button>
                </x-slot>

                <form action="" method="POST" id="table-product">
                    @csrf
                    
                    <x-table class="table-product">
                        <x-slot name="thead" >
                            <th class="form-check-column">
                                <label  for="checkAll" class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" name="checkAll" id="checkAll" class="new-control-input">
                                  <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                </label>
                            </th>
                            <th class="checkbox-column">No</th>
                            <th>Kode</th>
                            <th>Produk</th>
                            <th>Merek</th>
                            <th>Harga Beli</th>
                            <th>Diskon</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th width="17%" class="text-center"><i class="fas fa-cog"></i></th>                          
                        </x-slot>
                    </x-table>    
                </form>                        
            </x-card>
        </div>
    </div>
</div>

@includeIf('product.form')
@endsection

@includeIf('includes.datatable')
@push('scripts')
    <script>
        let modal = '#modal-form';
        let table;

        table = $('#customer-info-detail-3').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('product.data') }}'
            },
            columns: [
                {data: 'checkAll', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'product_code'},
                {data: 'name'},
                {data: 'merk'},
                {data: 'purchase_price', searchable: true, sortable: false},
                {data: 'discount', searchable: false, sortable: false},
                {data: 'selling_price', searchable: true, sortable: false},
                {data: 'supply', searchable: false, sortable: false},   
                {data: 'action', searchable: false, sortable: false},
            ],

        });

        $('[name=checkAll]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
        });

        function addForm(url, title = 'Tambah') {
            $(document).ready(function() {
                $('#btnSimpan').show();
                $('#btnUpdate').hide();
                
                $('.modal').modal('show');
                $(`${'.modal'} .modal-title`).text(title);
                $(`${'.modal'} form`).attr('action', url);
                $(`${'.modal'} [name=_method]`).val('post');
                
                resetForm(`${'.modal'} form`);
            });
        };

        // function editForm(url, title = 'Edit') {
        //     // console.log('editForm called with URL:', url);
        //     $('#btnSimpan').hide();
        //     $('#btnUpdate').show();

        //     $.get(url)
        //         .done(response => {
        //             $('.modal').modal('show');
        //             $(`${'.modal'} .modal-title`).text(title);
        //             $(`${'.modal'} form`).attr('action', url);
        //             $(`${'.modal'} [name=_method]`).val('put');
        //             for (let key in data) {
        //                 $(`#${key}`).val(data[key]);
        //             }
        //             resetForm(`${'.modal'} form`);
        //             loopForm(response.data);                                    
        //         })
        //         .fail(errors => {
        //             alert('Tidak dapat menampilkan data');
        //             return;
        //         });
        // }        

        function submitForm(originalForm) {
            $.post({
                url: $(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            })
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

                showAlert(errors.responseJSON.message, 'danger');
            });
        }

        // function deleteData(url) {
        //     if (confirm('Yakin data akan dihapus?')) {
        //         $.post(url, {
        //                 '_method': 'delete'
        //             })
        //             .done(response => {
        //                 showAlert(response.message,'success');
        //                 table.ajax.reload();
        //             })
        //             .fail(errors => {
        //                 showAlert('Tidak dapat menghapus data!');
        //                 return;
        //             });
        //     }
        // }

        function deleteSelected(url) {
            var checkedInputs = $('input:checked').not('[name=checkAll]');

            if (checkedInputs.length > 0){
                if (confirm('Yakin ingin menghapus data terpilih?')) {                    
                    $.post(url, $('#table-product').serialize())
                        .done((response) => {
                            showAlert(response.message,'success');
                            $('input:checkbox').prop('checked', false);
                            table.ajax.reload();
                        })
                        .fail(errors => {
                            showAlert('Tidak dapat menghapus data!');
                            return;
                        });
                }
            } else {
                alert('Pilih data mana yang akan dihapus');
                return;
            }
        }

        function printBarcode(url) {
            var checkedInputs = $('input:checked').not('[name=checkAll]');

            if (checkedInputs.length < 1){
                alert('Pilih data yang akan dicetak');
                return;
            } else if (checkedInputs.length < 3) {
                alert('Pilih minimal 3 data yang akan dicetak');
                return;                
            } else {
                $('#table-product')
                    .attr('target', '_blank')
                    .attr('action', url)
                    .submit();
            }                
        }
    </script>
@endpush