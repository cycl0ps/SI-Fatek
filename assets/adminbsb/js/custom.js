/*!
 * Custom Javascript for Bootstrap Admin BSB Material Design 
 * 
 * Crafted by: 
 * Xaverius Najoan      xnajoan@gmail.com
 * 
 *
 *
 */

$(function () {
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
});

//Add li class 'active' for selected left menu
 $(function () {
    var url = window.location;
    //$('ul.list a[href="'+ url +'"]').addClass('toggled').parents('li').addClass('active').closest('ul').show();

    $('ul.list a').filter(function() {
        return this.href == url;
    }).addClass('toggled').parents('li').addClass('active').closest('ul').show();
});

//function for color modal
$(function () {
    $('.js-modal-buttons').on('click', function () {
        var color = $(this).data('color');
        $('.modalColored .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);

    });
});

$(function () {
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    //Popover
    $('[data-toggle="popover"]').popover();

    //Widgets count
    $('.count-to').countTo();

    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    //Generate graphs
    if (typeof graphs !== 'undefined') {
        for (var i = 0; i < graphs.length; i++) {
            getMorris(graphs[i].type, graphs[i].element, graphs[i].data, graphs[i].param);
        } 
    }

    //Get from API
    if (typeof urlApi !== 'undefined') {
        getDataApi('userDokumen', urlApi);
    }

})

// DataTable pada tabel spesifik. (JQuery Plugin: JQuery DataTable)
$(function () {
    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('.basicTabel').DataTable({
        responsive: true,
    });

    $('.actionTabel').DataTable({
        responsive: true,
        paging: false,
        "columnDefs": [{
            'sortable': false, 
            "targets": 'no-sort',
        }],
    });

    $('.tblListAllDoc').DataTable({
        responsive: true,
        "pageLength":10,
        "columnDefs": [
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 5 ],
                "searchable": false
            }
        ]
    });

    if (typeof kodeUnit !== 'undefined') {
        $('.tblListAllDoc').DataTable().column(4).search(kodeUnit).draw();
    }

    $('.tabelDosen').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "pageLength":50,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

//function for select angkatan
$(function () {
    var table = $('.tblListMhsApi').DataTable({
       dom: 'Bfrtip',
        responsive: true,
        "pageLength":50,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    });

    $('#table-filter').on('change', function(){
       table.columns(3).search(this.value).draw();
       if (this.value == "") {$('.subtitle').text('Semua Angkatan');}
       else {$('.subtitle').text('Angkatan '+this.value);}
    });
});

//function for select jenis
$(function () {
    var table = $('.tabelListAkademik').DataTable({
       dom: 'Bfrtip',
        responsive: true,
        "pageLength":50,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    });

    $('#tableakademik').on('change', function(){
       table.columns(1).search(this.value).draw();
    });
});

//function for select kategori dokumen
$(function () {
    var table = $('.tabelListDokumen').DataTable({
        responsive: true,
        "pageLength":50,
    });

    $('#selectKategoriDokumen').on('change', function(){
       table.columns(4).search(this.value).draw();
    });
});


//function for typeahead and bloodhound
$(function () {
    if (typeof prefetch_dsn !== 'undefined') {
        
        var dosen = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: prefetch_dsn,
        });

        dosen.initialize();

        $('#tags-input-dosen').tagsinput({
            itemValue: 'id',
            itemText: 'nama',
            typeaheadjs: {
                name: 'dosen',
                displayKey: 'nama',
                source: dosen.ttAdapter(),
                templates: {
                    empty: [
                    '<div>unable to find</div>'
                    ].join('\n'),
                    suggestion: function(e) { return ('<div><strong>' + e.nama + '</strong> - ' + e.id + '</div>')}, 
                }
            } 
        });
    }

    if (typeof prefetch_mhs !== 'undefined') {
        
        var mhs = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: prefetch_mhs,
        });

        mhs.initialize();

        $('#tags-input-mhs').tagsinput({
            itemValue: 'id',
            itemText: 'nama',
            typeaheadjs: {
                name: 'mhs',
                displayKey: 'nama',
                source: mhs.ttAdapter(),
                templates: {
                    empty: [
                    '<div>unable to find</div>'
                    ].join('\n'),
                    suggestion: function(e) { return ('<div><strong>' + e.nama + '</strong> - ' + e.id + '</div>')}, 
                }
            } 
        });
    }

    if (typeof prefetch_peg !== 'undefined') {
        
        var peg = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: prefetch_peg,
        });

        peg.initialize();

        $('#tags-input-peg').tagsinput({
            itemValue: 'id',
            itemText: 'nama',
            typeaheadjs: {
                name: 'peg',
                displayKey: 'nama',
                source: peg.ttAdapter(),
                templates: {
                    empty: [
                    '<div>unable to find</div>'
                    ].join('\n'),
                    suggestion: function(e) { return ('<div><strong>' + e.nama + '</strong> - ' + e.id + '</div>')}, 
                }
            } 
        });
    }

});

// Untuk pengaturan validasi form (JQuery Plugin: Jquery Validation)
$(function () {
    $('form').validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
});

// Untuk Notifikasi
$(function () {

    $.ajax({
        url : url_notifikasi + 'get_notif',
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            if (data.jumlah > 0) {
                $('span.label-count').text(data.jumlah);
                $.each(data.notif, function(i, item) {
                    switch (item.tipe) {
                        case 'sistem'   : var $bg = "bg-purple"; var $icon = "update"; break;
                        case 'layanan'  : var $bg = "bg-orange"; var $icon = "dynamic_feed"; break;
                        case 'seminar'  : var $bg = "bg-cyan"; var $icon = "meeting_room"; break;
                        case 'dokumen'  : var $bg = "bg-light-green"; var $icon = "library_books"; break;
                        case 'prestasi'  : var $bg = "bg-red"; var $icon = "emoji_events"; break;
                    }

                    var $li ="<li>\
                                    <a class=' waves-effect waves-block' href='"+ item.link+"' \
                                    onClick='return set_read(\"" + item.idNotif + "\");'>\
                                        <div class='icon-circle "+ $bg +"'>\
                                            <i class='material-icons'>"+$icon+"</i>\
                                        </div>\
                                        <div class='menu-info'>\
                                            <h4>"+ item.isiNotif +"</h4>\
                                            <p>\
                                                <i class='material-icons'>access_time</i>\
                                                 "+jQuery.timeago(item.tglNotif) +"\
                                            </p>\
                                        </div>\
                                    </a>\
                                </li>"; 
                    $('#notif').append($li);
                });
            } else {
                $li = "<li><h5 class='align-center'>Tidak ada notifikasi baru</h5></li>";
                $('#notif').append($li);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

});

//function untuk set read notifikasi hay
function set_read(id) {
    $.ajax({
        url : url_notifikasi + 'set_read/' + id,
        type: "GET",
        dataType: "JSON",
    });
}

// Script untuk chart (JQuery Plugin: MorrisChart)
function getMorris(type, element, data, param) {
    if (type === 'line') {
        Morris.Line({
            element: element,
            data: data,
            xkey: param.xkey,
            ykeys: param.ykeys,
            labels: param.labels,
            lineColors: param.lineColors,
            lineWidth: param.lineWidth,
        });
    } else if (type === 'bar') {
        Morris.Bar({
            element: element,
            data: data,
            xkey: param.xkey,
            ykeys: param.ykeys,
            labels: param.labels,
            barColors: param.barColors,
        });
    } else if (type === 'area') {
        Morris.Area({
            element: element,
            data: data,
            xkey: param.xkey,
            ykeys: param.ykeys,
            labels: param.labels,
            pointSize: param.pointSize,
            hideHover: param.hideHover,
            lineColors: param.lineColors,
        });
    } else if (type === 'donut') {
        Morris.Donut({
            element: element,
            data: data,
            colors: param.colors,
            formatter: function (y) {
                return y
          }
        });
    }
}