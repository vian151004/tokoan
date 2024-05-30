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
                    <input type="text" id="name" name="name" class="form-control">
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
                    <input type="text" id="merk" name="merk" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="purchase_price">Harga Beli</label>
                <div class="col-md-6 col-lg-12">
                    <input type="text" id="purchase_price" name="purchase_price" class="form-control" onkeyup="format_uang(this)">
                </div>
            </div>
            <div class="form-group row">
                <label for="discount">Diskon</label>
                <div class="col-md-6 col-lg-12">
                    <input type="number" id="discount" name="discount" class="form-control" required value="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="selling_price">Harga Jual</label>
                <div class="col-md-6 col-lg-12">
                    <input type="text" id="selling_price" name="selling_price" class="form-control" onkeyup="format_uang(this)">
                </div>
            </div>
            <div class="form-group row">
                <label for="supply">Stok</label>
                <div class="col-md-6 col-lg-12">
                    <input type="text" id="supply" name="supply" class="form-control" value="0" onkeyup="format_uang(this)">
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-gradient-dark btn-rounded mb-2 mt-2" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-gradient-primary btn-rounded mb-2 mt-2" id="btnSimpan" onclick="submitForm(this.form)">Simpan</button>
            <button type="button" class="btn btn-gradient-primary btn-rounded mb-2 mt-2" id="btnUpdate" onclick="submitForm(this.form)">Update</button>
        </div>
</x-modal>