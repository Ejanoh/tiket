<h3>Halaman <?= $title; ?></h3>
<div class="col-12">
    <div class="bg-light rounded  p-2">
        <select class="form-select form-select-lg" id="select" aria-label=".form-select-lg example">
            <option value="0">Open this select menu</option>
            <option value="1">Tampilkan Data Berdasarkan Data Terbanyak</option>
            <option value="2">Tampilkan Data Berdasarkan Data PIC Terbanyak</option>
            <option value="3">Tampilkan Data Berdasarkan Data Team Terbanyak</option>
            <option value="4">Tampilkan Data Berdasarkan Bulan</option>
        </select>
    </div>
    <div class="bg-light rounded  p-2" id="divhide">
        <select class="form-select form-select-lg" id="bulan" aria-label=".form-select-lg example">
            <option value="0">Open this select Moon</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#divhide').hide();
    });

    $('#select').change(function() {
        let id = $('#select').val();
        if (id == 0) {
            location.reload();
        } else {
            if (id == 4) {
                $('#divhide').show();
                $('#bulan').change(function() {
                    let bulan = $('#bulan').val();
                    if (bulan == 0) {
                        location.reload();
                    } else {
                        window.location.href = '<?= base_url('reckup/get/') ?>' + id + '/' + bulan;
                    }
                });
            } else {
                $('#divhide').hide();
                window.location.href = '<?= base_url('reckup/get/') ?>' + id;
            }
        }
    });
</script>