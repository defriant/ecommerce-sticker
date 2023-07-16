<div class="custom-page-wrapper">
    <div class="custom-page-section">
        <div class="sticker-image">
            <img src="{{ asset('user/images/no_image.png') }}" id="preview-sticker">
            <div class="cards">
                <button type="button" class="card card-sticker-upload">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <i class="fas fa-upload upload-icon"></i>
                    <span class="upload-text">Upload sticker</span>
                    <span class="upload-loader" style="display: none">Uploading ... </span>
                </button>
                <input type="file" id="upload-design-sticker" style="display: none;">
            </div>
        </div>
    </div>
    <div class="custom-page-section">
        <div style="display: flex; align-items: center; justify-content: center; gap: 30px;">
            <div class="input-group">
                <h5 style="margin-bottom: .5rem; font-weight: 600; text-align: center;">Panjang (cm)</h5>
                <input type="number" id="sticker-panjang" class="form-control input-number"
                    style="width: 185px; margin-bottom: .5rem">
                <p style="font-size: 14px; margin: 0; text-align: center;" id="sticker-panjang-price">-</p>
            </div>
            <div class="input-group">
                <h5 style="margin-bottom: .5rem; font-weight: 600; text-align: center;">Lebar (cm)</h5>
                <input type="number" id="sticker-lebar" class="form-control input-number"
                    style="width: 185px; margin-bottom: .5rem">
                <p style="font-size: 14px; margin: 0; text-align: center;" id="sticker-lebar-price">-</p>
            </div>
        </div>

        <div style="display: flex; align-items: center; justify-content: center; gap: 2rem;">
            <div class="input-group">
                <h5 style="margin-bottom: .5rem; font-weight: 600; text-align: center;">Bahan</h5>
                <select class="custom-select" id="bahan-sticker" style="width: 400px"></select>
            </div>
        </div>

        <div style="display: flex; align-items: center; justify-content: center; gap: 2rem;">
            <div class="input-group">
                <h5 style="margin-bottom: .5rem; font-weight: 600; text-align: center;">Laminasi</h5>
                <select class="custom-select" id="laminasi-sticker" style="width: 400px">
                </select>
            </div>
        </div>

        <div style="display: flex; align-items: center; justify-content: center; gap: 2rem;">
            <div class="input-group">
                <h5 style="margin-bottom: .5rem; font-weight: 600; text-align: center;">Jumlah</h5>
                <input type="number" id="sticker-jumlah" class="form-control input-number"
                    style="width: 400px; text-align: center;">
            </div>
        </div>
    </div>

    <hr style="width: 100%; margin: 0">

    <div class="custom-page-section" style="align-items: center;">
        <h4 class="title" style="font-size: 18px">Total Harga</h4>
        <span style="font-size: 18px" id="total-price-sticker">-</span>
        <br>
        <button class="btn-checkout-custom" id="btn-checkout-sticker" style="display: none;">
            <i class="far fa-shopping-cart"></i>
            <span>Checkout</span>
        </button>
    </div>



    <br><br>
</div>
