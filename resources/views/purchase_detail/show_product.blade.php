<style>
    th {
        text-align: center;
    }
    .table-hover td {
        text-align: center;
    }
</style>

<x-modal size="modal-xl" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Pilih Produk
    </x-slot>

    <div class="modal-body">
        <x-table class="table-hover">
            <thead>
                <th class="checkbox-column" width="5%">No</th>
                <th width="15%">Kode Produk</th>
                <th width="21%">Produk</th>
                <th width="25%">Harga Beli</th>
                <th width="15%"><i class="fa fa-cog"></i></th>
            </thead>

            @foreach ($product as $k => $v)                
                <tr>
                    <td width="5%">{{ $k+1 }}</td>
                    <td><span class="badge badge-success">{{ $v->product_code }}</span></td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->purchase_price }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-primary btn-md mt-2 mb-3 mr-2"
                            onclick="chooseProduct('{{ $v->id }}', '{{ $v->product_code}}')">
                            <i class="fa fa-check-circle"></i>
                            Pilih
                        </a>
                        {{-- <a href="{{ route('purchase_detail.create', $v->id) }}" class="btn btn-outline-primary btn-md mt-2 mb-3 mr-2">
                            <i class="fa fa-check-circle"></i>
                            Pilih
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </x-table>
    </div>
</x-modal>