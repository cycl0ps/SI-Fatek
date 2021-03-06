<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

            <div class="block-header">
                <h1><?php echo $pageTitle;?></h1>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $subtitle;?></h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 align-right">
                                    <label>Filter Kategori Dokumen</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="selectKategoriDokumen">
                                                <option value="">Semua</option>
                                                <?php foreach ($docgroup as $key) {?>
                                                    <option value="<?php echo $key['docgroupJenisDoc'];?>"><?php echo $key['docgroupJenisDoc'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabel dokumen -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover tabelListDokumen">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dokumen / Deskripsi</th>
                                            <th>Nomor</th>
                                            <th>Tahun</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach($dokumen as $list) { ?>
                                        
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td>
                                                <a href="<?php echo $list['dokumenFile'];?>" target="_blank"><?php echo $list['dokumenNama'];?></a><br>
                                                <small><?php echo $list['dokumenDeskripsi'];?></small>
                                            </td>
                                            <td><?php echo $list['dokumenNomor'];?></td>
                                            <td><?php echo $list['dokumenTahun'];?></td>
                                            <td><?php echo $list['docgroupJenisDoc'];?></td>
                                        </tr>
                                        <?php $i++;}?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- #END# Tabel dokumen -->
                        </div>
                    </div>
                </div>
            </div>