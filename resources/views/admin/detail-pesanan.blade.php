<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h5>ID. {{ $pesanan->id }}</h5>
    <h5>
        <i class="fas fa-shopping-bag" style="margin-right: 5px; color: coral"></i>
        {{ $pesanan->type === 'custom' ? 'Custom Pesanan' : 'Pesanan' }}
    </h5>
    <h5>{{ date('d M Y', strtotime($pesanan->created_at)) }}</h5>
    <h5>Pesanan Oleh, <b>{{ $pesanan->nama }}</b></h5>
    <h5>{{ $pesanan->telp }}</h5>
    <h5>{{ $pesanan->alamat }}</h5>
</div>
<div class="modal-body">
    <div class="row">
        @if ($pesanan->type === 'reguler')
            @foreach ($pesanan->pesananbarang() as $pb)
                <div class="col-xs-6">
                    <div class="pesanan-item" style="margin-top: 12px; margin-bottom: 10px">
                        @if ($pb->barang_id !== 'general')
                            <img src="{{ asset('user/barang_img/' . $pb->gambar) }}" width="70px" height="70px"
                                alt="">
                        @endif
                        <ul style="list-style-type: none">
                            <li>
                                <h5 style="font-size: 14px; margin-left: -25px;"><b>{{ $pb->nama }}</b></h5>
                            </li>
                            <li>
                                <h5 style="font-size: 13px; margin-left: -25px; margin-top: 10px">{{ $pb->jumlah }}
                                    Barang
                                    x {{ number_format($pb->harga) }}</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
        @if ($pesanan->type === 'custom')
            @foreach ($pesanan->pesananbarang() as $pb)
                <div class="col-xs-6">
                    <div class="pesanan-item" style="margin-top: 12px; margin-bottom: 10px">
                        @if ($pb->barang_id !== 'general')
                            <img src="{{ $pb->gambar }}" width="70px" height="70px" alt="">
                        @endif
                        <ul style="list-style-type: none">
                            <li>
                                <h5 style="font-size: 14px; margin-left: -25px;">
                                    <b>{{ explode('|', $pb->nama)[0] }}</b>
                                </h5>
                            </li>
                            <li>
                                <h5 style="font-size: 13px; margin-left: -25px; margin-top: 10px">
                                    {{ explode('|', $pb->nama)[1] }} - Rp {{ number_format($pb->harga) }}
                                </h5>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div class="modal-footer">
    <div class="pesanan-harga" style="border: none">
        <h4>Ongkir</h4>
        <h4><b>Rp {{ number_format($pesanan->ongkir) }}</b></h4>
        <br>
        <h4>Total Belanja</h4>
        <h3><b>Rp {{ number_format($pesanan->total) }}</b></h3>
    </div>
</div>
