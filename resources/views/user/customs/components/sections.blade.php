<div class="custom-page-wrapper">
    <div class="custom-page-section" style="justify-content: center; align-items: center">
        <h4 class="title">Jenis {{ ucwords($jenisName) }}</h4>
        <select class="custom-select" id="jenis_{{ $jenisName }}" style="width: 200px"></select>
    </div>

    <div class="custom-page-wrapper" style="margin-top: 0">
        @foreach ($sections as $section)
            <div class="custom-page-section">
                <h4 class="title">{{ ucwords(str_replace('_', ' ', $section)) }}</h4>
                <div id="loader-{{ $section }}"
                    style="text-align: left; height: 64px; display: flex; align-items: center;">
                    <div style="display: flex; gap: .5rem; align-items: center; opacity: .5;">
                        <i class="fas fa-exclamation-circle"></i>
                        <span style="font-style: italic">Pilih jenis {{ $jenisName }}</span>
                    </div>
                </div>
                <div class="cards" id="list-{{ $section }}"></div>
            </div>
        @endforeach


        <div class="custom-page-section">
            <h4 class="title">Bahan</h4>
            <select class="custom-select" id="bahan-{{ $jenisName }}" style="width: 400px">
            </select>
        </div>

        <div class="custom-page-section">
            <h4 class="title">Laminasi</h4>
            <select class="custom-select" id="laminasi-{{ $jenisName }}" style="width: 400px">
            </select>
        </div>

        <div class="custom-page-section preview">
            <div class="title-kategori" style="padding-bottom: 0">
                <h3 style="color: #999"><b>Preview</b></h3>
                <hr>
            </div>
            <div class="custom-page-wrapper" style="margin-top: 0">
                <div class="grid-preview">
                    @foreach ($sections as $section)
                        <div class="custom-page-section">
                            <h4 class="title">{{ ucwords(str_replace('_', ' ', $section)) }}</h4>
                            <div class="image-wrapper">
                                <div class="image" id="preview-{{ $section }}">
                                    <div style="display: flex; flex-direction: column; gap: 1rem; align-items: center;">
                                        <i class="fas fa-ban" style="font-size: 75px; opacity: .5;"></i>
                                        <span style="font-weight: bold; opacity: .5;">Tanpa sticker</span>
                                    </div>
                                </div>
                            </div>
                            <span class="text-price" id="price-{{ $section }}"></span>
                        </div>
                    @endforeach
                </div>

                <hr style="width: 100%; margin: 0">

                <div class="custom-page-section">
                    <h4 class="title">Bahan</h4>
                    <span id="preview-bahan-{{ $jenisName }}">-</span>
                </div>
                <div class="custom-page-section">
                    <h4 class="title">Laminasi</h4>
                    <span id="preview-laminasi-{{ $jenisName }}">-</span>
                </div>

                <hr style="width: 100%; margin: 0">

                <div class="custom-page-section" style="align-items: center;">
                    <h4 class="title" style="font-size: 18px">Total Harga</h4>
                    <span style="font-size: 18px" id="total-price-{{ $jenisName }}">-</span>
                    <br>
                    <button class="btn-checkout-custom" id="btn-checkout-{{ $jenisName }}" style="display: none">
                        <i class="far fa-shopping-cart"></i>
                        <span>Checkout</span>
                    </button>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>
