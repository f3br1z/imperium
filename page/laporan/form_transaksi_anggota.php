<div class="panel panel-primary">
    <div class="panel-heading">
        Cetak Laporan
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <form method="POST" action="laporan/laporan_tranggota.php">

                    <div class="form-group">
                        <label>Dari Tanggal </label>
                        <input class="form-control" name="tanggal1" type="date" />

                    </div>

                    <div class="form-group">
                        <label>SampaiTanggal </label>
                        <input class="form-control" name="tanggal2" type="date" />

                    </div>


                    <div>

                        <input type="submit" name="cetak" value="Cetak" target="blank" class="btn btn-primary">

                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>