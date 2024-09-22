<x-modal size="modal-xl" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah
    </x-slot>

    @csrf
    @method('post')

        <div class="modal-body col-md-6 col-lg-12">
            <div class="form-group row">
                <label for="name">Nama</label>
                <div class="col-md-6 col-lg-12">
                    <input type="text" id="name" name="name" class="form-control">
                </div>
            </div>            
        </div>
        <div class="modal-body col-md-6 col-lg-12">
            <div class="form-group row">
                <label for="address">Alamat</label>
                <div class="col-md-6 col-lg-12">
                    <textarea type="text" id="address" name="address" rows="3" class="form-control"></textarea>
                </div>
            </div>            
        </div>
        <div class="modal-body col-md-6 col-lg-12">
            <div class="form-group row">
                <label for="phone">Telepon</label>
                <div class="col-md-6 col-lg-12">
                    <input type="text" id="phone" name="phone" class="form-control">
                </div>
            </div>            
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-gradient-dark btn-rounded mb-2 mt-2" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-gradient-primary btn-rounded mb-2 mt-2" id="btnSimpan" onclick="submitForm(this.form)">Simpan</button>
            <button type="button" class="btn btn-gradient-primary btn-rounded mb-2 mt-2" id="btnUpdate" onclick="submitForm(this.form)">Update</button>
        </div>
</x-modal>