<html>
   <head>
      <title>select</title>
      <script charset="utf-8" src="js/jquery.min.js"></script>
      <script charset="utf-8">
         function getTotalHarga()
         {
            var barang = parseInt($('#barang').html());
            var ongkir = parseInt($('#ongkir').html());
            return $('#total').html(barang+ongkir);
         }
         function hitungBiaya(asal,tujuan,berat)
         {
            $('#result').html('loading...');
            var jasa = $('#pilihan').val();
            $.ajax({
               url:'process.php?act=alvincost',
               data:{origin:asal,destination:tujuan,weight:berat,courier:jasa},
               type:'GET',
               success:function(response){
                     $('#result').html(response);
                     getTotalHarga();
               },
               error:function(){
                  alert('something wrong');
               }
            });
         }
         function totalOngkir()
         {
            var ongkir = $('input[name="pilihpaket"]:checked').val();
            // alert(ongkir);
            $('#ongkir').html(ongkir);
            getTotalHarga();
         }
         $(document).ready(function(){
            getTotalHarga();
         });
      </script>
   </head>
   <body>
      <select id="pilihan" onchange="hitungBiaya(34,37,2)" class="" name="">
         <option value="">pilih paket</option>
         <option value="jne">JNE</option>
         <option value="pos">POS</option>
         <option value="tiki">TIKI</option>
      </select>
      <span id="result"></span>
      <h2>harga barang <span id="barang">45000</span></h2>
      <h2>harga ongkir <span id="ongkir">0</span></h2>
      <h2>harga total <span id="total"></span></h2>
      <hr/>
      <select id="pilihan" onchange="hitungBiaya(34,37,2)" class="" name="">
         <option value="">pilih paket</option>
         <option value="jne">JNE</option>
         <option value="pos">POS</option>
         <option value="tiki">TIKI</option>
      </select>
      <span id="result"></span>
      <h2>harga barang <span id="barang">45000</span></h2>
      <h2>harga ongkir <span id="ongkir">0</span></h2>
      <h2>harga total <span id="total"></span></h2>
   </body>
</html>
