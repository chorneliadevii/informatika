<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <nav class="navbar">
                <h1 class="mt-4"><?= $title?></h1>
                <form method="post" class="form-inline" action="<?php base_url('home/search');?>">
                    <input class="form-control mr-sm-2" name="nama" type="text" id="nama" placeholder="Search Name"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <div class="card-body">
                <a href="http://" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">Tambah
                    Mahasiswa</a>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>DPA</th>
                                <th>MINAT</th>
                                <th>STATUS</th>
                                <th>IPK</th>
                                <th>SKS</th>
                                <th>DOSBING</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data->result() as $row) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?php echo $row->nim; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->dpa; ?></td>
                                <td><?php echo $row->minat; ?></td>
                                <td>
                                    <?php $a=$row->status ?>
                                    <?php if ($a == '1') : ?>
                                    <?php echo 'AKTIF'; ?>
                                    <?php else :?>
                                    <?php echo 'DO'; ?>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo $row->ipk; ?></td>
                                <td><?php echo $row->sks; ?></td>
                                <td><?php echo $row->dosbing; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>home/editMhs/<?= $row->nim; ?>"
                                        class="badge badge-success ">Edit</a>
                                    <a href="<?php echo base_url(); ?>home/deleteMhs/<?= $row->nim; ?>"
                                        class="badge badge-danger"
                                        onclick="return confirm('Are you sure you want to delete <?= $row->nim; ?>?');">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--Tampilkan pagination-->
                    <div class="row">
                        <div class="col">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <a href="http://" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">Add
                        New
                        Menu</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <a href="http://" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">Add
                        New
                        Menu</a>
                </div>
            </div>
        </div>
    </div>