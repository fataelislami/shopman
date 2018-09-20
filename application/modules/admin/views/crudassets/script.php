<script src="<?php echo base_url()?>assets/plugins/summernote/dist/summernote.min.js"></script>

<!-- Sweet-Alert  -->
<script src="<?php echo base_url()?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
<script>
jQuery(document).ready(function() {

    $('.summernote').summernote({
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });

    $('.inline-editor').summernote({
        airMode: true
    });

});

window.edit = function() {
        $(".click2edit").summernote()
    },
    window.save = function() {
        $(".click2edit").summernote('destroy');
    }
</script>

<!-- This is data table -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
$(document).ready(function() {
    dataTable();
    $('#myTable').DataTable();

    //GET Data table
    function dataTable(){
          var settings = {
              "async": true,
              "crossDomain": true,
              "url": "http://localhost/shopman/admin/invoice/getAllProductByCart",
              "method": "GET",
              "headers": {
                "Cache-Control": "no-cache",
                "Postman-Token": "95591a86-5634-4abc-9e2e-c28a4562778c"
              }
          }

          $.ajax(settings).done(function (data) {
              var product = JSON.parse(data);
              var p = product.length;
              document.getElementById('demo').innerHTML = p;
              for (var i = 0; i < product.length ; i++) {
                $("#show_data").append(
                  "<tr>"+
                    "<td>"+product[i].id_orders+"</td>"+
                    "<td>"+product[i].name+"</td>"+
                    "<td>"+product[i].quantity+"</td>"+
                    "<td>"+product[i].price+"</td>"+
                    "<td>"+product[i].final_price+"</td>"+
                    "<td style='text-align:center;'>"+
                        '<a href="javascript:;" class="btn btn-info btn-xs item_edit" value="imam" data="'+product[i].id_orders+'">Edit</a>'+' '+
                        '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+product[i].id_orders+'">Hapus</a>'+
                    "</td>"+
                    "</tr>"
                  );
                }
          });
    }

    //GET UPDATE
		$('#show_data').on('click','.item_edit',function(){

            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "http://localhost/shopman/admin/invoice/getProductById",
                "method": "GET",
                "headers": {
                  "Cache-Control": "no-cache",
                  "Postman-Token": "d6dbc218-64c9-4f6b-a1b8-2f7edcd67c24"
                }
            }

            $.ajax(settings).done(function (response) {
              var id=$(this.target).val();
              alert("val="+id);
              var product = JSON.parse(response);
              $('#updatebarang').modal('show');
              $('[name="updateNama"]').val(id);
              $('[name="updateJumlah"]').val(product.quantity);
              //console.log(response);
            });

            /*var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/barang/get_barang')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(barang_kode, barang_nama, barang_harga){
                    	$('#updatebarang').modal('show');
            			$('[name="kobar_edit"]').val(data.barang_kode);
            			$('[name="nabar_edit"]').val(data.barang_nama);
            			$('[name="harga_edit"]').val(data.barang_harga);
            		});
                }
            });*/
            return false;
        });

    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy'
    ]
});
</script>
<script src="<?php echo base_url()?>assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<script src="<?php echo base_url()?>assets/plugins/dropzone-master/dist/dropzone.js"></script>
<!--Custom JavaScript -->
    <script src="<?php echo base_url()?>js/custom.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url()?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/wizard/steps.js"></script>
