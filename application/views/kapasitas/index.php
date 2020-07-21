<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?= $title?></h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card mb-1">
                                <div class="card-header d-flex justify-content-center ">
                                    Jumlah Mahasiswa Aktif
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <?php echo $this->db->query("SELECT * FROM mahasiswa WHERE `status` LIKE 'AKTIF'")->num_rows(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-1">
                                <div class="card-header d-flex justify-content-center ">
                                    Jumlah Mahasiswa Tidak Aktif
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <?php echo $this->db->query("SELECT * FROM mahasiswa WHERE `status`  LIKE 'TIDAK AKTIF'")->num_rows(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-1">
                                <div class="card-header d-flex justify-content-center ">
                                    Jumlah Mahasiswa DO
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <?php echo $this->db->query("SELECT * FROM mahasiswa WHERE `status`  LIKE 'DO'")->num_rows(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4  ">
                        <div class="card-header d-flex justify-content-center ">
                            KAPASITAS SEMUA KELAS
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" id="myTable">
                                    <thead>
                                        <tr style="text-align:center;">
                                            <th>NO</th>
                                            <th>MAKUL</th>
                                            <th>JUMLAH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $total = 0 ; ?>
                                        <?php foreach ($makul as $m):?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $i ?></td>
                                            <td><?php echo $m['nama'] ?></td>
                                            <td style="text-align:center;"><?php  
                                                $sql = "SELECT COUNT(Nim) AS jumlah FROM presensi a JOIN makul b ON a.idMakul = b.idMakul WHERE b.nama LIKE '".$m['nama']."'";
                                                $jumlah = $this->db->query($sql)->result_array();
                                                echo $jumlah[0]['jumlah'];
                                                $total += $jumlah[0]['jumlah'];
                                            ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach ?>
                                        <tr>
                                            <th colspan="2" class="text-right">TOTAL</th>
                                            <td style="text-align:center;"><?php echo $total ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 ">
                        <div class="card-header d-flex justify-content-center">
                            FILTER
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('kapasitas/filter');?>" method="post">
                                <div class="form-group">
                                    <label for="title">ANGKATAN</label>
                                    <input type="text" class="form-control" name="angkatan" id="angkatan">
                                </div>
                                <div class="form-group">
                                    <label for="title">MATA KULIAH</label>
                                    <select name="makul" id="makul" class="form-control">
                                        <option value=""></option>
                                        <?php $sql="SELECT DISTINCT nama FROM makul"; ?>
                                        <?php $menu = $this->db->query($sql)->result_array();?>
                                        <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['nama']?>"><?= $m['nama']?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">TAHUN AJARAN</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value=""></option>
                                        <?php $sql="SELECT DISTINCT tahun FROM makul"; ?>
                                        <?php $menu = $this->db->query($sql)->result_array();?>
                                        <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['tahun']?>"><?= $m['tahun']?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">TIPE MAKUL</label>
                                    <select name="tipe" id="tipe" class="form-control">
                                        <option value=""></option>
                                        <?php $menu =['Wajib','RD','SC','JK','Perminatan'] ?>
                                        <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m?>"> <?= $m?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">SEMESTER</label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value=""></option>
                                        <?php $menu =['GASAL',"GENAP"] ?>
                                        <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m?>"> <?= $m?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">DOSEN</label>
                                    <select name="dosen" id="dosen" class="form-control">
                                        <option value=""></option>
                                        <?php $sql="SELECT DISTINCT nama FROM dosen"; ?>
                                        <?php $menu = $this->db->query($sql)->result_array();?>
                                        <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['nama']?>"><?= $m['nama']?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">CARI</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>