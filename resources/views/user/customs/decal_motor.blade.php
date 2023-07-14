<div class="custom-page-wrapper">
    <div class="custom-page-section" style="justify-content: center; align-items: center">
        <h4 class="title">Jenis Motor</h4>
        <select class="custom-select" id="jenis_motor" style="width: 200px">
            <option value="Tes 1">Tes 1</option>
            <option value="Tes 2">Tes 2</option>
            <option value="Tes 3">Tes 3</option>
            <option value="Tes 4">Tes 4</option>
            <option value="Tes 5">Tes 5</option>
            <option value="Tes 6">Tes 6</option>
            <option value="Tes 7">Tes 7</option>
        </select>
    </div>
    <div class="custom-page-wrapper" style="margin-top: 0">
        <div class="custom-page-section">
            <h4 class="title">Spakbor Depan</h4>
            <div class="cards" id="spakbor_depan_list">
                <div class="card card-spakbor selected">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <i class="fas fa-ban"></i>
                    <span>Tanpa Sticker</span>
                </div>

                <div class="card card-spakbor" style="background-color: #FFF" data-id="1"
                    data-url="{{ asset('images/sticker1.png') }}">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <img src="{{ asset('images/sticker1.png') }}" class="card-image">
                    <span>Design 1</span>
                </div>
                <div class="card card-spakbor" style="background-color: #FFF" data-id="2"
                    data-url="{{ asset('images/sticker2.png') }}">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <img src="{{ asset('images/sticker2.png') }}" class="card-image">
                    <span>Design 2</span>
                </div>
                <div class="card card-spakbor" style="background-color: #FFF" data-id="3"
                    data-url="{{ asset('images/sticker3.png') }}">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <img src="{{ asset('images/sticker3.png') }}" class="card-image">
                    <span>Design 3</span>
                </div>
            </div>
        </div>

        <div class="custom-page-section" id="sayap_list">
            <h4 class="title">Sayap</h4>
            <div class="cards">
                <div class="card card-sayap selected">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <i class="fas fa-ban"></i>
                    <span>Tanpa Sticker</span>
                </div>

                <div class="card card-sayap" style="background-color: #FFF" data-id="3"
                    data-url="{{ asset('images/sticker3.png') }}">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <img src="{{ asset('images/sticker3.png') }}" class="card-image">
                    <span>Design 1</span>
                </div>
                <div class="card card-sayap" style="background-color: #FFF" data-id="1"
                    data-url="{{ asset('images/sticker1.png') }}">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <img src="{{ asset('images/sticker1.png') }}" class="card-image">
                    <span>Design 2</span>
                </div>
                <div class="card card-sayap" style="background-color: #FFF" data-id="2"
                    data-url="{{ asset('images/sticker2.png') }}">
                    <div class="selected-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <img src="{{ asset('images/sticker2.png') }}" class="card-image">
                    <span>Design 3</span>
                </div>
            </div>
        </div>

        <div class="custom-page-section">
            <h4 class="title">Bahan</h4>
            <select class="custom-select" id="bahan" style="width: 400px">
                <option value="">-- Pilih Bahan --</option>
                <option value="Orajet">Orajet</option>
                <option value="Maxdecal">Maxdecal</option>
                <option value="Hologram">Hologram</option>
                <option value="Chrome">Chrome</option>
                <option value="Transparan">Transparan</option>
            </select>
        </div>

        <div class="custom-page-section">
            <h4 class="title">Laminasi</h4>
            <select class="custom-select" id="laminasi" style="width: 400px">
                <option value="">-- Pilih Laminasi --</option>
                <option value="Doff">Doff</option>
                <option value="Glossy">Glossy</option>
            </select>
        </div>

        <div class="custom-page-section preview">
            <div class="title-kategori" style="padding-bottom: 0">
                <h3 style="color: #999"><b>Preview</b></h3>
                <hr>
            </div>
            <div class="custom-page-wrapper" style="margin-top: 0">
                <div class="grid-preview">
                    <div class="custom-page-section">
                        <h4 class="title">Spakbor depan</h4>
                        <div class="image-wrapper">
                            <div class="image" id="preview-spakbor"></div>
                        </div>
                    </div>
                    <div class="custom-page-section">
                        <h4 class="title">Sayap</h4>
                        <div class="image-wrapper">
                            <div class="image" id="preview-sayap"></div>
                        </div>
                    </div>
                </div>
                <div class="custom-page-section">
                    <h4 class="title">Bahan</h4>
                    <span id="preview-bahan"></span>
                </div>
                <div class="custom-page-section">
                    <h4 class="title">Laminasi</h4>
                    <span id="preview-laminasi"></span>
                </div>
            </div>
        </div>
    </div>
</div>
