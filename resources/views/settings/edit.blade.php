@extends('layouts.app')

@section('title', 'Edit')

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="{{ route('member.index') }}">Member</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="from-group row layout-spacing">
    <div class="col-xl-12">
        <div class="statbox widget box box-shadow">
            <form action="{{ route('member.update', $member->id) }}" method="POST">
                @csrf
                @method('put')
                <x-card>  
                    <div class="modal-body col-md-6 col-lg-12">
                        <div class="form-group row">
                            <label for="name">Nama</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $member->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="address">Alamat</label>
                            <div class="col-md-6 col-lg-12">
                                <textarea type="text" id="address" name="address" rows="3" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $member->address }}""></textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="phone">Telepon</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $member->phone }}"">
                                @error('phone')
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
