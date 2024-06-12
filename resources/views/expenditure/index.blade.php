@extends('layouts.app')

@section('title', 'Pengeluaran')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Pengeluaran</li>
@endsection

@section('content')
<div class="row layout-spacing">
    <div class="col-xl-12">
        <div class="statbox widget box box-shadow">
            <x-card>
                <x-slot name="header" class="widget-header">
                    <button onclick="addForm(`{{ route('expenditure.store') }}`)" class="btn btn-outline-primary mt-2 mb-3 mr-2">
                        <i class="fas fa-plus-circle"></i>
                        Tambah
                    </button>
                </x-slot>

                <x-table>
                    <x-slot name="thead" >
                        <th class="checkbox-column text-center" width="5%">No</th>
                        <th width="12%" class="text-center">Tanggal</th>
                        <th class="text-center">Deskripsi</th>
                        <th width="8%">Nominal</th>
                        <th width="15%" class="text-center"><i class="fas fa-cog"></i></th>                          
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
</div>

@includeIf('expenditure.form')
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
                        url: '{{ route('expenditure.data') }}'
                    },
                    columns: [
                        {data: 'DT_RowIndex', searchable: false, sortable: false},
                        {data: 'created_at'},
                        {data: 'description'},
                        {data: 'nominal', searchable: false, sortable: false},
                        {data: 'action', searchable: false, sortable: false},
                    ],
                });

        function addForm(url, title = 'Tambah') {
            $('#btnSimpan').show();
            $('#btnUpdate').hide();
            
            $('.modal').modal('show');
            $(`${'.modal'} .modal-title`).text(title);
            $(`${'.modal'} form`).attr('action', url);
            $(`${'.modal'} [name=_method]`).val('post');
            
            resetForm(`${'.modal'} form`);
        };

        function editForm(url, title = 'Edit') {
            $('#btnSimpan').hide();
            $('#btnUpdate').show();

            $.get(url)
                .done(response => {
                    $('.modal').modal('show');
                    $(`${'.modal'} .modal-title`).text(title);
                    $(`${'.modal'} form`).attr('action', url);
                    $(`${'.modal'} [name=_method]`).val('put');

                    resetForm(`${'.modal'} form`);
                    loopForm(response.data);                                    
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }

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