@extends('layouts.app')

@section('title', 'Edit')

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="{{ route('product.index') }}">Produk</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="from-group row layout-spacing">
    <div class="col-xl-12">
        <div class="statbox widget box box-shadow">
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('put')
                <x-card>                        
                    <div class="modal-body col-md-6 col-lg-12">
                        <div class="form-group row">
                            <label for="name">Produk</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $product->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id">Kategori</label>
                            <div class="col-md-6 col-lg-12">
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($category as $k => $v)
                                    <option value="{{ $k }}" {{ $k == old('category_id', $product->category_id) ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="merk">Merk</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" id="merk" name="merk" class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk') ?? $product->merk }}">
                                @error('merk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="purchase_price">Harga Beli</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" id="purchase_price" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price') ?? $product->purchase_price }}" onkeyup="format_uang(this)">
                                @error('purchase_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount">Diskon</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="number" id="discount" name="discount" class="form-control @error('discount') is-invalid @enderror" required value="{{ old('discount') ?? $product->discount }}">
                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="selling_price">Harga Jual</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" id="selling_price" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price') ?? $product->selling_price }}" onkeyup="format_uang(this)">
                                @error('selling_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="supply">Stok</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" id="supply" name="supply" class="form-control @error('supply') is-invalid @enderror" value="{{ old('supply') ?? $product->supply }}" onkeyup="format_uang(this)">
                                @error('supply')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-gradient-dark btn-rounded mb-2 mt-2">Reset</button>                        
                        <button type="submit" class="btn btn-gradient-primary btn-rounded mb-2 mt-2">Update</button>
                    </div>
                </x-card>
            </form>                       
        </div>
    </div>
</div>

@endsection
