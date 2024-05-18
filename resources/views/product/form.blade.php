<x-modal size="modal-xl" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah
    </x-slot>

    @csrf
    @method('post')

    <div class="modal-body col-md-6 col-lg-12">
        <div class="form-group row">
            <label for="name">Produk</label>
            <div class="col-md-6 col-lg-12">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="category_id">Kategori</label>
            <div class="col-md-6 col-lg-12">
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $k => $v)
                    <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="merk">Merk</label>
            <div class="col-md-6 col-lg-12">
                <input type="text" name="merk" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="purchase_price">Harga Beli</label>
            <div class="col-md-6 col-lg-12">
                <input type="number" name="purchase_price" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="discount">Diskon</label>
            <div class="col-md-6 col-lg-12">
                <input type="number" name="discount" class="form-control" value="0">
            </div>
        </div>
        <div class="form-group row">
            <label for="selling_price">Harga Jual</label>
            <div class="col-md-6 col-lg-12">
                <input type="number" name="selling_price" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="supply">Stok</label>
            <div class="col-md-6 col-lg-12">
                <input type="number" name="supply" class="form-control" required value="0">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-gradient-dark btn-rounded mb-2 mt-2" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-gradient-primary btn-rounded mb-2 mt-2" id="btnSimpan" onclick="submitForm(this.form)">Simpan</button>
        <button type="button" class="btn btn-gradient-primary btn-rounded mb-2 mt-2" id="btnUpdate" onclick="submitForm(this.form)">Update</button>
    </div>
</x-modal>

{{-- <div class="form-row mb-2">
            <div class="form-group col-md-6">
                <label for="name">Produk</label>
                <input type="name" name="name" class="form-control" placeholder="Nama Produk">
            </div>
            <div class="form-group col-md-6">
                <label for="category_id">Kategori</label>
                <div>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach ($category as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row mb-2">
            <div class="form-group col-md-6">
                <label for="merk">Merek</label>
                <input type="text" name="merk" class="form-control" placeholder="Merek Produk">
            </div>
            <div class="form-group col-md-6">
                <label for="purchase_price">Harga Beli</label>
                <input type="number" name="purchase_price" class="form-control">
            </div>
        </div>
        <div class="form-row mb-2">
            <div class="form-group col-md-6">
                <label for="discount">Diskon</label>
                <input type="number" name="discount" class="form-control" value="0">
            </div>
            <div class="form-group col-md-6">
                <label for="selling_price">Harga Jual</label>
                <input type="number" name="selling_price" class="form-control">
            </div>
        </div>
        <div class="form-row mb-2">
            <div class="form-group col-md-12">
                <label for="supply">Stok</label>
                <input type="number" name="supply" class="form-control" required value="0">
            </div>
        </div> --}}