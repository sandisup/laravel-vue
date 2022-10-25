@extends('layouts.admin')

@section('header')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="row">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Toko Kelontong, Inc.
                </h4>
              </div>
              <div class="row">
                <div class="col-12">
                  <p class="lead">{{ convert_date($pembelian->created_at) }}</p>
                </div>
              </div>  
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Dibeli dari
                <address>
                  <strong>{{ $pembelian->supplier->nama }}.</strong><br>
                  {{ $pembelian->supplier->alamat }} <br>
                  {{ $pembelian->supplier->telepon }} <br>
                  Email: info@almasaeedstudio.com
                </address>
              </div>
      
              <div class="col-sm-4 invoice-col"> <br>
                <b>Invoice :  {{ $pembelian->id }}</b><br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="">
                    <th>ID</th>
                    <th class='text-center'>Nama Produk</th>
                    <th class='text-center'>Harga Satuan</th>
                    <th class='text-center'>Jumlah</th>
                    <th class='text-center'>Diskon</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian->pembelianDetails as $detail)
                        <tr>
                                <td>{{ $detail->id }}</td>
                                <td class='text-center'>{{ $detail->produk->nama_produk }}</td>
                                <td class='text-center'>{{ $detail->harga_beli }}</td>
                                <td class='text-center'>{{ $detail->jumlah }}</td>  
                                <td class='text-center'>{{ $pembelian->diskon }}</td>                                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img src={{ asset('assets/dist/img/credit/visa.png') }} alt="Visa">
                <img src={{ asset('assets/dist/img/credit/mastercard.png') }} alt="Mastercard">
                <img src={{ asset('assets/dist/img/credit/american-express.png') }} alt="American Express">
                <img src={{ asset('assets/dist/img/credit/paypal2.png') }} alt="Paypal">
              </div>
              <!-- /.col -->
              <div class="col-6">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>Rp {{ $detail->subtotal }},-</td>
                    </tr>
                    <tr>
                      <th>Pajak (0)</th>
                      <td>Rp 0,-</td>
                    </tr>
                    <tr>
                      <th>Diskon ({{ $pembelian->diskon }}):</th>
                      <td>Rp 0,-</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>Rp {{ $detail->subtotal }},-</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="#" rel="noopener" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection