<style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
</style>

<x-modal size="modal-xl" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Pilih Supplier
    </x-slot>

    <div class="modal-body">
        <x-table class="table-hover">
            <thead>
                <th class="checkbox-column" width="5%">No</th>                
                <th width="15%">Nama</th>                        
                <th width="12%">Telepon</th>
                <th width="30%">Alamat</th>                
                <th width="15%"><i class="fas fa-cog"></i></th>                          
            </thead>

            @foreach ($supplier as $k => $v)
                <tr>
                    <td width="5%">{{ $k+1 }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->phone }}</td>
                    <td>{{ $v->address }}</td>
                    <td>
                        <a href="{{ route('purchase.create', $v->id) }}" class="btn btn-outline-primary btn-md mt-2 mb-3 mr-2">
                            <i class="fa fa-check-circle"></i>
                            Pilih
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-table>
    </div>
</x-modal>