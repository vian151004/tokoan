@extends('layouts.app')

@section('title', 'Member')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Member</li>
@endsection

@section('content')
<div class="row layout-spacing">
    <div class="col-xl-12">
        <div class="statbox widget box box-shadow">
            <x-card>
                <x-slot name="header" class="widget-header">
                    <button onclick="addForm(`{{ route('member.store') }}`)" class="btn btn-outline-primary mt-2 mb-3 mr-2">
                        <i class="fas fa-plus-circle"></i>
                        Tambah
                    </button>
                    <button onclick="printCard(`{{ route('member.print_card') }}`)" class="btn btn-outline-info mt-2 mb-3 mr-2">
                        <i class="fas fa-id-card"></i>
                        Cetak Kartu
                    </button>
                </x-slot>

                <form action="" method="POST" id="table-member">
                    @csrf
                    
                    <x-table class="table-member">
                        <x-slot name="thead" >
                            <th class="form-check-column">
                                <label  for="checkAll" class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" name="checkAll" id="checkAll" class="new-control-input">
                                  <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                </label>
                            </th>
                            <th class="checkbox-column">No</th>
                            <th width="10%">Kode</th>
                            <th width="15%">Nama</th>
                            <th width="40%" class="text-center">Alamat</th>
                            <th>telepon</th>
                            <th width="15%" class="text-center"><i class="fas fa-cog"></i></th>                          
                        </x-slot>
                    </x-table>    
                </form>                        
            </x-card>
        </div>
    </div>
</div>

@includeIf('member.form')
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
                url: '{{ route('member.data') }}'
            },
            columns: [
                {data: 'checkAll', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'member_code'},
                {data: 'name'},
                {data: 'address'},
                {data: 'phone', searchable: true, sortable: false},                
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

        function printCard(url) {
            var checkedInputs = $('input:checked').not('[name=checkAll]');

            if (checkedInputs.length < 1){
                alert('Pilih data yang akan dicetak');
                return;
            } else {
                $('#table-member')
                    .attr('target', '_blank')
                    .attr('action', url)
                    .submit();
            }                
        }
    </script>
@endpush